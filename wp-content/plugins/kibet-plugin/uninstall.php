<?php

/**
 * To be triggered on plugin uninstall
 * 
 * @package KibetPLugin
 */

 // security
 if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
 }

//  clear DB data
