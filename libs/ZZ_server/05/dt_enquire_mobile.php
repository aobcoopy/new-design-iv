<?php $day = date("Y-m-d");?>
<?php $dayNext = expdate($day,'1');?>
<div class="bgw mobi hid "></div>
<div class="over mobi">
<div class="enq mobi hid mobi">

	<div class="enq_in ">
        <?php /*?><div class="col-md-12 webs">
            <img src="../../upload/slogo.png" width="100" style="margin-bottom:15px;">
            <button class="xclose" onClick="hide_question()" style="color:#000;">X</button>
        </div><?php */?>
        <div class="col-md-12 q_top mobi">
            <img src="../../upload/poplog.png" width="60" class="center-block" style="margin-bottom:15px;">
            <button class="xclose" onClick="clo();">X</button>
        </div>
        <div class="col-md-12 nopad inq1 mobi">
            <div class="col-md-12 q_name text-center mobi top10"><?php echo $room['name'];?></div>
            <form id="form_contact_mobi" class="clearfix">
                <input type="hidden" name="txtID" value="<?php echo $room['id'];?>"><br>
                <div class="mg-contact-form-input col-sm-6 col-xs-6 nopad" >
                   <!-- <label for="full-name">Check In</label>-->
                    <!--<!--<input type="date" class="form-control ip iip" id="checkin_mo" name="checkin_mo" placeholder="Check In*" style="width:100%;">-->
                    <input type="date" class="form-control ip iip- input-min-width-95p" id="checkin_mo" name="checkin_mo" placeholder="Check In*"  onBlur="set_checkout_date(this,'checkout_mo','checkin_mo','checkout_mo'),check_datein(this);"  value="<?php echo $day;?>" min="<?php echo date("Y-m-d");?>"><!--onClick="calendar_opt()"-->
                    <button type="button" class="buti cin" ><i class="fa fa-calendar" aria-hidden="true"></i></button><!--onClick="calendar_opt()"-->
                </div>
    
                <div class="mg-contact-form-input col-sm-6 col-xs-6 nopad" ><!-- -->
                   <!-- <label for="full-name">Check Out</label>-->
                    <input type="date" class="form-control ip input-min-width-95p" id="checkout_mo" name="checkout_mo" placeholder="Check Out*" onBlur="check_date_mo('checkin_mo','checkout_mo');"  value="<?php echo date("Y-m-d",$dayNext);?>" min="<?php echo date("Y-m-d");?>"><!--onClick="calendar_opt()"-->
                    
                    <!--<input type="date" class="form-control ip" id="checkout_mo" name="checkout_mo" placeholder="Check Out*">-->
                    <button type="button" class="buti cout" ><i class="fa fa-calendar" aria-hidden="true"></i></button><!--onClick="calendar_opt()"-->
                </div>
                <span class="m_notis" style="color:#FF0004"></span>
                    <div class="mg-contact-form-input  col-xs-6 col-sm-6 nopad" > 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest_mo" id="cbbGuest_mo" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input   col-xs-6  col-sm-6 nopad" ><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbChildren_mo" id="cbbChildren_mo" placeholder="No. Children (3-12 yrs)">
                    </div>
                
                <div class="mg-contact-form-input col-xs-12 col-sm-12 nopad ipsc" >
                    <!--<label for="full-name">Full Name</label>-->
                    <select class="form-control ips" id="no_bed_mo" name="no_bed_mo"  placeholder="No. Bedroom*">
                        <option value="0">No. Bedroom*</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="10+">10+</option>
                    </select>
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="full-name">Full Name</label>-->
                    <input type="text" class="form-control ip" id="full_name_mo" name="full_name_mo" placeholder="Full Name*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="email">E-mail</label>-->
                    <input type="text" class="form-control ip" id="txemail_mo" name="txemail_mo" onKeyUp="lower_text(this)" placeholder="E-mail*">
                </div>
                <div class="mg-contact-form-input">
                	<div class="col-xs-4 nopad">
                        <select name="countryCode_en_d_mo" id="countryCode_en_d_mo" class="form-control ips" style="    margin-top: 1px;" >
                            <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                            <option data-countryCode="US" value="1">USA (+1)</option>
                            <optgroup label="Other countries">
                                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                <option data-countryCode="AO" value="244">Angola (+244)</option>
                                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                <option data-countryCode="AU" value="61">Australia (+61)</option>
                                <option data-countryCode="AT" value="43">Austria (+43)</option>
                                <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                <option data-countryCode="CA" value="1">Canada (+1)</option>
                                <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                <option data-countryCode="CL" value="56">Chile (+56)</option>
                                <option data-countryCode="CN" value="86">China (+86)</option>
                                <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                <option data-countryCode="CG" value="242">Congo (+242)</option>
                                <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                <option data-countryCode="FI" value="358">Finland (+358)</option>
                                <option data-countryCode="FR" value="33">France (+33)</option>
                                <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                <option data-countryCode="DE" value="49">Germany (+49)</option>
                                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                <option data-countryCode="GR" value="30">Greece (+30)</option>
                                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                <option data-countryCode="GU" value="671">Guam (+671)</option>
                                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                <option data-countryCode="IN" value="91">India (+91)</option>
                                <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                <option data-countryCode="IR" value="98">Iran (+98)</option>
                                <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                <option data-countryCode="IL" value="972">Israel (+972)</option>
                                <option data-countryCode="IT" value="39">Italy (+39)</option>
                                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                <option data-countryCode="JP" value="81">Japan (+81)</option>
                                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                <option data-countryCode="LA" value="856">Laos (+856)</option>
                                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                <option data-countryCode="LY" value="218">Libya (+218)</option>
                                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                <option data-countryCode="MO" value="853">Macao (+853)</option>
                                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                <option data-countryCode="ML" value="223">Mali (+223)</option>
                                <option data-countryCode="MT" value="356">Malta (+356)</option>
                                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                <option data-countryCode="NE" value="227">Niger (+227)</option>
                                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                <option data-countryCode="NU" value="683">Niue (+683)</option>
                                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                <option data-countryCode="NO" value="47">Norway (+47)</option>
                                <option data-countryCode="OM" value="968">Oman (+968)</option>
                                <option data-countryCode="PW" value="680">Palau (+680)</option>
                                <option data-countryCode="PA" value="507">Panama (+507)</option>
                                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                <option data-countryCode="PE" value="51">Peru (+51)</option>
                                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                <option data-countryCode="PL" value="48">Poland (+48)</option>
                                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                <option data-countryCode="RO" value="40">Romania (+40)</option>
                                <option data-countryCode="RU" value="7">Russia (+7)</option>
                                <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                <option data-countryCode="ES" value="34">Spain (+34)</option>
                                <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                <option data-countryCode="SI" value="963">Syria (+963)</option>
                                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                <option data-countryCode="TG" value="228">Togo (+228)</option>
                                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-xs-8 nopad txx_phone">
                        <!--<label for="subject">Phone</label>-->
                        <input type="text" class="form-control ip " id="txsubject_mo" name="txsubject_mo" placeholder="Phone - WhatsApp - it’s quicker!">
                    </div>
                    <!--<label for="subject">Phone</label>-->
                    <?php /*?><input type="text" class="form-control ip" id="txsubject_mo" name="txsubject_mo"  placeholder="Phone - WhatsApp - it’s quicker!"><?php */?>
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Message</label>-->
                    <textarea class="form-control ip" id="txmessage_mo" name="txmessage_mo" rows="3" placeholder="Message "></textarea>
                </div>
                <!--<input type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right" value="Send">-->
                 <!-- <a onClick="goog_report_conversion('<?php echo $link;?>')"  >    ,goog_report_conversion('<?php echo $link;?>')-->
                    <div id="ajaxLoader2" style="display: none;"><img src="<?php echo $url_link;?>libs/images/AjaxLoader.gif" style="width: 32px; height: 32px; display: block; margin: 0 auto;"></div>
                	<!--<button type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right baa bba top10" >SEND</button>-->
                <!--</a>-->
                <div class="g-recaptcha" data-sitekey="6LfbCgMoAAAAAJuvaQcWL7Jea8A_502Gsybir8y9"></div>
            </form>
            <span class="textalert"></span>
        </div>
    </div>
    
    
	<?php /*?><button class="bclose" onClick="clo();"><i class="fa fa-remove " ></i></button>
    <div class="mg-single-room-txt box enbox mobi" id="style-3" style="margin-top:-10px; ">
        <h2 class="mg-sec-left-titles enti"><center>Enquire Now</center></h2>
        
            <form id="form_contact_mobi" class="clearfix">
                <input type="hidden" name="txtID" value="<?php echo $room['id'];?>"><br>
                <div class="mg-contact-form-input col-sm-12 nopad" >
                   <!-- <label for="full-name">Check In</label>-->
                    <!--<!--<input type="date" class="form-control ip iip" id="checkin_mo" name="checkin_mo" placeholder="Check In*" style="width:100%;">-->
                    <input type="date" class="form-control ip iip input-min-width-95p" id="checkin_mo" name="checkin_mo" placeholder="Check In*" onClick="calendar_opt()" value="<?php echo $day;?>">
                    <button type="button" class="buti cin" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
    
                <div class="mg-contact-form-input col-sm-12 nopad" ><!-- -->
                   <!-- <label for="full-name">Check Out</label>-->
                    <input type="date" class="form-control ip input-min-width-95p" id="checkout_mo" name="checkout_mo" placeholder="Check Out*" onClick="calendar_opt()" value="<?php echo date("Y-m-d",$dayNext);?>">
                    <!--<input type="date" class="form-control ip" id="checkout_mo" name="checkout_mo" placeholder="Check Out*">-->
                    <button type="button" class="buti cout" onClick="calendar_opt()"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
                    <div class="mg-contact-form-input  col-xs-6 col-sm-6 nopad" > 
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbGuest_mo" id="cbbGuest_mo" placeholder="No. Adults">
                    </div>
                    <div class="mg-contact-form-input   col-xs-6  col-sm-6 nopad" ><!--col-md-6 nopad-->
                        <!--<label for="full-name">Full Name</label>-->
                        <input type="text" class="form-control ip" name="cbbChildren_mo" id="cbbChildren_mo" placeholder="No. Children (3-12 yrs)">
                    </div>
                
                <div class="mg-contact-form-input col-xs-12 col-sm-12 nopad ipsc" >
                    <!--<label for="full-name">Full Name</label>-->
                    <select class="form-control ips" id="no_bed_mo" name="no_bed_mo"  placeholder="No. Bedroom*">
                        <option value="0">No. Bedroom*</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="10+">10+</option>
                    </select>
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="full-name">Full Name</label>-->
                    <input type="text" class="form-control ip" id="full_name_mo" name="full_name_mo" placeholder="Full Name*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="email">E-mail</label>-->
                    <input type="text" class="form-control ip" id="txemail_mo" name="txemail_mo" onKeyUp="lower_text(this)" placeholder="E-mail*">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Phone</label>-->
                    <input type="text" class="form-control ip" id="txsubject_mo" name="txsubject_mo"  placeholder="Phone Number (optional)">
                </div>
                <div class="mg-contact-form-input">
                    <!--<label for="subject">Message</label>-->
                    <textarea class="form-control ip" id="txmessage_mo" name="txmessage_mo" rows="5" placeholder="Message (optional)"></textarea>
                </div>
                <!--<input type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right" value="Send">-->
                 <!-- <a onClick="goog_report_conversion('<?php echo $link;?>')"  >    ,goog_report_conversion('<?php echo $link;?>')-->
                	<button type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right baa" >Send</button>
                <!--</a>-->
            </form>
            <span class="textalert"></span>
            <!--<br>-->
            
            <div class="footbox"></div>
    </div><?php */?>
    
   <?php /*?> <div class="sp2 mobi hid">
        <center>
            Speak to our villa expert: <a href="tel:+66846771551">+66 84 677 1551</a>
        </center> <br>
    </div><?php */?>
    
    <?php /*?><div class="butto2 mobi hid">
        SHARE : 
            <a><button class="btn btn-main btt" onClick="visitto('tb');" data-toggle="tooltip"  data-placement="bottom" title="Price">$</button></a>
            <a><button class="btn btn-main fb btt" data-toggle="tooltip"  data-placement="bottom" title="Share" onClick="onShare('<?php echo $room['id'];?>','<?php echo $room['name'];?>','<?php echo base64_decode($room['short_det'],true);?>','<?php echo $slide[0];?>');"><i class="fa fa-facebook" aria-hidden="true"></i></button></a>
             <?php 
            $file = json_decode($room['file'],true);
            if($file !='')
            {
                $link = $file;
                echo '<a href="'.$link.'"><button class="btn btn-main pdf btt" data-toggle="tooltip" data-placement="bottom" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button></a>';
            }
            else
            {
                $link = '';
            }
            ?>
            
            <a><button class="btn btn-main visit btt" onClick="popemail()" data-toggle="tooltip" data-placement="bottom" title="Send Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
            <?php 
            if($room['link'] !='')
            {
                ?>
                <a href="<?php echo $room['link'];?>" target="_blank"><button class="btn btn-main email btt" onClick="visitto('tb');" data-toggle="tooltip" data-placement="bottom" title="Tripadvisor"><!--<i class="fa fa-user-plus" aria-hidden="true"></i>--><img src="../../upload/trip.png" width="25" alt=""></button></a>
                <?php
            }
            ?>
    <br><br><br></div><?php */?>
    
   <div class="whychoose2 mobi hid">
        <img src="../../files/Why Choose Us Box.png" width="100%">
    </div>
</div>
</div><!--over mobi-->

<button type="button" onClick="prop_contact_mobi()" class="btn btn-dark-main pull-right baa bba top10 btn_send_en_mob" >SEND</button>

<div class="butenq mobi">
	<button class="btn_enq" onClick="show_question();">Ask Question</button>
    <button class="btn_enq" onClick="popup();" >Enquire Now</button>
    <!--<button class="btn_enq" onClick="pop_enquiry('<?php echo $room['id'];?>','<?php echo $name[0];?>');" >Enquire Now</button>-->
</div>

<div class=" bgu2"></div>
<div class="end_boxes">
	<i class="fa fa-times cloos pull-right" ></i>
    <div class="vi_box"></div>
</div>

<script language="JavaScript">
function check_datein(me)
{
	var today = '<?php echo date("Y-m-d");?>';
	var datein = $(me).val();
	
	var date_1 = today.split("-");
	var date_2 = datein.split("-");
	
	if(date_2[1]<date_1[1])
	{
		setTimeout(function(){
			$(me,'#checkout_mo').val(today);
			$('#checkin_mo').css({'background':'#FFAFB1'});
			$(".btn_send_en_mob").attr('disabled',true);
			$(".m_notis").show();
			$(".m_notis").text('Please check your checkin date!');
		},1000);
	}
	else
	{
		if(date_2[2]<date_1[2])
		{
			setTimeout(function(){
				$(me,'#checkout_mo').val(today);
				$('#checkin_mo').css({'background':'#FFAFB1'});
				$(".btn_send_en_mob").attr('disabled',true);
				$(".m_notis").show();
				$(".m_notis").text('Please check your checkin date!');
			},1000);
		}
		else
		{
			setTimeout(function(){
				$('#checkin_mo').css({'background':'#eee'});
				$(".m_notis").hide();
				$(".btn_send_en_mob").attr('disabled',false);
			},1000);
		}
	}
}

function set_checkout_date(dates,inputt,start,end)
{
	var dates_1 = $(dates).val();
	$('#'+inputt).val(dates_1);
	check_date_mo(start,end);
}

function check_date_mo(start,end)
{
	setTimeout(function(){
	var start_date = $('#'+start).val();
	var end_date = $('#'+end).val();
	
	var date_s = start_date.split("-");
	var date_e = end_date.split("-");
	//alert(start_date);
	//alert('Please check your checkout date!');
	//alert(date_e[2]+'--'+date_s[2]);
	
	if(date_e[2]<date_s[2])
	{
		if(date_e[1]>date_s[1])
		{
			$('#'+end).css({'background':'#eee'});
			$(".m_notis").hide();
			$(".btn_send_en_mob").attr('disabled',false);
		}
		else
		{
			//alert('noooooooooooo');
			$('#'+end).val(start_date);
			$('#'+end).css({'background':'#FFAFB1'});
			$(".btn_send_en_mob").attr('disabled',true);
			$(".m_notis").show();
			$(".m_notis").text('Please check your checkout date!');
		}
	}
	else
	{
		$('#'+end).css({'background':'#eee'});
		$(".m_notis").hide();
		$(".btn_send_en_mob").attr('disabled',false);
		
	}
	//alert(end_date);	
	},1000);
}

  
function pop_enquiry(id,name)
{
	$(".vi_name").html(name);
	
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/fr_enquire.php",
		type:"POST",
		dataType:"html",
		data:{id:id,name:name,pages:"detail"},
		success: function(res){
			$(".vi_box").html(res);
			$(".bgu2").fadeIn(300,function(){
				$(".end_boxes").fadeIn(300);
			});
		}
	});
}

$(document).ready(function(e) {
    $(".bgu1,.cloo").click(function(e) {
        $(".bgu1").fadeOut(300);
		$(".show_u").fadeOut(300);
		$(".youtube").html('');
    });
	 $(".cloos").click(function(e) {
        $(".bgu2,.end_boxes").fadeOut(300);
    });
});

function popup()
{
	$(".enq,.bgw,.baa").fadeIn(300);
	//$('#checkin_mo').focus();
	//$('#checkout_mo').focus();
	setTimeout(function(){
		//$('#checkin_mo').focus();
	},1000);
}

function clo()
{
	$(".enq,.bgw,.baa").fadeOut(300);
}

function prop_contact_mobi()
{

	if($("#form_contact_mobi #full_name_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #full_name_mo").focus();
		$("#form_contact_mobi #full_name_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #txemail_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #txemail_mo").focus();
		$("#form_contact_mobi #txemail_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #no_bed_mo").val()=='0')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #no_bed_mo").focus();
		$("#form_contact_mobi #no_bed_mo").css({"border-color":"red"});
		return false;
	}
	//else if($("#form_contact_mobi #cbbGuest_mo").val()=='')
//	{
//		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
//		$("#cbbGuest_mo").focus();
//		$("#cbbGuest_mo").css({"border-color":"red"});
//		return false;
//	}
	else if($("#form_contact_mobi #checkin_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #checkin_mo").focus();
		$("#form_contact_mobi #checkin_mo").css({"border-color":"red"});
		return false;
	}
	else if($("#form_contact_mobi #checkout_mo").val()=='')
	{
		$(".textalert").text("* Please fill your data");//alert("* Please fill your data");
		$("#form_contact_mobi #checkout_mo").focus();
		$("#form_contact_mobi #checkout_mo").css({"border-color":"red"});
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!$("#form_contact_mobi #txemail_mo").val().match(Email))
		{
		   $(".textalert").text("* Email format is not valid");//alert('Email format is not valid');
		   $("#form_contact_mobi #txemail_mo").focus();
		   return false;
		}
		else
		{  
            showLoader('ajaxLoader2');
			$.ajax({ 
				url:"<?php echo $url_link;?>libs/actions/action-property-contact-mo.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_contact_mobi").serialize(),
				success: function(res){
					if(res.status==true)
					{
									$(".ip").val('');
									window.location = "<?php echo $url_link;?>thanks/<?php echo $room['destination'];?>.html";
									$(".textalert").text("Successful");
									$(".textalert").css({"color":"green"});
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		}
	}
}

$(document).ready(function(e) {
	$(window).resize(function(){
        if($(window).width()<976)
		{
		}
		else
		{
			$('.butenq').fadeOut(30);
			$("#top").css({"margin-bottom":"25px"});
		}
    });
    $(window).scroll(function(e) {
		var win = $(window).width();
		
		if($(this).scrollTop() > $(".mg-footer-widget").offset().top-400)
		{
			if($(window).width()<976)
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
			else
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
		}
		else
		{
			if($(window).width()<976)
			{
				if($(window).width()<380)
				{
					$("#top").css({"margin-bottom":"85px"});
				}
				else
				{
					$("#top").css({"margin-bottom":"75px"});
				}
				$('.butenq').fadeIn(300);
				
			}
			else
			{
				$('.butenq').fadeOut(300);
				$("#top").css({"margin-bottom":"25px"});
			}
		}
    });
});
//-->
</script>