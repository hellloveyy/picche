<?php 

/* --------------------------------------------------------------------

  Chevereto
  http://chevereto.com/

  @author	Rodolfo Berrios A. <http://rodolfoberrios.com/>
			<inbox@rodolfoberrios.com>

  Copyright (C) Rodolfo Berrios A. All rights reserved.
  
  BY USING THIS SOFTWARE YOU DECLARE TO ACCEPT THE CHEVERETO EULA
  http://chevereto.com/license

  源码发布唯一QQ群：687305290 
  源码发布唯一TG：t.me/freechevereto
  源码发布唯一博客：www.sakurabk.net
  
  --------------------------------------------------------------------- */
  
/* --------------------------------------------------------------------
  
							   WARNING
   
  This system is not about making installations stop working by
  software. This system is about fast recognition of invalid
  installations and then submit copyright complaints to the
  participating parties (website owner, hosting company, network
  operator, domain register, etc).
  
  The system will never output 'legal' or 'illegal' or make a
  working an installation to stop. It will just output strings.
  You indeed can have the system working even with this file empty,
  but that will label your installation as illegal upon license
  check to the eyes of Chevereto copyright holder and if that happens
  the use of the Chevereto in the target website will be forbidden.
  
  Chevereto license check system works like any normal request and
  it works in two steps:
  
  1. Ask for the license identifier ($public_id)
  2. Ask for $hash which is generated using $secret and a value
     provided in the request (complement).
  
  The complement is provided in the request and the result is an 
  encrypted string ($hash). This result must match with the one
  stored at Chevereto.com and that only happens if the complement
  match with the $secret, therefore, it will only match if
  $license is a valid Chevereto license.
    
  Any modification of this file, unexpected output, deny the request,
  etc. Will label the installation as illegal to the copyright holder.
  
  Basically don't modify this file.
  
  For license terms and end user license agreement please read:
  http://chevereto.com/license
  
  --------------------------------------------------------------------- */

if(!defined('access') or !access) die('This file cannot be directly accessed.');
  
if(isset($_REQUEST['chv-license-info'])) {
	function get_license_info() {
		require_once(G_APP_PATH . 'license/key.php');
		list($public_id, $secret) = explode(':', $license);
		$json = ['code' => 400];
		if($_REQUEST['get'] == 'id') {
			$return = $public_id;
		}
		if($_REQUEST['get'] == 'hash' and !empty($_REQUEST['complement'])) {
			$return = hash('sha512', $secret.$_REQUEST['complement']);
		}
		if(isset($return)) {
			$json = ['code' => 200, 'return' => $return];
		}
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-cache, must-revalidate');
		header('Pragma: no-cache');
		header('Content-type: application/json; charset=UTF-8');
		die(json_encode($json));
	}
	get_license_info();
}