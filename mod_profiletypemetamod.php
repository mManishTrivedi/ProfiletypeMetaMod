<?php
/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @contact		support+profiletypemetamod@readybytes.in
* @author 		Manish Trivedi
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

		
// Include the helper functions only once
require_once (dirname(__FILE__).DS.'helper.php');

echo ProfiletypeMetaModHelper::displayModules($params);