<?php
     
    ########## CONFIG START ##########

    define("_CANONICAL_RULES","search-rent");  
    define("OLD_RENTAL_SEARCH_PREFIX","search-rent");  
    define("RENTAL_SEARCH_PREFIX","search-rent");
    // reverted to old system (2019-01-19) 
    //define("RENTAL_SEARCH_PREFIX","rent");  
    define("URL_STRING_DEVIDER","/"); // don't use "-" as devider!! 
    
    // DEFAULT PARAMETER RULE
    // URL slug structure is COUNTRY-REGION/NEIGHBORHOOD/ROOMS/COLLECTION/SORT 
    function getDefaultSlugStructure()
    {
            
        $dbc = new dbc;
        $dbc->Connect();        

        $sql_default_parameterRule = $dbc->Query("select region_variable, neighborhood_variable, price_variable, rooms_variable, collection_variable, sort_variable from parameter_rules WHERE id = '1'");
        list($default_region_variable, $default_neighborhood_variable, $default_price_variable, $default_rooms_variable, $default_collection_variable, $default_sort_variable) = $dbc->Fetch($sql_default_parameterRule);        
        
        return array(
        
            // Slugs or Parameters: "123456789" or "par"
            // REGION is always slug
            "REGION" => $default_region_variable,
            
            // these can be slugs or parameters
            "NEIGHBORHOOD" => $default_neighborhood_variable,
            "PRICE" => $default_price_variable,
            "ROOMS" => $default_rooms_variable,
            "COLLECTION" => $default_collection_variable,
            "SORT" => $default_sort_variable   
        );
        
    }
    
    $arrayUrlVariables = getDefaultSlugStructure(); 
       
    // this is used by /libs/actions/check-link.php
    // overwrite Array $arrayUrlVariables
    if( isset($des) && isset($beach) && isset($price) && isset($room) && isset($Collection) ) $arrayUrlVariables = parameterRuleArray($arrayUrlVariables, $des, $beach, $price, $room, $Collection);
    
    
    // CANONICAL RULES 
    $arrayCanonicalRules = array(
    
        // destination | subdestination | bedrooms | collections
        "specific|specific|all|specific" => "specific|specific|all|all",
        "specific|all|specific|specific" => "specific|specific|specific|all",
        "specific|specific|specific|all" => "specific|specific|all|all",
        "specific|specific|specific|specific" => "specific|specific|all|all"
    
    );
    
    ########## CONFIG END ##########   
    
     
       
    function canonicalExceptions($arrayCanonicalRules)
    {
        
        $destinationValue = is_numeric($_REQUEST['des']) ? 'specific' : 'all';
        $subDestinationValue = is_numeric($_REQUEST['sub']) ? 'specific' : 'all';
        $roomValue = is_numeric($_REQUEST['room']) ? 'specific' : 'all';
        $collectionValue = $_REQUEST['cate'] > 0 ? 'specific' : 'all';
        
        $searchChannels = $destinationValue . "|" . $subDestinationValue . "|"  . $roomValue . "|" . $collectionValue;
        $canonicalURL = $searchChannels; 
        
        foreach ($arrayCanonicalRules as $key => $value) {

            if($key == $searchChannels) return $value;

        } 
        
        return false;       
        
    }    
    
    if( isset($_REQUEST['des'])){
        
        $countryIdSlugNameArray = countryIdSlugNameFromDestinationID($_REQUEST['des']);
        
        define("_COUNTRY_SLUG", $countryIdSlugNameArray[1]); 
        define("_COUNTRY_NAME", $countryIdSlugNameArray[2]); 
        define("_COUNTRY_ID", $countryIdSlugNameArray[0]);        
        
    } else {

        define("_COUNTRY_SLUG", ""); 
        define("_COUNTRY_NAME", ""); 
        define("_COUNTRY_ID", "");        
        
    }     
    
    function countryIdSlugNameFromDestinationID($destinationID)
    {
        global $dbc;
        
        // reverted to old system (2019-01-19)
        //if( $destinationID == "all") return array(0, "all-locations", "All Locations");
        if( $destinationID == "all") return array(0, "thailand", "All Locations");
        else {
            $sql_destination = $dbc->Query("select country from destinations WHERE id = '" . $destinationID . "'");
            list($countryID) = $dbc->Fetch($sql_destination); 
           
            $sql_country = $dbc->Query("select name, slug from countries_available WHERE id = '" . $countryID . "'");
            list($countryName, $countrySlug) = $dbc->Fetch($sql_country); 
            
            return array($countryID, $countrySlug, $countryName);
        }
        
    }
    
    function countryIdSlugNameFromDestinationSlug($countryRegionSlug)
    {
        global $dbc;
        
        $sql_countries = $dbc->Query("select * from countries_available");
        
        while($result = $dbc->Fetch($sql_countries))
        {
            if (strpos($countryRegionSlug, $result['slug']) !== false){
                
                $id = $result['id'];
                $slug = $result['slug'];
                $name = $result['name'];
                break;
            } 
        }
        
        $sql_destination = $dbc->Query("select * from destinations WHERE slug = '" . str_replace($slug . "-", "", $countryRegionSlug) . "' AND country = '" . $id . "'");
        $result_destinations = $dbc->Fetch($sql_destination);
        $numDestinations = $dbc->Getnum($sql_destination); 
        
        if( $numDestinations == 1) return array($id, $slug, $name);     
        else return array(0, 'thailand', 'All Locations');
        // reverted to old system (2019-01-19)
        //else return array(0, 'all-locations', 'All Locations');
        
    }
        
    function parameterRuleArray($arrayUrlDefaultVariables, $des, $beach, $price, $room, $Collection)
    {
        global $dbc;

        $sql_parameterRule = $dbc->Query("select id, region_variable, neighborhood_variable, price_variable, rooms_variable, collection_variable, sort_variable from parameter_rules WHERE destination_value = '" . $des . "' AND  neighborhood_value = '" . $beach . "' AND  price_value = '" . $price . "' AND  bedroom_value = '" . $room . "' AND  collection_value = '" . $Collection . "'");
        list($id, $region_variable, $neighborhood_variable, $price_variable, $rooms_variable, $collection_variable, $sort_variable) = $dbc->Fetch($sql_parameterRule);
        $numParameterRules = $dbc->Getnum($sql_parameterRule);
      
        if( $numParameterRules == 1){
           
            $arrayUrlVariables = array(
            
                "REGION" => $region_variable,
                "NEIGHBORHOOD" => $neighborhood_variable,
                "PRICE" => $price_variable,
                "ROOMS" => $rooms_variable,
                "COLLECTION" => $collection_variable,
                "SORT" => $sort_variable    
            );
            
            return $arrayUrlVariables;
            
        } else return $arrayUrlDefaultVariables;        
        
    }    

    function rebuildURL($string)
    {
        
        if( URL_STRING_DEVIDER != "/"){
        
            $url_slugs = explode("/", $string);
            $newURLstring = "";
            
            foreach ($url_slugs as $url_slug) {
        
                $newURLstring .= $url_slug . URL_STRING_DEVIDER;

            }    

            return rtrim($newURLstring, URL_STRING_DEVIDER) . ".html";
        
        } else return $string . ".html";
        
    }

    function parameterSeparator($count)
    {
        if( $count == 1) return "?";
        else return "&";        
    }
    
    function CanonicalNameBuilder($countryID, $des, $beach, $room, $Collection, $price, $Sort)
    {
        global $arrayUrlVariables, $arrayCanonicalRules;
        
        $canonicalExceptions = canonicalExceptions($arrayCanonicalRules);
        
        if( $canonicalExceptions !== false){
        
            $canonicalRuleArray = explode("|", $canonicalExceptions);
            
            $des = $canonicalRuleArray[0] == "specific" ? $des : 'all';
            $beach = $canonicalRuleArray[1] == "specific" ? $beach : 'all';
            $room = $canonicalRuleArray[2] == "specific" ? $room : 'all';
            $Collection = $canonicalRuleArray[3] == "specific" ? $Collection : '0';

        } 
        
        $arrayUrlVariables = parameterRuleArray($arrayUrlVariables, $des, $beach, $price, $room, $Collection);
        
        return URL_builder($countryID, $des, $beach, $room, $Collection, $price, $Sort, $arrayUrlVariables);    
        
    }
    
    // URL
    //                               region          neighborhood                        villas   
    function URL_builder($countryID, $destinationID, $parentDestinationID, $bedroomsID, $collectionID, $priceID, $sortBy, $arrayUrlVariables, $actualBedrooms="")  
    {
        
        // URL variables:                        ($countryID, $destinationID, $parentDestinationID, $priceID, $bedroomsID, $collectionID, $sortBy)
        // e.g. showing everything for Thailand: (2, 'all-regions', 'all-beaches', 'all-prices', 'all-bedrooms', 'all-collections', 'price|asc')
        /*global $_SESSION;
        die("hey " . $_SESSION['stringActualBedrooms']);*/
        
        if( $destinationID == "all-regions") $locationDevider = URL_STRING_DEVIDER; 
        else $locationDevider = "-";
        
        // buiding the URL string (slug or parameter)
        $urlString = RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER . country_name_slug($countryID, $destinationID, $locationDevider)[1];
        
        foreach ($arrayUrlVariables as $variable => $type) {
            
            if( $variable == "REGION" && $type != "par"){
                $destinationSlug_with_devider = destination_name_slug($destinationID, URL_STRING_DEVIDER)[1];
                define("_DESTINATION_SLUG", str_replace(URL_STRING_DEVIDER, "", $destinationSlug_with_devider) );                
                $urlString .= $destinationSlug_with_devider;
            }
            elseif( $variable == "NEIGHBORHOOD" && $type != "par" ){
                $destinationSlug_w_devider = subdestination_name_slug($parentDestinationID, URL_STRING_DEVIDER)[1];
                define("_SUBDESTINATION_SLUG", str_replace(URL_STRING_DEVIDER, "", $destinationSlug_w_devider) );  
                $urlString .= $destinationSlug_w_devider;
            }                
            elseif( $variable == "PRICE" && $type != "par" ) $urlString .= price_slug($priceID, URL_STRING_DEVIDER);
            elseif( $variable == "ROOMS" && $type != "par" ) $urlString .=  bedrooms_name_shortName_slug($bedroomsID, URL_STRING_DEVIDER)[2];
            elseif( $variable == "COLLECTION" && $type != "par" ) $urlString .= collection_name_brief_slug($collectionID, URL_STRING_DEVIDER)[2];
            elseif( $variable == "SORT" && $type != "par" ) $urlString .= sortBy_slug($sortBy);
            
        }
        
        $urlString = rtrim($urlString, URL_STRING_DEVIDER);
        if( $arrayUrlVariables["REGION"] == "par" ) $urlString = rtrim($urlString, "-");
        $urlString .= ".html"; 
        $countParameters = 0;
        
        foreach ($arrayUrlVariables as $variable => $type) {
            
            if( $variable == "REGION" && $type == "par"){ 
                $countParameters++;
                $destinationSlug = destination_name_slug($destinationID)[1];
                define("_DESTINATION_SLUG", $destinationSlug );                 
                $urlString .= parameterSeparator($countParameters) . "des=" . $destinationSlug;
            }
            elseif( $variable == "NEIGHBORHOOD" && $type == "par" ){
                $countParameters++;
                $subdestinationSlug = subdestination_name_slug($parentDestinationID)[1];
                define("_SUBDESTINATION_SLUG", $subdestinationSlug );                 
                $urlString .= parameterSeparator($countParameters) . "sub=" . $subdestinationSlug;
            }
            
            elseif( $variable == "PRICE" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "pri=" . price_slug($priceID);
            }
            
            elseif( $variable == "ROOMS" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "room=" . bedrooms_name_shortName_slug($bedroomsID)[2];
            }
            elseif( $variable == "COLLECTION" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "cate=" . collection_name_brief_slug($collectionID)[2];
            }
            elseif( $variable == "SORT" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "sort=" . sortBy_slug($sortBy);
            }
            
        }
        
        if($actualBedrooms != ""){ 

            $countParameters++;            
            $urlString .=  parameterSeparator($countParameters) . "b_rooms=" . $actualBedrooms;
            
        }

        
        return $urlString;   
            
        //die;
        //return RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER . country_name_slug($countryID, $destinationID, $locationDevider)[1] . destination_name_slug($destinationID, URL_STRING_DEVIDER)[1] . subdestination_name_slug($parentDestinationID, URL_STRING_DEVIDER)[1] . price_slug($priceID, URL_STRING_DEVIDER) . bedrooms_name_shortName_slug($bedroomsID, URL_STRING_DEVIDER)[2] . collection_name_brief_slug($collectionID, URL_STRING_DEVIDER)[2] . sortBy_slug($sortBy) . ".html";    
        //return RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER . country_name_slug($countryID, $destinationID, $locationDevider)[1] . destination_name_slug($destinationID, URL_STRING_DEVIDER)[1] . subdestination_name_slug($parentDestinationID, URL_STRING_DEVIDER)[1] . price_slug($priceID, URL_STRING_DEVIDER) . bedrooms_name_shortName_slug($bedroomsID, URL_STRING_DEVIDER)[2] . sortBy_slug($sortBy) . ".html?cate=" . collection_name_brief_slug($collectionID)[2];    
        
    }     
    
    function country_name_slug($countryID, $destinationID, $devider = '')
    {
        global $dbc;
      
        $sql = $dbc->Query("select name, slug from countries_available where id = '" . $countryID . "' ");
        list($name, $slug) = $dbc->Fetch($sql);
        $numCountries = $dbc->Getnum($sql); 
        
        // reverted to old system (2019-01-19)
        //if( $numCountries == 0) return array("All Locations", "all-locations" . URL_STRING_DEVIDER);
        if( $numCountries == 0) return array("All Locations", "thailand" . URL_STRING_DEVIDER);
        elseif( filter_var($destinationID, FILTER_VALIDATE_INT) ) return array($name, $slug . $devider);        
        else return array($name, $slug . URL_STRING_DEVIDER);
        
    }

    function destination_name_slug($destinationID, $devider = '')
    {
        global $dbc; 
                    
/*        
        $sql_blog = $dbc->Query("select * from destinations");
        while($r_blog = $dbc->Fetch($sql_blog))
        {
            echo "UPDATE `destinations` SET ";
            echo "slug = '" . $r_blog['slug'] . "' HERE id = '" . $r_blog['id'] . "';<br>";
            
        }        
        
        die;
*/        
        //if( $destinationID != "all-regions" && $destinationID != "all" ){
        if( filter_var($destinationID, FILTER_VALIDATE_INT) ){
        
            $sql = $dbc->Query("select name, slug from destinations where id = '" . $destinationID . "' ");
            list($name, $slug) = $dbc->Fetch($sql);
            
            return array($name, $slug . $devider);     
        
        } else array('', '');
                
/*        switch($option)
        {
            case "38" :
                return "thailand-phuket";//"phuket";
            break;
            case "39" :
                return "thailand-koh-samui";//"koh-samui";
            break;
            default:
                return "thailand";
        }*/
    }

    
    function subdestination_name_slug($parentDestinationID, $devider = '')
    {
        global $dbc; 
        
        //if( $parentDestinationID != "all-beaches" && $parentDestinationID != "all" ){
        if( filter_var($parentDestinationID, FILTER_VALIDATE_INT) ){
            
            $sql = $dbc->Query("select name, slug from destinations where id = '" . $parentDestinationID . "' ");
            list($name, $slug) = $dbc->Fetch($sql); 
            //die("<br>select slug from destinations where parent = '" . $parentDestinationID . "' <br>" . $slug . URL_STRING_DEVIDER );           
            return array(explode(",",$name)[0], $slug . $devider);    
            
        } else return array('', "all-beach" . $devider);
        
        // reverted to old system (2019-01-19) 
        //} else return array('', "all-areas" . $devider);
        
    }   
     
    function price_slug($priceID, $devider = '')
    {
/*        
        // not used at the moment
        switch($priceID)
        {
            case "3" :
                return "over-usd-1000" . URL_STRING_DEVIDER;//"over1000";
            break;
            case "2" :
                return "under-usd-1000" . URL_STRING_DEVIDER;//"under1000";
            break;
            default:
                return "all-price" . URL_STRING_DEVIDER;
        }        
*/
        
        return "all-price" . $devider;    
            
    } 
    
    function destinationID($countrySlug, $destinationSlug)
    {
        global $dbc;
        
        if( $destinationSlug == $countrySlug) return "all";
        // reverted to old system (2019-01-19)
        //if( $destinationSlug == $countrySlug || $countrySlug == "all-locations") return "all";
            
        $sql_region = $dbc->Query("select id, status from destinations where slug = '" . str_replace($countrySlug . "-", "", $destinationSlug) . "' ");
        list($destinationID, $destinationStatus) = $dbc->Fetch($sql_region);

        if( isset($destinationID) && $destinationStatus == 1) return $destinationID;           
        // if destinations' status is disabled, show 404
        elseif( isset($destinationID) && $destinationStatus == 0) fourOfour();
         // if destination is not in database
        elseif( !isset($destinationID) ) fourTen();
        
    }
    
    function neighborhoodID($destinationID, $neighborhoodSlug)
    {
        global $dbc;
        
        if( $neighborhoodSlug == "all-areas" || $neighborhoodSlug == "all-beach" ) return "all";

            $sql_beach = $dbc->Query("select id, status from destinations where parent LIKE '" . $destinationID . "' AND slug = '" . $neighborhoodSlug . "'");
            list($sub, $subdestinationStatus) = $dbc->Fetch($sql_beach);
            $numSubdestinations = $dbc->Getnum($sql_beach);        
/*
            // if subdestination slug is not in database try the old version (xyz-beach)
            if( $numSubdestinations == 0 ){

                $sql_beach_old_slug = $dbc->Query("select id, status from destinations where parent LIKE '" . $destinationID . "' AND slug = '" . str_replace("-beach", "", $neighborhoodSlug) . "'");
                list($sub_oldSlug, $subdestinationStatus_oldSlug) = $dbc->Fetch($sql_beach_old_slug);
                $numSubdestinations_oldSlug = $dbc->Getnum($sql_beach_old_slug);

                // redirect to new version without "-beach" in subdestination slug
                if( $numSubdestinations_oldSlug > 0 && isset($sub_oldSlug) && $subdestinationStatus_oldSlug == 1) threeOone(str_replace("-beach", "", $_SERVER['REQUEST_URI']) );
                elseif( $numSubdestinations == 0 && $numSubdestinations_oldSlug == 0) fourTen();
                                
            }        
            // if subdestinations' status is disabled, redirect to homepage
            elseif( isset($sub) && $subdestinationStatus == 0) threeOone('/'); 
            
            // if subdestination is in database and enabled
            elseif( isset($sub) && $subdestinationStatus == 1) return $sub;
*/          

                                        
            // reverted to old version (2019-01-19)  
            // if subdestination slug is not in database
            if( $numSubdestinations == 0 ) fourTen();
            // if subdestinations' status is disabled, show 404
            elseif( isset($sub) && $subdestinationStatus == 0) fourOfour(); 
            // if subdestination is in database and enabled 
            elseif( isset($sub) && $subdestinationStatus == 1) return $sub;                       
        
    }
    
    function checkSubdestinationStatus($subdestinationID)
    {
        
        global $dbc;
        
        $sql_beach = $dbc->Query("select status from destinations where id LIKE '" . $subdestinationID . "'");
        list($subdestinationStatus) = $dbc->Fetch($sql_beach);        
        return $subdestinationStatus;
        
    }
    
    function checkDestinationStatus($destinationID)
    {
        
        global $dbc;
        
        $sql_dest = $dbc->Query("select status from destinations where id LIKE '" . $destinationID . "'");
        list($destinationStatus) = $dbc->Fetch($sql_dest);        
        return $destinationStatus;
        
    }
    
    function bedroomID($slug)
    {

        global $dbc;
        
        if( $slug == "all-bedrooms") return "all";
        else {
            
            $sql_bedrooms = $dbc->Query("select id from bedroom where slug LIKE '" . $slug . "' ");
            list($id) = $dbc->Fetch($sql_bedrooms);
            return $id;             
            
        }
    } 
    
    function collectionID($collectionValue)
    {
        global $dbc;

        if( $collectionValue == "all-collections" || $collectionValue == "all" ) return "0";

        // collection/category id ($cat)
        //$sql_collection = $dbc->Query("select id, status from categories where ht_link LIKE '%" . $collectionValue . "%'");
        $sql_collection = $dbc->Query("select id, status from categories where slug LIKE '" . $collectionValue . "'");
        list($categoryID, $collectionStatus) = $dbc->Fetch($sql_collection); 
        
        if( isset($categoryID) && $collectionStatus == 0) return '';
        elseif( isset($categoryID) && $collectionStatus == 1) return $categoryID;  
        elseif( !isset($categoryID) ) return '';  
        
    }
    
    function bedrooms_name_shortName_slug($bedroomsID, $devider = '')
    {
        
        global $dbc; 
        
        if( filter_var($bedroomsID, FILTER_VALIDATE_INT) ){
            
            $sql = $dbc->Query("select name, short_name, slug from bedroom where id = '" . $bedroomsID . "' ");
            list($name, $short_name, $slug) = $dbc->Fetch($sql); 
            
            return array($name, $short_name, $slug . $devider);           
            
        } else return array('', '', "all-bedrooms" . $devider); //   "all-bedrooms" . URL_STRING_DEVIDER;        
        
    }
    
    function collection_name_brief_slug($categoryID, $devider = '')
    {   
        global $dbc; 
        
        //if( $categoryID != "all-collections" && $categoryID != 0 ){
        if( filter_var($categoryID, FILTER_VALIDATE_INT) && $categoryID > 0 ){
        
            $sql = $dbc->Query("select name, brief, slug from categories where id = '" . $categoryID . "' ");
            list($name, $brief, $slug) = $dbc->Fetch($sql);
            
            $arrayCollection = array($name, $brief, $slug . $devider);
            
            return $arrayCollection;  
        
        } else {
            
            $arrayCollection = array('', '', "all-collections" . $devider);
            
            return $arrayCollection;  
        }
        
    }     
    
    function sortBy_slug($sortBy_string)
    {   
/*
        // not used at this moment
        switch($sortBy_string)
        {
            case "price|asc" :
                return "price-min";
            break;
            case "price|desc" :
                return "price-max";
            break;
            default:
                return "all-sort";
        }
*/                
        return "all-sort";
        
    } 
    
    function priceValue($priceSlug)
    {
        
        switch($priceSlug)
        {
            case "over-usd-1000" :
                return "3";
            break;
            case "under-usd-1000" :
                return "2";
            break;
            case "all-price" :
                return "all";
            break;
            default:
                threeOone('/');
        }        
        
    }  
     
    function sortValue($sort)
    {
        
        // temporary
        return "all";
        
    }
    
    function display_breadcrumbs($destinationID, $parentDestinationID, $bedroomsID, $collectionID, $priceID, $sortBy, $numResults)
    {
        $countryIdSlugNameFromDestinationID = countryIdSlugNameFromDestinationID($destinationID);
        $countryName = $countryIdSlugNameFromDestinationID[2];
        $countryID = $countryIdSlugNameFromDestinationID[0];
        
        $arrayDefaultUrlVariables = getDefaultSlugStructure(); 
        
        $appendix_bedrooms = "";
        $appendix_collections = "";
        $home_villa_prefix = 0;
        
        // Header and Metatags
        if( $countryName != "All Locations" ) define("_COUNTRY_NAME", $countryName); 
        else define("_COUNTRY_NAME", ""); 
        
        $countLevel = 0;
        $levelsToShow = 0;
        
        if( filter_var($parentDestinationID, FILTER_VALIDATE_INT) ) $subdestination_name_slug = subdestination_name_slug($parentDestinationID);
        
        if( isset($countryName) ) : $levelsToShow++; endif;
        if( filter_var($destinationID, FILTER_VALIDATE_INT) ) : $destination_name_slug = destination_name_slug($destinationID); $levelsToShow++; endif;
        if( filter_var($parentDestinationID, FILTER_VALIDATE_INT) && !filter_var($bedroomsID, FILTER_VALIDATE_INT) ) : $levelsToShow++; endif;
        if( filter_var($bedroomsID, FILTER_VALIDATE_INT) ) : $bedrooms_name_shortName_slug = bedrooms_name_shortName_slug($bedroomsID); $levelsToShow++; endif; 
        if( filter_var($collectionID, FILTER_VALIDATE_INT) && $collectionID > 0 ) : $collection_name_brief_slug = collection_name_brief_slug($collectionID); $levelsToShow++; endif;
        
        //echo "<div class=\"container\"><div class=\"row\">Variables = $countryName, $countryID, destinationID=$destinationID, parentDestinationID=$parentDestinationID, bedroomsID=$bedroomsID, collectionID=$collectionID, priceID=$priceID, $sortBy, $numResults</div</div>";
        
?> 
<style type="text/css">
ol li.num::before {
    content: ''; /* removes the arrow */  
    margin-left: -10px;
}
li.num {
  font-size: small; 
}
</style>
<div class="container">
    <div class="row">
<?php if( strpos($_SERVER['REQUEST_URI'], 'luxury-villas' . URL_STRING_DEVIDER) == 1){ ?>             
       <div class="visible-xs visible-sm" style="height: 40px;"></div>
<?php } ?>        
            <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb" class="breadcrumb" style="background: white; width: 100%;">
<?php

        $countLevel++;
        

    // country
    if( isset($countryName) && $countryName != "All Locations"){ 
    
        //$countLevel++; 
        $home_villa_prefix++; 
        
        // get URL variables for this 'all villas' search 
        $arrayUrlVariables = parameterRuleArray($arrayDefaultUrlVariables, "all", "all", "all", "all", 0);         
       
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><a itemtype="https://schema.org/Thing" itemprop="item" href="https://<?php echo $_SERVER['SERVER_NAME'] ?>/" title="Home"><span itemprop="name"><?php echo "Home"; ?></span></a>
            <meta itemprop="position" content="1" />
            </li>
<?php 

    }
    
    // region
	$position = 0;
	$https = "https://".$_SERVER['SERVER_NAME'];
    if( filter_var($destinationID, FILTER_VALIDATE_INT)  && checkDestinationStatus($destinationID) == 1 ){ 
    
        $countLevel++;
        $position++;
        // get URL variables for this destination 
        $arrayUrlVariables = parameterRuleArray($arrayDefaultUrlVariables, $destinationID, "all", "all", "all", 0);
        
        if( $countryName == "Thailand"){      
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemtype="https://schema.org/Thing" itemprop="item" href="<?php echo $https;?>/<?php echo URL_builder($countryID, 'all-regions', 'all-areas', 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) ?>" title="<?php echo $countryName ?> Villas"><span itemprop="name"><?php echo $countryName ?> Villas</span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><a itemtype="https://schema.org/Thing" itemprop="item" href="<?php echo $https;?>/<?php echo URL_builder($countryID, $destinationID, 'all-areas', 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) ?>" title="<?php echo $destination_name_slug[0] ?>"><span itemprop="name"><?php echo $destination_name_slug[0] ?></span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>
<?php } else { ?>            
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><a itemtype="https://schema.org/Thing" itemprop="item" href="<?php echo $https;?>/<?php echo URL_builder($countryID, $destinationID, 'all-areas', 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) ?>" title="<?php echo $destination_name_slug[0] ?> Villas"><span itemprop="name"><?php echo $destination_name_slug[0] ?> Villas</span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>  
<?php            
            
        }

    }  
    
    // neighborhood (formerly 'beach') 
    // don't show if bedrooms are selected or if subdestination is published 
    //if( filter_var($parentDestinationID, FILTER_VALIDATE_INT) && !filter_var($bedroomsID, FILTER_VALIDATE_INT) && checkSubdestinationStatus($parentDestinationID) == 1 ){ 
    if( checkSubdestinationStatus($parentDestinationID) == 1 ){ 
    
        if(!filter_var($bedroomsID, FILTER_VALIDATE_INT)) $countLevel++; 
        $position++;
        // get URL variables for this sub-destination 
        $arrayUrlVariables = parameterRuleArray($arrayDefaultUrlVariables, $destinationID, $parentDestinationID, "all", "all", 0);    
        
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><a itemtype="https://schema.org/Thing" itemprop="item" href="<?php echo $https;?>/<?php echo URL_builder($countryID, $destinationID, $parentDestinationID, 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) ?>" title="<?php echo str_replace(" Beach", "", $subdestination_name_slug[0]) . ", " . $countryName ?>"><span itemprop="name"><?php echo str_replace(" Beach", "", $subdestination_name_slug[0]) ?></span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>
<?php 

    }       
    
    // bedrooms   
    if( filter_var($bedroomsID, FILTER_VALIDATE_INT) ){  
    
        $countLevel++;  
        $position++;
        // get URL variables for bedroom search 
        $arrayUrlVariables = parameterRuleArray($arrayDefaultUrlVariables, $destinationID, $parentDestinationID, "all", $bedroomsID, 0);         
        if($home_villa_prefix == 0) $appendix_bedrooms = '<a href="https://' . $_SERVER['SERVER_NAME'] . '/" title="Home" style="color: #000 !important;">Home<span style="color:#ACACAC; padding: 0 2px;"> > </span></a><a itemtype="https://schema.org/Thing" itemprop="item" href="'.$https.'/' . URL_builder($countryID, 'all-regions', 'all-areas', 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) . '" style="color: #000 !important"><span itemprop="name" class="active" title="Thailand Villas">Thailand Villas</span></a><span style="color:#ACACAC; padding: 0 2px;"> > </span>';           
        $home_villa_prefix++;
        
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><?php echo $appendix_bedrooms ?><a itemtype="https://schema.org/Thing" itemprop="item" href="<?php echo $https;?>/<?php echo URL_builder($countryID, $destinationID, $parentDestinationID, $bedroomsID, 'all-collections', $priceID, $sortBy, $arrayUrlVariables) ?>" title="<?php echo $bedrooms_name_shortName_slug[0] . " Villas in "; if( isset($subdestination_name_slug[0]) ) echo str_replace(" Beach", "", $subdestination_name_slug[0]); elseif(isset($destination_name_slug[0])) echo $destination_name_slug[0];/* else echo $countryName;*/ ?>"><span itemprop="name"><?php echo $bedrooms_name_shortName_slug[1] . " Villas "; if( isset($subdestination_name_slug[0]) ) echo str_replace(" Beach", "", $subdestination_name_slug[0]); elseif(isset($destination_name_slug[0])) echo $destination_name_slug[0]; /*else echo $countryName*/ ?></span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>
<?php 

    }       
    
    // collection 
    if( filter_var($collectionID, FILTER_VALIDATE_INT) && $collectionID > 0 ){ 
        
    // BELOW: only show on a country / region search, not if bedrooms or neighborhood is selected   
    // if( filter_var($collectionID, FILTER_VALIDATE_INT) && $collectionID > 0 && !filter_var($parentDestinationID, FILTER_VALIDATE_INT) && !filter_var($bedroomsID, FILTER_VALIDATE_INT) ){        
    
        $countLevel++;  
        $position++;
        // get URL variables for 
        $arrayUrlVariables = parameterRuleArray($arrayDefaultUrlVariables, $destinationID, $parentDestinationID, "all", $bedroomsID, $collectionID); 
        if($home_villa_prefix == 0) $appendix_collections = '<a href="https://' . $_SERVER['SERVER_NAME'] . '/" title="Home" style="color: #000 !important;">Home<span style="color:#ACACAC; padding: 0 2px;"> > </span></a><a itemtype="https://schema.org/Thing" itemprop="item" href="'.$https.'/' . URL_builder($countryID, 'all-regions', 'all-areas', 'all-bedrooms', 'all-collections', $priceID, $sortBy, $arrayUrlVariables) . '" style="color: #000 !important"><span itemprop="name" class="active" title="Thailand Villas">Thailand Villas</span></a><span style="color:#ACACAC; padding: 0 2px;"> > </span>';           
        $home_villa_prefix++;
        
?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="<?php if( $countLevel == $levelsToShow ) echo "active"; ?>"><?php echo $appendix_collections ?><a itemtype="https://schema.org/Thing" itemprop="item"  href="<?php echo $https;?>/<?php echo URL_builder($countryID, $destinationID, $parentDestinationID, $bedroomsID, $collectionID, $priceID, $sortBy, $arrayUrlVariables) ?>" title="All <?php echo collection_name_brief_slug($collectionID)[1] . " in "; if( isset($subdestination_name_slug[0]) ) echo str_replace(" Beach", "", $subdestination_name_slug[0]); elseif(isset($destination_name_slug[0])) echo $destination_name_slug[0]; /*else echo $countryName;*/ ?>"><span itemprop="name"><?php echo collection_name_brief_slug($collectionID)[1]; /*if(isset($destination_name_slug[0])) echo " in " . $destination_name_slug[0];*/ ?></span></a><meta itemprop="position" content="<?php echo $position;?>" /></li>
<?php 

    }       
    
    if( isset($numResults) && $numResults != "" ){
        
         if( $countLevel == 1 ){
?>
            <?php /*?><li class="active"><a href="#"><?php echo $numResults; ?> Results</a></li><?php */?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="https://<?php echo $_SERVER['SERVER_NAME'] ?>/" title="Home">Home<span style="color:#ACACAC; padding: 0 2px;"> > </span></a><a itemtype="https://schema.org/Thing" itemprop="item" href="#" style="color: #f05b46 !important;"><span itemprop="name" class="active" title="Thailand Villas">Thailand Villas</span></a><meta itemprop="position" content="1" /></li>
<?php

        } else {
            
?>
            <li class="num"><span class="bnum">(<span id="numResults"><?php echo $numResults; ?></span>)</span></li> 
<?php            
            
        }
    
    }
    
?>    
            </ol>
<?php if( strpos($_SERVER['REQUEST_URI'], 'luxury-villas' . URL_STRING_DEVIDER) == 1){ ?>             
       <div class="visible-xs visible-sm" style="height: 30px;"></div>
<?php } ?>                         
    </div>                                                     
</div>
<?php if( strpos($_SERVER['REQUEST_URI'], 'luxury-villas' . URL_STRING_DEVIDER) == 1){ ?>             
<div style="height: 30px;"></div>
<?php } ?>    
<?php
        
    }
    
    function routingOldSearch($arrayUrlVariables)
    {
        
        // URL without parameters
        $URL_string = str_replace(".html", "", str_replace("/" . OLD_RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER, "", parse_url($_SERVER['REQUEST_URI'])['path']));
        // remove all forward slashes from the beginning of the string
        $URL_string = ltrim($URL_string, "/"); 
        $url_slugs = explode(URL_STRING_DEVIDER, $URL_string); 
                        
/*        foreach ($url_slugs as $value) {
                echo $value . " - <br>";
        } */       
        
        old2newURL($url_slugs[0], $url_slugs[1], $url_slugs[2], $url_slugs[3], $url_slugs[4], $url_slugs[5], $arrayUrlVariables);
        
    } 
    
    function old2newURL($destinationSlug, $subdestinationSlug, $priceSlug, $bedroomsSlug, $collectionSlug, $sortSlug, $arrayUrlDefaultVariables)
    {
        global $dbc;
        
        $countrySlug = countryIdSlugNameFromDestinationSlug($destinationSlug)[1];
       
        // destination ID  ( region id ($des) )
        $destinationID = destinationID($countrySlug, $destinationSlug);
        
        if( $destinationID == "all") $destinationSlug = "";
        
        // subdestination ID  ( beach id ($sub) )
        $subdestinationID = neighborhoodID($destinationID, $subdestinationSlug);
        
        $priceID = "all";
        
        // collection/category id ($cat)
        $collectionID = collectionID($collectionSlug); 
        
        // bedroom ID  ($room)
        $bedroomID = bedroomID($bedroomsSlug);        
        
        //$arrayUrlVariables = parameterRuleArray($arrayUrlDefaultVariables, '38', 'all', $bedroomID, $collectionID);         
        $arrayUrlVariables = parameterRuleArray($arrayUrlDefaultVariables, $destinationID, $subdestinationID, $priceID, $bedroomID, $collectionID);         

        $newDestinationSlug = ltrim( str_replace($countrySlug, "", $destinationSlug), "-");        

        // region naming has changed in new version
        if( $subdestinationSlug != "all-beach" ) $newSubdestinationSlug = str_replace("-beach", "", $subdestinationSlug);
        else $newSubdestinationSlug = "all-areas";        

        // building the URL string (slug or parameter)
        $urlString = RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER . $countrySlug;
                
        foreach ($arrayUrlVariables as $variable => $type) {


            if( $variable == "REGION" && $type != "par" && $newDestinationSlug == "" ) $urlString .= URL_STRING_DEVIDER;
            elseif( $variable == "REGION" && $type != "par" && $newDestinationSlug != "" ) $urlString .= "-" . $newDestinationSlug . URL_STRING_DEVIDER;
            elseif( $variable == "NEIGHBORHOOD" && $type != "par" ) $urlString .= $newSubdestinationSlug . URL_STRING_DEVIDER;
            elseif( $variable == "PRICE" && $type != "par" ) $urlString .= price_slug($priceID, URL_STRING_DEVIDER);
            elseif( $variable == "ROOMS" && $type != "par" ) $urlString .= $bedroomsSlug . URL_STRING_DEVIDER;
            elseif( $variable == "COLLECTION" && $type != "par" ) $urlString .= $collectionSlug . URL_STRING_DEVIDER;
            elseif( $variable == "SORT" && $type != "par" ) $urlString .= $sortSlug;
            
        }        

        $urlString = rtrim($urlString, URL_STRING_DEVIDER);
        if( $arrayUrlVariables["REGION"] == "par" ) $urlString = rtrim($urlString, "-");        
        $urlString .= ".html";
        $countParameters = 0;
        
        foreach ($arrayUrlVariables as $variable => $type) {
            
            if( $variable == "REGION" && $type == "par"){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "des=" . $newDestinationSlug;
            }
            elseif( $variable == "NEIGHBORHOOD" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "sub=" . $newSubdestinationSlug;
            }          
            elseif( $variable == "ROOMS" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "room=" . $bedroomsSlug;
            }
            elseif( $variable == "COLLECTION" && $type == "par" ){ 
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "cate=" . $collectionSlug;
            }
            elseif( $variable == "SORT" && $type == "par" ){
                $countParameters++;
                $urlString .= parameterSeparator($countParameters) . "sort=" . $sortSlug;
            }    
        }                                   
        //die("<br><br>$urlString<br>des = ".$destinationID . ", sub = ".$subdestinationID . ", room = ".$bedroomID . ", cate = " . $collectionID);             
        threeOone("/" . $urlString);
        
    }   

    function routingSearch() 
    {
        global $dbc;
        
        // page type
        $_REQUEST['page']='forrent';
                
        // URL without parameters
        $URL_string = str_replace(".html", "", str_replace("/" . RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER, "", parse_url($_SERVER['REQUEST_URI'])['path']));
        
        // remove leading "//" from URL
        $URL_string = ltrim($URL_string, "/"); 
       
        $url_slugs = explode(URL_STRING_DEVIDER, $URL_string);

        $countryRegionSlug = $url_slugs[0];
        
        $countryIdSlugName = countryIdSlugNameFromDestinationSlug($countryRegionSlug);
        $countrySlug = $countryIdSlugName[1];

        $numSlugs = 1;
        $arrayVariables = [];
            
        if( isset($_GET['des']) ){
            
            $destinationValue = $_GET['des'];
            $arrayVariables['destination'] = "par|" . $destinationValue;
            
        } else {
            
            $destinationValue = str_replace($countrySlug . "-", "", $countryRegionSlug);
            $arrayVariables['destination'] = "0|" . $destinationValue;
            
        }
        
        if( isset($_GET['sub']) ){
            
            $neighborhoodValue = $_GET['sub'];
            $arrayVariables['subdestination'] = "par|" . $neighborhoodValue;
            
        } else {
            
            $neighborhoodValue = $url_slugs[$numSlugs];
            $arrayVariables['subdestination'] = $numSlugs . "|" . $neighborhoodValue;
            $numSlugs++;
        }
        
        if( isset($_GET['pri']) ){
            
            $priceValue = $_GET['pri'];
            $arrayVariables['price'] = "par|" . $priceValue;
            
        } else {
            
            $priceValue = $url_slugs[$numSlugs];
            $arrayVariables['price'] = $numSlugs . "|" . $priceValue;
            $numSlugs++;
        }

        if( isset($_GET['room']) ){
            
            $roomValue = $_GET['room'];
            $arrayVariables['bedrooms'] = "par|" . $roomValue;
            
        } else {
            
            $roomValue = $url_slugs[$numSlugs];
            $arrayVariables['bedrooms'] = $numSlugs . "|" . $roomValue;
            $numSlugs++;
        }
        
        if( isset($_GET['cate']) ){
            
            $collectionValue = $_GET['cate'];
            $arrayVariables['collections'] = "par|" . $collectionValue;
            
        } else {
            
            $collectionValue = $url_slugs[$numSlugs];
            $arrayVariables['collections'] = $numSlugs . "|" . $collectionValue;
            $numSlugs++;
        }
      
        if( isset($_GET['sort']) ){
            
            $sortValue = $_GET['sort'];
            $arrayVariables['sort'] = "par|" . $sortValue;
            
        } else {
            
            $sortValue = $url_slugs[$numSlugs];
            $arrayVariables['sort'] = $numSlugs . "|" . $sortValue;
            $numSlugs++;
        } 
/*        
        echo "regionValue = " . $destinationValue . ", neighborhoodValue = " . $neighborhoodValue . ", roomValue = " . $roomValue . ", collectionValue = " . $collectionValue . ", sortValue = " . $sortValue . "<br>";     

        if($arrayUrlVariables['REGION'] != "par") $destinationValue = str_replace(_COUNTRY_SLUG . "-", "", $url_slugs[$arrayUrlVariables['REGION']] );
        elseif( isset($_GET['des']) && $arrayUrlVariables['REGION'] == "par") $destinationValue = str_replace(_COUNTRY_SLUG . "-", "", $_GET['des'] ); 
        
        if($arrayUrlVariables['NEIGHBORHOOD'] != "par") $neighborhoodValue = $url_slugs[$arrayUrlVariables['NEIGHBORHOOD']];
        elseif( isset($_GET['sub']) && $arrayUrlVariables['NEIGHBORHOOD'] == "par") $neighborhoodValue = $_GET['sub']; 
        
        //if($arrayUrlVariables['PRICE'] != "par") $priceSlug = $url_slugs[$arrayUrlVariables['PRICE']];
        //elseif( isset($_GET['pri']) && $arrayUrlVariables['PRICE'] == "par") $priceSlug = $_GET['pri']; 
        
        if($arrayUrlVariables['ROOMS'] != "par") $roomValue = $url_slugs[$arrayUrlVariables['ROOMS']];
        elseif( isset($_GET['room']) && $arrayUrlVariables['ROOMS'] == "par") $roomValue = $_GET['room']; 
       
        if($arrayUrlVariables['COLLECTION'] != "par") $collectionValue = $url_slugs[$arrayUrlVariables['COLLECTION']];
        elseif( isset($_GET['cate']) && $arrayUrlVariables['COLLECTION'] == "par") $collectionValue = $_GET['cate']; 
      
        if($arrayUrlVariables['SORT'] != "par") $sortValue = $url_slugs[$arrayUrlVariables['SORT']];
        elseif( isset($_GET['sort']) && $arrayUrlVariables['SORT'] == "par") $sortValue = $_GET['sort']; 
        
        die("regionValue = " . $destinationValue . ", neighborhoodValue = " . $neighborhoodValue . ", roomValue = " . $roomValue . ", collectionValue = " . $collectionValue . ", sortValue = " . $sortValue . "<br>");
*/        
        
        // region id ($des)
        $destinationID = destinationID($countrySlug, $destinationValue);
        $_REQUEST['des'] = $destinationID; 
        $arrayVariables['destination'] = $arrayVariables['destination'] . "|" . $destinationID;               

        // beach id ($sub)
        $_REQUEST['sub'] = neighborhoodID($destinationID, $neighborhoodValue);
        $arrayVariables['subdestination'] = $arrayVariables['subdestination'] . "|" . $_REQUEST['sub'];

        // price code ($pri)
        // check for invalid price value
        $_REQUEST['pri'] = priceValue($priceValue);
        $arrayVariables['price'] = $arrayVariables['price'] . "|" . $_REQUEST['pri'];
        
        // room code ($room)
        $_REQUEST['room'] = bedroomID($roomValue);
        $arrayVariables['bedrooms'] = $arrayVariables['bedrooms'] . "|" . $_REQUEST['room'];

        // collection/category id ($cat)
        $collectionID = collectionID($collectionValue); 
        $arrayVariables['collections'] = $arrayVariables['collections'] . "|" . $collectionID;

        // if category's status is disabled or category does not exist, redirect to homepage
        if( $collectionID == "") threeOone('/');
        else $_REQUEST['cate'] = $collectionID;
     
        // sort by
        $_REQUEST['sort'] = sortValue($sortValue);
        $arrayVariables['sort'] = $arrayVariables['sort'] . "|" . $_REQUEST['sort'];
        
        check_if_ParameterRule_is_set($dbc, $arrayVariables);
       
        //die("function routingSearch = ?page=forrent&des=" . $_REQUEST['des'] . "&sub=" . $_REQUEST['sub'] . "&pri=" . $_REQUEST['pri'] . "&room=" . $_REQUEST['room'] . "&cate=" . $_REQUEST['cate'] . "&sort=" . $_REQUEST['sort']);
        
    }
    
    function check_if_ParameterRule_is_set($dbc, $arrayVariables)
    {
        global $arrayUrlVariables;
        
        $dbVariableString = "";
        $urlVariableString = "";
        
        $destinationID = explode("|", $arrayVariables['destination'])[2];
        $subdestinationID = explode("|", $arrayVariables['subdestination'])[2];
                                                                                                                     
        $sort_value = explode("|", $arrayVariables['sort'])[2] == "all" ? '0' : explode("|", $arrayVariables['sort'])[2];

        $sql = "select id, region_variable, neighborhood_variable, price_variable, rooms_variable, collection_variable, sort_variable from parameter_rules  
            WHERE destination_value = '" . $destinationID . "' 
            AND  neighborhood_value = '" . $subdestinationID . "' 
            AND  price_value = '" . explode("|", $arrayVariables['price'])[2] . "' 
            AND  bedroom_value = '" . explode("|", $arrayVariables['bedrooms'])[2] . "' 
            AND  collection_value = '" . explode("|", $arrayVariables['collections'])[2] . "'
            AND  sort_value = '" . $sort_value . "'";
                  
        $sql_parameterRule = $dbc->Query($sql);
       
        list($id, $region_variable, $neighborhood_variable, $price_variable, $rooms_variable, $collection_variable, $sort_variable) = $dbc->Fetch($sql_parameterRule);
        $numParameterRules = $dbc->Getnum($sql_parameterRule);
        
        $urlVariableString = explode("|", $arrayVariables['destination'])[0] . "|" . explode("|", $arrayVariables['subdestination'])[0] . "|" . explode("|", $arrayVariables['price'])[0] . "|" . explode("|", $arrayVariables['bedrooms'])[0] . "|" .explode("|", $arrayVariables['collections'])[0] . "|" .explode("|", $arrayVariables['sort'])[0];
        
        // If a parameter rule has been set for this URL,
        // check if URL uses the rule or any other structure.
        // Redirect if a URL is different from the rule
        if( $numParameterRules > 0 ){
            
            $dbVariableString = $region_variable . "|" . $neighborhood_variable . "|" . $price_variable . "|" . $rooms_variable . "|" .$collection_variable . "|" .$sort_variable;
            
          
        } else $dbVariableString = $arrayUrlVariables['REGION'] . "|" . $arrayUrlVariables['NEIGHBORHOOD'] . "|" . $arrayUrlVariables['PRICE'] . "|" . $arrayUrlVariables['ROOMS'] . "|" .$arrayUrlVariables['COLLECTION'] . "|" .$arrayUrlVariables['SORT'];
/*        
foreach ($arrayUrlVariables as $key => $value) {
    
    echo "<br>$key => $value";

}        
        
die("<br>$dbVariableString != $urlVariableString<br>$numParameterRules"); 
*/  
        if( $dbVariableString != $urlVariableString ){
            
            $arrayUrlVariables = parameterRuleArray($arrayUrlVariables, $destinationID, $subdestinationID, "all", "all", 0);
            $countryID = countryIdSlugNameFromDestinationID($destinationID)[0];
            $redirect = URL_builder($countryID, $destinationID, $subdestinationID, 'all-bedrooms', 'all-collections', 'all-price', 'all-sort', $arrayUrlVariables);          
          
            // avoiding an endless loop 
            if(ltrim($_SERVER['REQUEST_URI'], "/") != $redirect) threeOone('/' . $redirect);
            else threeOone('/');
            
        }
        
    }
    
    function fourTen()
    {
        
        header($_SERVER["SERVER_PROTOCOL"] . " 410 Gone", true, 410);
        
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
        <html><head>
        <link href=\"/libs/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"/libs/css/404.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"/libs/css/base.css\" rel=\"stylesheet\" type=\"text/css\">
        <meta name=\"viewport\" content=\"width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\">
        <meta name=\"robots\" content=\"noindex\"> 
        <script src=\"/libs/js/jquery-3.1.1.min.js\"></script>       
        <title>410 Gone</title>
        </head><body>
        <link rel=\"shortcut icon\" type=\"image/png\" href=\"/favicon.ico\"/>
        <link rel=\"apple-touch-icon\" href=\"icon.jpg\">

        <img src=\"/upload/oops.png\" class=\"center-block img-responsive\">
        <div class=\"f_main text-center\">410</div> 
        <div class=\"f_sub text-center\"><h1>Page Gone</h1></div><br>
        <div class=\"f_sub text-center\">The requested resource is no longer available on this server and there is no forwarding address.
        <br>Please remove all references to this resource.</div><br>
        <a href=\"/\"><button class=\"btn btn-main text-center center-block\">Homepage</button></a>
        <br><br>        
        </body></html>";        
        die;         
/*        
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
        <html><head>
        <title>410 Gone</title>
        </head><body>
        <h1>Gone</h1>
        <p>The requested resource is no longer available on this server and there is no forwarding address.
        <br>Please remove all references to this resource.</p>
        </body></html>";        
        die;        
*/        
    }
     
    function fourOfour()
    {
        
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
        
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
        <html><head>
        <link href=\"/libs/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"/libs/css/404.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"/libs/css/base.css\" rel=\"stylesheet\" type=\"text/css\">
        <meta name=\"viewport\" content=\"width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\">
        <meta name=\"robots\" content=\"noindex\"> 
        <script src=\"/libs/js/jquery-3.1.1.min.js\"></script>       
        <title>404 Page not found</title>
        </head><body>
        <link rel=\"shortcut icon\" type=\"image/png\" href=\"/favicon.ico\"/>
        <link rel=\"apple-touch-icon\" href=\"icon.jpg\">

        <img src=\"/upload/oops.png\" class=\"center-block img-responsive\">
        <div class=\"f_main text-center\">404</div> 
        <div class=\"f_sub text-center\">Page not found</div><br>
        <a href=\"/\"><button class=\"btn btn-main text-center center-block\">Homepage</button></a>        
        </body></html>";        
        die;        
        
    }  
       
    function threeOone($url)
    {   
        //fourOfour();
        header("HTTP/1.1 301 Moved Permanently"); 
        header("Location: " . $url,TRUE,301); 
        exit();        
        
    }
    
	function routingProperties()
    {
        
        global $dbc;
        $url_link_p = $_SERVER['REQUEST_URI']; 
        //---------$ht_link_raw = str_replace(".html?123", "", ltrim($_SERVER['REQUEST_URI'],"/"));
		if(strrchr($url_link_p,'?'))
		{
			$ht_link_raw = str_replace(".html", "", ltrim($_SERVER['REQUEST_URI'],"/"));
			$link_o = $ht_link_raw;
			$ex = explode("?",$link_o);
			$ht_link_raw = $ex[0];
			//echo "select id, status from properties where ht_link = '" . $ht_link_raw . "'";
		}
		else
		{
			$ht_link_raw = str_replace(".html", "", ltrim($_SERVER['REQUEST_URI'],"/"));
		}
		
		
     
        if( URL_STRING_DEVIDER != "/"){
        
            $ht_link = str_replace(URL_STRING_DEVIDER, "/", $ht_link_raw);
        
        } else $ht_link = $ht_link_raw;        
         
        $sql = $dbc->Query("select id, status from properties where ht_link = '" . $ht_link_raw . "'");
        list($id, $status) = $dbc->Fetch($sql); 

        // if villa's status is disabled, redirect to homepage
        if( isset($id) && $status == 0) threeOone('/');
         // if villa is not in database
		//elseif(strrchr($url_link_p,'?')) $id;
        elseif( !isset($id) ) 
		{
			$ar_link = array('/luxury-villas/himmapana-villa-3/kamala-phuket-thailand.html');
			if(in_array($_SERVER['REQUEST_URI'],$ar_link))
			{
				//echo '<meta http-equiv="refresh" content="0; URL=https://www.inspiringvillas.com/" />';
				fourTen();
			}
			else
			{
				fourTen();
			}
		}
		//elseif(isset($id) && $status != 0) //echo '123'; 
		
            
        $_REQUEST['id'] = $id;
        $_REQUEST['page'] = 'propertydetail';
		//echo '123456';
		//echo '-----'.$ht_link_raw;
        
    }
	
    
    function updateAvailablePropertiesInDestinationTable()
    {
    
        global $dbc;

        //file_put_contents("heya.txt", 'he ya!');        
       
        // update amount of properties per region (destination)
        $sql_destinations = $dbc->Query("select * from destinations WHERE parent IS NULL");
        
        while($result_destinations = $dbc->Fetch($sql_destinations))
        {
            $countPropertiesInRegion = 0;
            
            $sql_properties = $dbc->Query("select * from properties WHERE destination = '" . $result_destinations['id'] . "' AND status > 0"); 
            
            while($result_properties = $dbc->Fetch($sql_properties))
            {
                $countPropertiesInRegion++;
            } 
            
            $sql_update_properties = $dbc->Query("UPDATE `destinations` SET num_properties = '" . $countPropertiesInRegion . "' WHERE id = '" . $result_destinations['id'] . "'");
            $result = $dbc->Fetch($sql_update_properties);
        
        } 
        
        // update amount of properties per beach/neighborhood (sub-destination)
        $sql_subdestinations = $dbc->Query("select * from destinations WHERE parent IS NOT NULL AND status > 0");
        
        while($result_subdestinations = $dbc->Fetch($sql_subdestinations))
        {
            $countPropertiesInNeighborhood = 0;
            
            $sql_properties = $dbc->Query("select * from properties WHERE subdestination = '" . $result_subdestinations['id'] . "' AND status > 0"); 
            
            while($result_properties = $dbc->Fetch($sql_properties))
            {
                $countPropertiesInNeighborhood++;
            } 
            
            $sql_update_properties = $dbc->Query("UPDATE `destinations` SET num_properties = '" . $countPropertiesInNeighborhood . "' WHERE id = '" . $result_subdestinations['id'] . "'");
            $result = $dbc->Fetch($sql_update_properties);
            
        }         
        
    }
    
    function checkHtmlUrlValidity($arrayUrlVariables)
    {

        if( isset($_REQUEST['page'])) return;       
        elseif( file_exists($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']) ) echo file_get_contents($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
        elseif( !file_exists($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']) ) fourTen(); 
        
    }
    
    function getMetatags($dbc, $channels_string)
    {
        
        $sql_metatags = $dbc->Query("select title, description, h1, h2 from metatag_search where channels = '" . $channels_string . "'");    
        list($title, $description, $h1, $h2) = $dbc->Fetch($sql_metatags);
        
        $numMetatags = $dbc->Getnum($sql_metatags);
        
        if($numMetatags == 1) return array($title, $description, $h1, $h2);
        else return;
                
    }
    
    function imagePath($photo)
    {
        
        return S3_BUCKET_URL . str_replace("//", "/", $photo);
        
    }
    
    function imagePath_mobile($photo)
    {
        
       /* $fileNamePath = S3_BUCKET_URL . str_replace("//", "/", $photo);
        return str_replace("upload/property", "upload/property/mobile", $fileNamePath); 
        */
        return S3_BUCKET_URL . str_replace("//", "/", $photo);
        
    }
    
    function imagePath_local($photo)
    {
        
        return ROOT_DIR . str_replace("//", "/", $photo);
        
    }
    
    function mobileImage_Path_Name($filename)
    {    
        $new_file = str_replace("upload/property", "upload/property/mobile", $filename); 
        $new_file = str_replace("//", "/", $new_file);   
        return $new_file; 
        
    }
    
    function createImageMagickPicture($absolutePathToSource, $absolutePathToTarget, $widthNew, $heightNew, $comp=100)
    {
        
        if(ROOT_DIR == "F:/www/inspiringvillas")
        {
            
            $thumb = imagecreatetruecolor($widthNew, $heightNew);
            $source = imagecreatefromjpeg($absolutePathToSource);
            list($width, $height) = getimagesize($absolutePathToSource);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
            imagejpeg($thumb, $absolutePathToTarget, 80); 
        
        } else {         
            
            $targetImage = new Imagick($absolutePathToSource);
            
            $d = $targetImage->getImageGeometry();
            $widthOriginal = $d['width'];
            $heightOriginal = $d['height']; 
            
            $targetImage->stripImage();
            
            if($widthOriginal > $widthNew && $heightOriginal > $heightNew) {
                
                $targetImage->resizeImage($widthNew, $heightNew, imagick::FILTER_LANCZOS, 1, true);    
                
            }
                
            if($comp < 100){

                if( exif_imagetype($absolutePathToSource) == 2)
                {
                    $targetImage->setImageCompression(Imagick::COMPRESSION_JPEG); 
                    if( strtolower(get_extension($absolutePathToTarget)) == "jpg") $targetImage->setImageCompressionQuality($comp);
                    elseif( strtolower(get_extension($absolutePathToTarget)) == "png")
                    {
                        
                        $targetImage->setImageFormat('png');
                        $targetImage->setOption('png:compression-level', 9);
                        $targetImage->setOption('png:compression-filter', 5);
                        $targetImage->setOption('png:compression-strategy', 1);                        
                        
                    }
                
                } elseif( exif_imagetype($absolutePathToSource) == 3)
                {
                    
                    $targetImage->setImageFormat('png');
                    $targetImage->setOption('png:compression-level', 9);
                    $targetImage->setOption('png:compression-filter', 5);
                    $targetImage->setOption('png:compression-strategy', 1);
                    
                }
                
            }  
            
            $targetImage->writeImage($absolutePathToTarget);
            $targetImage->destroy();
        
        }
                            
    }
    
    function get_extension($file) 
    {
        
        $tmp = explode('.', $file);
        $extension = end($tmp);        
        return $extension ? $extension : false;
        
    }       
        
    function destinationIDs_forCountry($dbc, $countryID)
    {
        
        $available_ids = "";
        
        $sql_destinations = $dbc->Query("select id FROM destinations WHERE country = '" . $countryID . "'"); 
           
        while($destionationsID = $dbc->Fetch($sql_destinations) )
        {
            
            $available_ids .= $destionationsID['id'] . ","; 
            
        }
        
       return rtrim($available_ids, ",");
                
    }
    
    function availableDestinationIDs($dbc)
    {
        
        $available_ids = "";
        
        $sql_destinations = $dbc->Query("select id FROM destinations WHERE parent IS NULL AND status > 0"); 
           
        while($destionationsID = $dbc->Fetch($sql_destinations) )
        {
            
            $available_ids .= $destionationsID['id'] . ","; 
            
        }
        
       return rtrim($available_ids, ",");
                
    }    
    
    function villa_types_filter_options($dbc)
    {
/*      
        // Copied from /libs/actions/check-collection.php
        //
        // Uncommenting the below needs modification/deactivation 
        // of 'check_cate()' in /libs/pages/head_js.php
          
        $des = $_REQUEST['des'];
        $beach = $_REQUEST['sub'];
        $collectionID = $_REQUEST['cate'];
        $room = $_REQUEST['room'];

        $ar_cate = array();
        $ar_cate_chk = array();
        
        if($des == 'all')
        {
            $destination = "WHERE properties.destination BETWEEN 38 AND 39 ";
        }
        else
        {
            $destination = "WHERE properties.destination = '".$des."'";
        }
        
        if($beach == 'all')
        {
            $beachname = "";
        }
        else
        {
            $beachname = "AND properties.subdestination = '".$beach."'";
        }
        
        if($room == 'all')
        {
            if($des == 'all' && $room != 'all')
            {
                $room_s = "AND property_room.room = '".$room."'";
            }
            else
            {
                $room_s = "";
            }
        }
        else
        {
                $room_s = "AND property_room.room = '".$room."'";
        }
            
        $query = "SELECT
            properties.id,
            properties.`name` AS `name`,
            property_cate.caategory AS cate,
            property_room.room AS room,
            properties.destination AS des,
            properties.subdestination AS subdes,
            categories.`name` AS cname,
            categories.`filter_box` AS filter_box,
            categories.`status` AS cstatus,
            categories.id AS categoryID,
            categories.`sort` 
            FROM
            properties
            INNER JOIN property_cate ON properties.id = property_cate.property
            INNER JOIN property_room ON properties.id = property_room.property
            INNER JOIN categories ON property_cate.caategory = categories.id
            ".$destination." ".$beachname." ".$room_s."
            AND properties.`status` > 0
            AND categories.`status` > 0
            ORDER BY categories.`sort`  ASC";  
        
        $sql_cate = $dbc->Query($query); 
        
        while($row = $dbc->Fetch($sql_cate))
        {
            if($row['categoryID'] != "") $available_collections[$row['categoryID']] = $row['filter_box'];          
        } 
        
        asort($available_collections);
                                   
        foreach ($available_collections as $categoryID => $categoryName) { 
            
            $selc = ($categoryID != 0 && $categoryID == $_REQUEST['cate'])?'selected':'';
            echo '<option value="'.$categoryID.'" '.$selc.' class="'.$categoryID.' cca">'.$categoryName.'</option>'; 
                       
        }
*/        
        $sql_cate = $dbc->Query("select * from categories where status > 0 order by sort asc");
        while($r_ate = $dbc->Fetch($sql_cate))
        {
            $act = ($_REQUEST['cate']==$r_ate['id'])?'selected':'';
            echo '<option value="'.$r_ate['id'].'"'.$act.' class="'.$r_ate['id'].' cca">'.$r_ate['filter_box'].'</option>'. "\n";
        }        
        
    }
    
    function bedroom_range_filter_options($dbc)
    {
        $des = $_REQUEST['des'];
        $beach = $_REQUEST['sub'];
        $collectionID = $_REQUEST['cate'];
        
        $bedroom_ranges = array();
        
        if($des == 'all') $destination = "";
        else $destination = "AND properties.destination = '".$des."'";
        
        if($beach == 'all') $subdestination = "";
        else $subdestination = "AND properties.subdestination = '".$beach."'";

        if($collectionID != 0) $collection = "AND property_cate.caategory = '" . $collectionID . "'";
        else $collection = "";

        $query="SELECT
                    property_cate.caategory,
                    bedroom.name AS bedroomName,
                    bedroom.id AS bedroomID
                FROM
                    properties
                        LEFT JOIN 
                            property_room 
                                ON properties.id = property_room.property
                        LEFT JOIN 
                            property_cate 
                                ON properties.id = property_cate.property
                        LEFT JOIN 
                            bedroom 
                                ON property_room.room = bedroom.id        
                WHERE
                    properties.status > 0 " . $destination . " " . $subdestination . " " . $collection;     
           
        $sql =$dbc->Query($query);
        
        while($row = $dbc->Fetch($sql))
        {
            if($row['bedroomID'] != "") $bedroom_ranges[$row['bedroomID']] = $row['bedroomName'];          
        } 
        
        asort($bedroom_ranges);
                                   
        foreach ($bedroom_ranges as $bedroomID => $bedroomName) { 
            
            $selc = ($bedroomID != 0 && $bedroomID == $_REQUEST['room'])?'selected':'';
            echo '<option value="'.$bedroomID.'" '.$selc.'>'.$bedroomName.'</option>'; 
                       
        }
    } 
    
    function allAvailableVillaNames($dbc)
    {
        
        $query = "SELECT
            properties.id AS id,
            properties.`name`,
            properties.status,
            properties.subdestination
          FROM
                properties 
            LEFT JOIN 
                destinations 
                    ON properties.subdestination = destinations.id
            WHERE properties.status > 0 
                AND destinations.status > 0 
                AND destinations.parent IN (" . availableDestinationIDs($dbc) . ") 
                GROUP BY properties.id ORDER BY name";
        
        $my_prop = $dbc->Query($query);
        $vill = array();
		$vil_id = array(1444,11,1084,1357,1490);

        while($row = $dbc->Fetch($my_prop))
        {
            /*$ex_name = explode("|",$row['name']);
            $vill[] = ltrim( rtrim( $ex_name[0] ) );*/
			$ex_name = explode("|",$row['name']);
			//if(strpos('Villa Serenity',$ex_name[0])==1)
			//if($ex_name[0]=='Villa Serenity')
			if(in_array($row['id'],$vil_id))
			{
				$ex_name_1 = explode("Bedroom",$row['name']);
				$ex_name_2 = explode(",",$row['name']);
				$destination = $ex_name_2[1];
				$new_name = str_replace("|","",$ex_name_1[0]);
				$vill[] = ltrim( rtrim( $new_name ) ).', '.$destination;
			}
			else
			{
				$ex_name = explode("|",$row['name']);
				$vill[] = ltrim( rtrim( $ex_name[0] ) );
			}
            
        }

        return json_encode($vill,true);        
        
    }   
    
    function CanonicalNameBuilderForBlogs($id, $dbc)
    {
        
        $sql_url = $dbc->Query("select name FROM blogs WHERE id = '" . $id . "'");     
        list($name) = $dbc->Fetch($sql_url); 
                    
        $url = strtolower(str_replace(" ", "-", $name) ) . ".html";
        
        return $url;       
        
    }
    
    function showBlog($dbc)
    {
        
        // URL without parameters
        $URL_string = str_replace(".html", "", str_replace("/" . URL_STRING_DEVIDER, "", parse_url($_SERVER['REQUEST_URI'])['path']));
       
        // remove leading "//" from URL
        $URL_string = ltrim($URL_string, "/"); 
       
        $url_slugs = explode(URL_STRING_DEVIDER, $URL_string);        
        if($url_slugs[1]=='blog-author')
		{
			$_REQUEST['page'] = 'blog';
		}
		else
		{
			$name = str_replace("-", " ", $url_slugs[1] );
			
			$sql_url = $dbc->Query("select id FROM blogs WHERE name = '" . $name . "'");     
			$numBlogs = $dbc->Getnum($sql_url);     
			
			if( $numBlogs == 0 ) fourOfour();
			else list($id) = $dbc->Fetch($sql_url);
			
			// page type
			$_REQUEST['page'] = 'blogdetail';
			
			// blog id     
			$_REQUEST['id'] = $id;     
		}
    }     
    
?>
