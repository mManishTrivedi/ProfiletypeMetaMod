<?php
/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @contact		support+profiletypemetamod@readybytes.in
* @author 		Manish Trivedi
*/
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

include_once JPATH_ROOT.'/modules/mod_profiletypemetamod/helper.php';

class JFormFieldProfiletypemodule extends JFormField
{
	public $type = 'Profiletypemodule'; 
	
	function getInput()
	{
		// get array of all visible profile types (std-class)
		$moduleArray = self::getAllModules(1);
		
		return JHTML::_('select.genericlist',  $moduleArray, $this->name, null, 'id', 'title', $this->value);
	}
	
	static function getAllModules($published = '')
	{
		$query = new XiptQuery();
		$query->select('*');
		$query->from('#__modules');
		$query->where("`published` = $published");
		
		$query->order('ordering');	
		$modules =$query->dbLoadQuery("","")->loadObjectList();			 	    	
		
		return $modules;	
	}
}