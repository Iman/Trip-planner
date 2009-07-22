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
 * AbstractBoarding
 * 
 * Boarding class abstract.
 * 
 * @package Boarding
 * @abstract AbstractBoarding
 * 
 * @method add()
 * @method setBegin()
 * @method setCurrent()
 * @method setEnd()
 * @method getCurrent()
 * @method getAllPrev()
 * @method getAllNext()
 * @method getNext()
 * @method getPrev()
 */
abstract class AbstractBoarding {
	
	private static $node;
	private static $context;
	private static $transportType;
	
	// --------------------------------------------------------------------
	

	/**
	 * Add
	 * 
	 * Adding the boarding information including the location, location description, transport types, destination, 
	 * transport number, seat, gate, counter and gate information.
	 * 
	 * @name add
	 * @param string Location 
	 * @param mixed Context
	 * @param mixed TransportType 
	 * @param mixed Destination 
	 * @param mixed TransportNumber
	 * @param mixed Seat
	 * @param mixed Counter
	 * @param mixed Gate
	 * @abstract Add abstract method 
	 * @access public
	 * @method void
	 */
	abstract function add($node, $context = null, $type = null, $destination = null, $transportNumber = null, $seat = null, $counter = null, $gate = null);
	
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
// --------------------------------------------------------------------


/**
 * Boarding
 * 
 * Boarding class.
 * @abstract AbstractBoarding
 * 
 * <code>
 * Example of use:
 *   
 * ie. add ( 'Start Point', 'Description', 'Type of Transport', 'Destination', 'Transport Number', 'Seat', 'Counter',  ' Gate');
 * 
 * Boarding::add ( 'Madrid', 'Take train etc..', 'Train', 'Barcelona', '78A', '45B' );
 * Boarding::add ( 'Gairport bus', 'Take the airport bus etc... No seat assignment.', 'Bus' );
 * Boarding::add ( 'Gerona Airport', 'From Gerona Airport etc..', 'Air', 'Stockholm', 'SK455', '3A', '344',  ' 45B');
 * Boarding::add ( 'Stockholm', 'From Stockholm etc..', 'Air', 'New York JFK', 'SK22', '7B', null,  ' 22');
 * Boarding::add ( 'arrived', 'You have arrived at your final destination.');
 * 
 * Boarding::setBegin('Gairport');
 * Boarding::setCurrent ( 'Gerona' );
 * Boarding::setEnd('Stockton');
 * 
 * print_r ( Boarding::getCurrent ();
 * print_r ( Boarding::getNext () );
 * print_r ( Boarding::getPrev () );
 * print_r ( Boarding::getAllNext () );
 * print_r ( Boarding::getAllPrev () );
 * 
 * </code>
 */

class Boarding extends AbstractBoarding {
	
	private static $count;
	private static $set;
	
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
	
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * Add
	 * 
	 * Adding the boarding information including the location, location description, transport types, destination, 
	 * transport number, seat, gate, counter and gate information.
	 * 
	 * @name add
	 * @param string Location 
	 * @param mixed Context
	 * @param mixed TransportType 
	 * @param mixed Destination 
	 * @param mixed TransportNumber
	 * @param mixed Seat
	 * @param mixed Counter
	 * @param mixed Gate
	 * @access public
	 * @method void
	 */
	public function add($node, $context = null, $type = null, $destination = null, $transportNumber = null, $seat = null, $counter = null, $gate = null) {
		
		if ($destination)
			Transport::makeTransportType ( $type )->setTransportNumber ( $transportNumber );
		
		if ($transportNumber)
			Transport::makeTransportType ( $type )->setDestination ( $destination );
		
		if ($destination && method_exists ( Transport::makeTransportType ( $type ), 'setCounter' ))
			Transport::makeTransportType ( $type )->setCounter ( $counter );
		
		if ($gate && method_exists ( Transport::makeTransportType ( $type ), 'setGate' ))
			Transport::makeTransportType ( $type )->setGate ( $gate );
		
		if ($seat && method_exists ( Transport::makeTransportType ( $type ), 'setSeat' ))
			Transport::makeTransportType ( $type )->setSeat ( $seat );
		
		$transport = Transport::makeTransportType ( $type )->data;
		
		Destination::add ( $node, array ('desc' => $context, 'transport' => $transport ) );
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
		Destination::setBegin ( $node );
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
		Destination::setCurrent ( $node );
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
		Destination::setEnd ( $node );
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
		return Destination::getCurrent ();
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
		return Destination::getAllNext ();
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
		return Destination::getAllPrev ();
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
		return Destination::getNext ();
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
		return Destination::getPrev ();
	
	}
}
?>