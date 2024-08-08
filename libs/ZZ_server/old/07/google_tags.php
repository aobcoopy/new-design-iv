<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('consent', 'default', {
    'ad_user_data': 'denied',
    'ad_personalization': 'denied',
    'ad_storage': 'denied',
    'analytics_storage': 'denied',
	'region': ['ES', 'FR','EU'],
    'wait_for_update': 500,
	'functionality_storage' : 'denied',
	'personalization_storage' : 'denied',
  });
  gtag('js', new Date());
  gtag('config', 'G-9MDN99P4YS');
  gtag("set", "ads_data_redaction", true);
  gtag("set", "url_passthrough", true);
</script>

<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-59VWVL67');

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXJL4NQ');

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P46GWJJ');
</script>




<!--consent-->



<script>
 /* var grantButton = document.getElementById("btn__consent");
  
  grantButton.addEventListener("click", function() {
    localStorage.setItem("consentGranted", "true");
    function gtag() { dataLayer.push(arguments); }

    gtag('consent', 'update', {
      ad_user_data: 'granted',
      ad_personalization: 'granted',
      ad_storage: 'granted',
      analytics_storage: 'granted'
    });
  });*/
  
  /*document.getElementById("btn__consent").addEventListener("click", function() {
    localStorage.setItem("consentGranted", "true");
    function gtag() { dataLayer.push(arguments); }

    gtag('consent', 'update', {
      ad_user_data: 'granted',
      ad_personalization: 'granted',
      ad_storage: 'granted',
      analytics_storage: 'granted'
    });
  });*/

  // Load gtag.js script.
  var gtagScript = document.createElement('script');
  gtagScript.async = true;
  gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=GTM-5TDJV4Z3';

  var firstScript = document.getElementsByTagName('script')[0];
  firstScript.parentNode.insertBefore(gtagScript,firstScript);
  
  
function allConsentGranted() {
  gtag('consent', 'update', {
    'ad_user_data': 'granted',
    'ad_personalization': 'granted',
    'ad_storage': 'granted',
    'analytics_storage': 'granted'
  });
}

function allConsentDenied() {
  gtag('consent', 'update', {
    'ad_user_data': 'denied',
    'ad_personalization': 'denied',
    'ad_storage': 'denied',
    'analytics_storage': 'denied'
  });
}

$(document).ready(function(e) {
	var cookiess = '<?php echo (isset($_COOKIE['iv_usip']))?1:0;?>';
	var google_consent_status = '<?php echo (isset($_COOKIE['google_consent_status']))?$_COOKIE['google_consent_status']:0;?>';
	
	setTimeout(function(){
	//alert(cookiess);
	
		if(cookiess==1)
		{
			if(google_consent_status=='Agree')
			{
				allConsentGranted();
			}
			else
			{
				allConsentDenied();
			}
		}
	},3000);
});

</script>

<!--consent-->






<?php
if($page=='propertydetail')
{
	?>
    <!-- Event snippet for Enquiry Now conversion page -->
	<!--<script>
      gtag('event', 'conversion', {'send_to': 'AW-785842676/pMJtCOWXnssDEPSD3PYC'});
    </script>-->
    
    <!-- Google tag (gtag.js) -->
	<!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-785842676"></script>-->
    <!--<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-785842676');
    </script>-->
    <!-- Event snippet for Enquiry Now conversion page -->
	<!--<script>
      gtag('event', 'conversion', {'send_to': 'AW-785842676/pMJtCOWXnssDEPSD3PYC'});
    </script>-->
	<?php
}
?>



<script id="cookieyes"  type="text/javascript" src="https://cdn-cookieyes.com/client_data/2c153a3cdc1ff4c35e4e3dd3/script.js"></script>




<!-- Start cookieyes banner -->  <!-- End cookieyes banner -->



