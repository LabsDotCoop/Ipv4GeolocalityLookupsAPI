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

	
	define('MAXIMUM_QUERIES', 35);
	ini_set('memory_limit', '128M');
	include dirname(__FILE__).'/functions.php';
	error_reporting(E_ERROR);

	$help=false;
	if ((!isset($_GET['mode']) || empty($_GET['mode'])) && (!isset($_GET['ip']) || empty($_GET['ip']))) {
		$help=true;
	} elseif (isset($_GET['output']) || !empty($_GET['output'])) {
		$mode = trim($_GET['mode']);
		$ip = trim($_GET['ip']);
		$output = trim($_GET['output']);
	} else {
		$help=true;
	}
	
	if ($help==true) {
		http_response_code(400);
		include dirname(__FILE__).'/help.php';
		exit;
	}
	http_response_code(200);
	$data = findDetails($ip, $mode, $output);
	switch ($output) {
		default:
			echo '<h1>' . $ip . ' (IP locality data)</h1>';
			echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
			echo $data;
			echo '</pre>';
			break;
		case 'raw':
			echo $data;
			break;
		case 'json':
			header('Content-type: application/json');
			echo json_encode($data);
			break;
		case 'serial':
			header('Content-type: text/html');
			echo serialize($data);
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			echo $dom->saveXML();
			break;
	}
?>