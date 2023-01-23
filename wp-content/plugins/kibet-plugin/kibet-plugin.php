<?php

/**
 * @package KibetPLugin
 */

/*
 *plugin Name: Custom Plugin

* Plugin URI: https://developers.paymentsds.org/
 * 
 * Description: THe first custom plugin.
 * 
 * Author: David Rono < https://www.softwareske.com/>
 * 
 * Version: 1.0.0
 * 
 * Author URI: https://developers.paymentsds.org/
 *
 * Requires at least: 4.6
 * 
 * Tested up to: 5.8.1
 *
 * WC requires at least: 3.5.0
 * 
 * WC tested up to: 5.1
 *
 * License: GPLv2 or later
 * 
 * Text Domain:kibet-plugin
 * 
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html

 * Copyright 2022 SoftwaresKe Ltd. All Rights Reserved

 */


// **********************************start of security********************************************

// option 1
 if(! defined('ABSPATH')){
    die;
 }

// option 2
//  defined('ABSPATH') or die('You cannot access this file');

// option 3
// if(! function_exists('add_action')){
//     echo 'You cannot access this file';
//     exit;
// }

// **********************************end of security********************************************


// **********************************start of class ********************************************

class KibetPlugin {
    // methods

}
// **********************************end of class ********************************************

// **********************************start of instance of KibetPlugin *************************

$kibetplugin = new KibetPlugin();

// **********************************end of instance of KibetPlugin *************************

