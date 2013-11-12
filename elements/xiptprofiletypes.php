<?php
/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @contact		support+profiletypemetamod@readybytes.in
* @author 		Manish Trivedi
*/
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.form.formfield');

include_once JPATH_ROOT.'/modules/mod_profiletypemetamod/helper.php';

require_once XIPT_FRONT_PATH.'/form/profiletypes.php';

class JFormFieldXiptProfiletypes extends JFormFieldProfiletypes
{}