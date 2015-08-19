<?php
/**
 * Chronolabs IP Lookup's REST API File
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @package         lookups
 * @since           1.1.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: index.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Internet Protocol Address Information API Service REST
 */

	$pu = parse_url($_SERVER['REQUEST_URI']);
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
	if (strlen($theip = whitelistGetIP(true))==0)
		$theip = "127.0.0.1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 	$servicename = "IPv4 Locality Lookups"; 
		$servicecode = "IPLL"; ?>
	<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"]; ?>" />
	<meta property="og:site_name" content="<?php echo $servicename; ?> Open Services API's (With Source-code)"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="rating" content="general" />
	<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="copyright" content="Chronolabs Cooperative &copy; <?php echo date("Y")-1; ?>-<?php echo date("Y")+1; ?>" />
	<meta http-equiv="generator" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="apple-touch-icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<meta property="og:image" content="//labs.partnerconsole.net/execute2/external/reseller-logo"/>
	<link rel="stylesheet" href="/style.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/gradientee/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/shadowing/styleheet.css" type="text/css" />
	<title><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</title>
	<meta property="og:title" content="<?php echo $servicecode; ?> API"/>
	<meta property="og:type" content="<?php echo strtolower($servicecode); ?>-api"/>
	<!-- AddThis Smart Layers BEGIN -->
	<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
	<script type="text/javascript">
	  addthis.layers({
		'theme' : 'transparent',
		'share' : {
		  'position' : 'right',
		  'numPreferredServices' : 6
		}, 
		'follow' : {
		  'services' : [
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'Cipherhouse'},
			{'service': 'twitter', 'id': 'OpenRend'},
			{'service': 'facebook', 'id': 'Chronolabs'},
			{'service': 'linkedin', 'id': 'founderandprinciple'},
			{'service': 'google_follow', 'id': '105256588269767640343'},
			{'service': 'google_follow', 'id': '116789643858806436996'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->
</head>

<body>
<div class="main">
    <h1><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</h1>
    <p>This is an API Service for conducting a locational search for a place. It provides the location of the IP address, in reference to country and city as well as a proximate longitude and latitude of the IP Address.</p>
    <p>We use a combination of the API Available from <a target="_blank" href="http://ipinfodb.com">http://ipinfodb.com</a> as well as our own region and locational database for longitude and latitude.</p>
    <h2>Examples of Calls (Using JSON)</h2>
    <p>There is a couple of calls to the API which I will explain.</p>
    <blockquote>For example if you want a call getting a city information you would :: <a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/json.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/json.api</a> or in a couple of hours you can use SSL <a href="https://lookup.labs.coop/v1/city/<?php echo $theip; ?>/json.api" target="_blank">https://lookups.labs.coop/v1/city/<?php echo $theip; ?>/json.api</a> which will return the city details of the IP Address of course there is a country data too which would be the following: <a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/json.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/json.api</a> or if you want to return either details on some form of netbios address you would do the following for example returning the country or city details of bluehost.com would be as follows: <a href="<?php echo $source; ?>v1/city/bluehost.com/json.api" target="_blank"><?php echo $source; ?>v1/city/bluehost.com/json.api</a>.<br/><br/>Of course there is a way of return from your current IP Address of route you would do the following for country or city information using the keyword <em>myself</em> instead of an IP Address or TLD/Subdomain to query on yourself! <a href="<?php echo $source; ?>v1/country/myself/json.api" target="_blank"><?php echo $source; ?>v1/country/myself/json.api</a> this for example will return your own source IP Address for the API information for country, for the city information you would subsitute <strong>country</strong> for <strong>city</strong>.</blockquote>
    <h2>RAW Document Output</h2>
    <p>This is done with the <em>raw.api</em> extension at the end of the url, you replace the example address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a locality country information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/raw.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/raw.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/raw.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/raw.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/raw.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/raw.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/raw.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/raw.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/myself/raw.api" target="_blank"><?php echo $source; ?>v1/country/myself/raw.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/myself/raw.api" target="_blank"><?php echo $source; ?>v1/city/myself/raw.api</a></strong></em><br /><br />
    </blockquote>
    <h2>HTML Document Output</h2>
    <p>This is done with the <em>html.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
         <font color="#009900">This is for a locality country information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/html.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/html.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/html.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/html.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/html.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/html.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/html.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/html.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/myself/html.api" target="_blank"><?php echo $source; ?>v1/country/myself/html.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/myself/html.api" target="_blank"><?php echo $source; ?>v1/city/myself/html.api</a></strong></em><br /><br />
		</blockquote>
    <h2>Serialisation Document Output</h2>
    <p>This is done with the <em>serial.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
         <font color="#009900">This is for a locality country information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/serial.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/serial.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/serial.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/serial.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/serial.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/serial.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/serial.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/serial.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/myself/serial.api" target="_blank"><?php echo $source; ?>v1/country/myself/serial.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/myself/serial.api" target="_blank"><?php echo $source; ?>v1/city/myself/serial.api</a></strong></em><br /><br />  </blockquote>
    <h2>JSON Document Output</h2>
    <p>This is done with the <em>json.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
                <font color="#009900">This is for a locality country information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/json.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/json.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/json.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/json.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/json.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/json.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/json.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/json.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/myself/json.api" target="_blank"><?php echo $source; ?>v1/country/myself/json.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/myself/json.api" target="_blank"><?php echo $source; ?>v1/city/myself/json.api</a></strong></em><br /><br /> </blockquote>
    <h2>XML Document Output</h2>
    <p>This is done with the <em>xml.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a locality country information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo $theip; ?>/xml.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo $theip; ?>/xml.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip <em>'<?php echo $theip; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo $theip; ?>/xml.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo $theip; ?>/xml.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/xml.api" target="_blank"><?php echo $source; ?>v1/country/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/xml.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the hostname to the API <em>'<?php echo strtolower($_SERVER['HTTP_HOST']); ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/xml.api" target="_blank"><?php echo $source; ?>v1/city/<?php echo strtolower($_SERVER['HTTP_HOST']); ?>/xml.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality country information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/country/myself/xml.api" target="_blank"><?php echo $source; ?>v1/country/myself/xml.api</a></strong></em><br /><br />
		<font color="#009900">This is for a locality city information of the ip of the caller to the API <em>'myself'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/city/myself/xml.api" target="_blank"><?php echo $source; ?>v1/city/myself/xml.api</a></strong></em><br /><br />   </blockquote>
    <h2>PHP Example of getting clients IP Address</h2>
    <p>These is the best example in PHP for getting a client IP address. The function returning the true IP of the client browsing for the API in retrieving a key and generating one!</p>
    <blockquote>
		<pre>
/**
 * Get client IP
 *
 * Adapted from PMA_getIp() [phpmyadmin project]
 *
 * @param bool $asString requiring integer or dotted string
 * @return mixed string or integer value for the IP
 */
function getIP($asString = true)
{
	// Gets the proxy ip sent by the user
	$proxy_ip = '';
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else
		if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
		} else
			if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
				$proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
			} else
				if (!empty($_SERVER['HTTP_FORWARDED'])) {
					$proxy_ip = $_SERVER['HTTP_FORWARDED'];
				} else
					if (!empty($_SERVER['HTTP_VIA'])) {
						$proxy_ip = $_SERVER['HTTP_VIA'];
					} else
						if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
							$proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
						} else
							if (!empty($_SERVER['HTTP_COMING_FROM'])) {
								$proxy_ip = $_SERVER['HTTP_COMING_FROM'];
							}
	if (!empty($proxy_ip) && $is_ip = preg_match('/^([0-9]{1,3}.){3,3}[0-9]{1,3}/', $proxy_ip, $regs) && count($regs) > 0)  {
		$the_IP = $regs[0];
	} else {
		$the_IP = $_SERVER['REMOTE_ADDR'];
	}
	$the_IP = ($asString) ? $the_IP : ip2long($the_IP);
	return $the_IP;
}
		</pre>
	</blockquote>
   <?php if (file_exists($fionf = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apis-labs.coop.html')) {
    	readfile($fionf);
    }?>	
    <?php if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) { ?>
    <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. This will reset every hour and the response of a 404 document not found will be provided if you have exceeded your query limits. You can add yourself to the whitelist by using the following form API <a href="https://whitelist.labs.coop/">Whitelisting form</a>. This is only so this service isn't abused!!</p>
    <?php } ?>
    <h2>The Author</h2>
    <p>This was developed by Simon Roberts in 2014 and is part of the Chronolabs System and Xortify. if you need to contact simon you can do so at the following address <a href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 
