<?php
/**
 *
 * An open source application development for PHP 5.2.6 or newer
 *
 * @package	Trip sorter
 * @subpackage	Libs
 * @author		Iman Samizadeh
 * @e-Mail		iman@imanpage.com
 * @copyright	Copyright (c) 2009. All Rights reserved
 * @abstract
 * @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * 			This version may have been modified pursuant
 * 			to the GNU General Public License, and as distributed it includes or
 * 			is derivative of works licensed under the GNU General Public License or
 * 			other free or open source software licenses.
 * @since Version 1.0
 * @UTF-8
 * 
 */

// --------------------------------------------------------------------


/**
 * Function loader
 * @access 	public
 * @param	string	classname
 * @method __autoload
 * @return	magic __autoload
 */

function __autoload($classname) {
	if (file_exists ( "libs/${classname}.class.php" )) {
		require_once "libs/${classname}.class.php";
	}
	if (! class_exists ( $classname )) {
		die ( "Class not found: $classname" );
	}
}
?>