<?php
/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @contact		support+profiletypemetamod@readybytes.in
* @author 		Manish Trivedi
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');

// Check XiPT Exist or not
$xiptPath = JPATH_ROOT.'/components/com_xipt';

if(!JFolder::exists($xiptPath)) {
	JFactory::getApplication()->enqueueMessage('XiPT is not exist', 'warning');
	return false;
}
	
include_once $xiptPath.'/api.xipt.php';


class ProfiletypeMetaModHelper
{
	/**
	 * 
	 * return specific module
	 * @param unknown_type $params
	 * @param unknown_type $attribs
	 */
	public static function displayModules($params, $attribs = array())
	{		
		$userId = JFactory::getUser()->get('id', 0);
		
		$pID = XiptAPI::getUserProfiletype($userId);
		
		//get module params
		$modId  = $params->get('profiletypemodule');
		$modPt  = $params->get('xiprofiletypes');
		
		$module = self::getModule($modId);
		
		//custom module name is given by the title field
		$file			= $module->module;
		$custom 		= substr( $file, 0, 4 ) == 'mod_' ?  0 : 1;
		$module->user  	= $custom;
		$module->name	= $custom ? $module->title : substr( $file, 4 );
		
		
		//check profiletype in module params, if its not an array, convert it
		if(!is_array($modPt)) {
			$modPt = array($modPt);
		}
			
		//check user Pid exists in module params or not
		if(!in_array($pID, $modPt)) {
			return;
		}
		
		// If style attributes are not given or set,
		// we enforce it to use the xhtml style
		// so the title will display correctly.
		if(!isset($attribs['style'])){
			$attribs['style']	= 'xhtml';
		}
			
		$contents 	= '';
		$document	= JFactory::getDocument();
		$renderer	= $document->loadRenderer( 'module' );
		$contents  .= $renderer->render($module, $attribs);
		
		return $contents;
	}
	
	public static function getModule($modId = 0)
	{
		$query = new XiptQuery();
		$query->select('*');
		$query->from('#__modules');
		$query->where("`id` = $modId");
			
		$module =$query->dbLoadQuery("","")->loadObject();			 	    	
		
		return $module;	
	}
}