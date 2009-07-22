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
 * @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * 			This version may have been modified pursuant
 * 			to the GNU General Public License, and as distributed it includes or
 * 			is derivative of works licensed under the GNU General Public License or
 * 			other free or open source software licenses.
 * @since Version 1.0
 * 
 */

// --------------------------------------------------------------------

/**
 * AbstractDestination class
 * 
 * Destination abstract .
 * 
 * @package Destination
 * @abstract AbstractDestination
 * @method add()
 * @method setBegin()
 * @method setCurrent()
 * @method setEnd()
 * @method getCurrent()
 * @method getAllPrev()
 * @method getAllNext()
 * @method getNext()
 * @method getPrev()
 * @param string node
 * @param mixed context
 */
abstract class AbstractDestination {
	
	private static $node;
	private static $context;
	
	// --------------------------------------------------------------------
	

	/**
	 * Add
	 * 
	 * Adding the destination information as location and description.
	 * 
	 * @name add
	 * @param string Location 
	 * @param mixed Context
	 * @abstract Add abstract method 
	 * @access public
	 * @method void
	 */
	abstract function add($node, $context = null);
	
	// --------------------------------------------------------------------
	

	/**
	 * setBegin
	 * 
	 * Set beginning of the journey 
	 * 
	 * @name setBegin
	 * @param string 
	 * @abstract setBegin abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setBegin($node);
	
	// --------------------------------------------------------------------
	

	/**
	 * setCurrent
	 * 
	 * Set for current location/step of the journey
	 * 
	 * @name setCurrent
	 * @param string 
	 * @abstract setCurrent abstract method
	 * @access public
	 * @method void
	 */
	abstract function setCurrent($node); //Mandatory
	

	// --------------------------------------------------------------------
	

	/**
	 * setEnd
	 * 
	 * Set end point of the journey
	 * 
	 * @name setEnd
	 * @param string 
	 * @abstract setEnd abstract method
	 * @access public
	 * @method void
	 */
	abstract function setEnd($node);
	
	// --------------------------------------------------------------------
	

	/**
	 * getCurrent
	 * 
	 * Get current location information
	 * 
	 * @name getCurrent
	 * @abstract getCurrent abstract method
	 * @access public
	 * @return array
	 */
	abstract function getCurrent();
	
	// --------------------------------------------------------------------
	

	/**
	 * getAllPrev
	 * 
	 * Get all previous steps and information before current location
	 * 
	 * @name getAllPrev
	 * @abstract getAllPrev abstract method
	 * @access public
	 * @return array
	 */
	abstract function getAllPrev();
	
	// --------------------------------------------------------------------
	

	/**
	 * getAllNext
	 * 
	 * Get all steps and information after current location
	 * 
	 * @name getAllNext
	 * @abstract getAllNext abstract method
	 * @access public
	 * @return array
	 */
	abstract function getAllNext();
	
	// --------------------------------------------------------------------
	

	/**
	 * getNext
	 * 
	 * Get just the next step after current location
	 * 
	 * @name getNext
	 * @abstract getNext abstract method
	 * @access public
	 * @return array
	 */
	abstract function getNext();
	
	// --------------------------------------------------------------------
	

	/**
	 * getPrev
	 * 
	 * Get just the previous step before current location
	 * 
	 * @name getPrev
	 * @abstract getPrev abstract method
	 * @access public
	 * @return array
	 */
	abstract function getPrev();
}

/**
 * Destination
 * 
 * Destination class.
 * @abstract AbstractDestination
 * 
 * <code>
 * Destination::add ( 'A', 'Info here' );
 * Destination::add ( 'B', 'Info here' );
 * Destination::add ( 'C', 'Info here' );
 * Destination::add ( 'D', 'Info here' );
 * Destination::add ( 'E', 'Info here' );
 * Destination::add ( 'F', 'Info here' );
 * Destination::add ( 'J', 'Info here' );
 * Destination::add ( 'K', 'Info here' );
 * Destination::add ( 'L', 'Info here' );
 * 
 * Destination::setBegin ( 'B' );
 * Destination::setCurrent ( 'D' );
 * Destination::setEnd ( 'J' );
 * 
 * print_r ( Destination::getCurrent () );
 * print_r ( Destination::getNext () );
 * print_r ( Destination::getPrev () );
 * print_r ( Destination::getAllNext () );
 * print_r ( Destination::getAllPrev () );
 * </code>
 */
class Destination extends AbstractDestination {
	
	private static $object;
	private static $count;
	private static $curr;
	private static $end;
	private static $begin;
	
	// --------------------------------------------------------------------
	

	/**
	 * Function construction
	 *
	 * @access 	public
	 * @param	string	clsss construction()
	 * @method __construct
	 * @return	magic __construct
	 */
	public function __construct() {
		$this->count = 0;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * Add
	 * 
	 * Adding the destination information as location and description.
	 * 
	 * @name add
	 * @param string Location 
	 * @param mixed Context
	 * @abstract Add abstract method 
	 * @access public
	 * @method void
	 */
	public function add($node, $context = null) {
		$array = array ('key' => self::$count, 'index' => $node, 'context' => $context );
		$object = self::parseArrayToObject ( $array );
		self::$count ++;
		self::$object [self::$count] = $object;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setBegin
	 * 
	 * Set beginning point of the journey
	 * 
	 * @name setBegin
	 * @param string 
	 * @access public
	 * @method void
	 */
	public function setBegin($node) {
		self::$begin = $node;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setCurrent
	 * 
	 * Set current point of the journey
	 * 
	 * @name setCurrent
	 * @param string 
	 * @access public
	 * @method void
	 */
	public function setCurrent($node) {
		reset ( self::$object );
		for($i = 1; $i <= self::$count; $i ++) {
			if (self::$object [$i]->index == $node)
				break;
			next ( self::$object );
		}
		self::$curr = current ( self::$object );
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setEnd
	 * 
	 * Set end point of the journey
	 * 
	 * @name setEnd
	 * @param string 
	 * @access public
	 * @method void
	 */
	public function setEnd($node) {
		self::$end = $node;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getCurrent
	 * 
	 * Get the current location
	 * 
	 * @name getCurrent
	 * @access public
	 * @return array
	 */
	public function getCurrent() {
		return self::$curr;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getAllNext
	 * 
	 * Get all next steps and information before current location
	 * 
	 * @name getAllNext
	 * @access public
	 * @return array
	 */
	public function getAllNext() {
		self::setCurrent ( self::$curr->index );
		for($i = self::$curr->key + 1; $i < self::$count; $i ++) {
			if (self::$object [$i]->index == self::$end)
				break;
			$set [] = next ( self::$object );
		
		}
		return $set;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getAllPrev
	 * 
	 * Get all previous steps and information before current location
	 * 
	 * @name getAllPrev
	 * @access public
	 * @return array
	 */
	
	public function getAllPrev() {
		self::setCurrent ( self::$curr->index );
		for($i = 1; $i <= self::$curr->key; $i ++) {
			if (self::$object [$i]->index == self::$begin)
				break;
			$set [] = prev ( self::$object );
		}
		return $set;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getNext
	 * 
	 * Get just the next step before current location
	 * 
	 * @name getNext
	 * @access public
	 * @return array
	 */
	public function getNext() {
		self::setCurrent ( self::$curr->index );
		return next ( self::$object );
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getPrev
	 * 
	 * Get just the previous step before current location
	 * 
	 * @name getPrev
	 * @access public
	 * @return array
	 */
	public function getPrev() {
		self::setCurrent ( self::$curr->index );
		return prev ( self::$object );
	}
	// --------------------------------------------------------------------
	

	/**
	 * parseArrayToObject
	 * 
	 * parse Array to Object
	 * 
	 * @name parseArrayToObject
	 * @access private
	 * @return object
	 */
	private static function parseArrayToObject($array) {
		$object = new stdClass ( );
		if (is_array ( $array ) && count ( $array ) > 0) {
			foreach ( $array as $name => $value ) {
				$name = strtolower ( trim ( $name ) );
				if (! empty ( $name )) {
					$object->$name = $value;
				}
			}
		}
		return $object;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * parseObjectToArray
	 * 
	 * parse Object to Array
	 * 
	 * @name parseObjectToArray
	 * @access private
	 * @return array
	 */
	private static function parseObjectToArray($object) {
		$array = array ();
		if (is_object ( $object )) {
			$array = get_object_vars ( $object );
		}
		return $array;
	}
}
?>