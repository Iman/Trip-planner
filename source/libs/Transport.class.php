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
 * AbstractFactoryMethod class
 * 
 * This is a Transport class engineered in PHP Factory Method of Design Pattern.
 * 
 * @package Transport
 * @abstract AbstractFactoryMethod
 * @method makeTransportType()
 */
abstract class AbstractFactoryMethod {
	
	private $param;
	
	// --------------------------------------------------------------------
	

	/**
	 * makeTransportType
	 * 
	 * Create an instance of makeTransportType
	 * 
	 * @param string $param a string name of the transport mean ie. Air 
	 * @access protected
	 */
	abstract function makeTransportType($param);

}

// --------------------------------------------------------------------


/**
 * Transport
 * 
 * Transport class (TransportTypeFactoryMethod)
 * 
 * <code>
 * Example of use:
 * 
 * $type = 'Air';
 * 
 * Transport::makeTransportType ( $type )->setTransportNumber ( 'FK59' );
 * Transport::makeTransportType ( $type )->setDestination ( 'London' );
 * Transport::makeTransportType ( $type )->setCounter ( 'A78' );
 * Transport::makeTransportType ( $type )->setGate ( '32' );
 * Transport::makeTransportType ( $type )->setSeat ( '18A' );
 * 
 * print_r($transport = Transport::makeTransportType ( $type )->data);
 * 
 * </code>
 * 
 * @name TransportTypeFactoryMethod
 * @method makeTransportType
 * @abstract AbstractFactoryMethod
 * @param string
 */

//This is a TransportTypeFactoryMethod which can be renamed to the actual class name for PHP5 magic loader
class Transport extends AbstractFactoryMethod {
	
	protected $param;
	
	// --------------------------------------------------------------------
	

	/**
	 * makeTransportType
	 * 
	 * Air transport abstract
	 * 
	 * @name makeTransportType
	 * @access public
	 * @method object
	 */
	
	public function makeTransportType($param) {
		$transport = NULL;
		switch ($param) {
			case "Air" :
				$transport = new TransportByAir ( );
				break;
			case "Train" :
				$transport = new TransportByTrain ( );
				break;
			case "Bus" :
				$transport = new TransportByBus ( );
				break;
			default :
				$transport = new TransportByOther ( );
				break;
		}
		return $transport;
	}

}

// --------------------------------------------------------------------


/**
 * @package Transport
 * @subpackage AbstractAirTransport
 * @abstract AbstractAirTransport
 */

abstract class AbstractAirTransport {
	
	private $param;
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @abstract setTransportNumber abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setTransportNumber($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @abstract setDestination abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setDestination($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setCounter
	 * 
	 * Setter for counter
	 * 
	 * @name setCounter
	 * @param mixed 
	 * @abstract setCounter abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setCounter($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setGate
	 * 
	 * Setter for gate
	 * 
	 * @name setGate
	 * @param mixed 
	 * @abstract setGate abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setGate($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @abstract setSeat abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setSeat($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @abstract getTransportNumber abstract method 
	 * @access public
	 * @return array
	 */
	
	abstract function getTransportNumber();
	
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @abstract getDestination abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getDestination();
	
	// --------------------------------------------------------------------
	

	/**
	 * getCounter
	 * 
	 * Get counter
	 * 
	 * @name getCounter
	 * @abstract getCounter abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getCounter();
	
	// --------------------------------------------------------------------
	

	/**
	 * getGate
	 * 
	 * Get gate
	 * 
	 * @name getGate
	 * @abstract getGate abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getGate();
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getSeat();
}

class TransportByAir extends AbstractAirTransport {
	
	private static $transportNumber;
	
	private static $destination;
	
	private static $counter;
	
	private static $gate;
	
	private static $seat;
	
	public $data = array ();
	
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
		
		$this->data = array ('destination ' => self::getDestination (), 'transportNumber ' => self::getTransportNumber (), 'counter' => self::getCounter (), 'gate' => self::getGate (), 'seat' => self::getSeat () );
	
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setTransportNumber($param) {
		self::$transportNumber = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setDestination($param) {
		self::$destination = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setCounter
	 * 
	 * Setter for counter
	 * 
	 * @name setCounter
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setCounter($param) {
		self::$counter = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setGate
	 * 
	 * Setter for gate
	 * 
	 * @name setGate
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setGate($param) {
		self::$gate = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @access public
	 * @method void
	 */
	public function setSeat($param) {
		self::$seat = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @access public
	 * @return array
	 */
	public function getTransportNumber() {
		return self::$transportNumber;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @access public
	 * @return array
	 */
	public function getDestination() {
		return self::$destination;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getCounter
	 * 
	 * Get counter
	 * 
	 * @name getCounter
	 * @access public
	 * @return array
	 */
	public function getCounter() {
		return self::$counter;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getGate
	 * 
	 * Get gate
	 * 
	 * @name getGate
	 * @access public
	 * @return array
	 */
	public function getGate() {
		return self::$gate;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	public function getSeat() {
		return self::$seat;
	}

}

// --------------------------------------------------------------------


/**
 * @package Transport
 * @subpackage AbstractTrainTransport
 * @abstract AbstractTrainTransport
 */
abstract class AbstractTrainTransport {
	
	private $param;
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @abstract setTransportNumber abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setTransportNumber($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @abstract setDestination abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setDestination($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @abstract setSeat abstract method 
	 * @access public
	 * @method void
	 */
	abstract function setSeat($param);
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @abstract getTransportNumber abstract method 
	 * @access public
	 * @return array
	 */
	
	abstract function getTransportNumber();
	
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @abstract getDestination abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getDestination();
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	abstract function getSeat();
}

class TransportByTrain extends AbstractTrainTransport {
	
	private static $transportNumber;
	
	private static $destination;
	
	private static $seat;
	
	public $data = array ();
	
	/**
	 * Function construction
	 *
	 * @access 	public
	 * @param	string	clsss construction()
	 * @method __construct
	 * @return	magic __construct
	 */
	public function __construct() {
		$this->data = array (

		'destination ' => self::getDestination (), 'transportNumber ' => self::getTransportNumber (), 'seat' => self::getSeat () );
	
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setTransportNumber($param) {
		self::$transportNumber = $param;
	}
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setDestination($param) {
		self::$destination = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @access public
	 * @method void
	 */
	public function setSeat($param) {
		self::$seat = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @access public
	 * @return array
	 */
	public function getTransportNumber() {
		return self::$transportNumber;
	}
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @access public
	 * @return array
	 */
	public function getDestination() {
		return self::$destination;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	public function getSeat() {
		return self::$seat;
	}

}

// --------------------------------------------------------------------


/**
 * @package Transport
 * @subpackage AbstractBusTransport
 * @abstract AbstractBusTransport
 */
abstract class AbstractBusTransport {
	private $param;
	
	/**
	 * Function construction
	 *
	 * @access 	public
	 * @param	string	clsss construction()
	 * @method __construct
	 * @return	magic __construct
	 */
	public function __construct() {
		$this->data = array (

		'destination ' => self::getDestination (), 'transportNumber ' => self::getTransportNumber (), 'seat' => self::getSeat () );
	
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setTransportNumber($param) {
		self::$transportNumber = $param;
	}
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setDestination($param) {
		self::$destination = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @access public
	 * @method void
	 */
	public function setSeat($param) {
		self::$seat = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @access public
	 * @return array
	 */
	public function getTransportNumber() {
		return self::$transportNumber;
	}
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @access public
	 * @return array
	 */
	public function getDestination() {
		return self::$destination;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	public function getSeat() {
		return self::$seat;
	}

}

// --------------------------------------------------------------------


class TransportByBus extends AbstractBusTransport {
	private static $transportNumber;
	
	private static $destination;
	
	private static $seat;
	
	public $data = array ();
	/**
	 * Function construction
	 *
	 * @access 	public
	 * @param	string	clsss construction()
	 * @method __construct
	 * @return	magic __construct
	 */
	public function __construct() {
		$this->data = array (

		'destination ' => self::getDestination (), 'transportNumber ' => self::getTransportNumber (), 'seat' => self::getSeat () );
	
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setTransportNumber
	 * 
	 * Setter for transport number
	 * 
	 * @name setTransportNumber
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setTransportNumber($param) {
		self::$transportNumber = $param;
	}
	// --------------------------------------------------------------------
	

	/**
	 * setDestination
	 * 
	 * Setter for destination
	 * 
	 * @name setDestination
	 * @param mixed 
	 * @access public
	 * @method void
	 */
	public function setDestination($param) {
		self::$destination = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * setSeat
	 * 
	 * Setter for seat
	 * 
	 * @name setSeat
	 * @param mixed  
	 * @access public
	 * @method void
	 */
	public function setSeat($param) {
		self::$seat = $param;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getTransportNumber
	 * 
	 * Get transport number
	 * 
	 * @name getTransportNumber
	 * @access public
	 * @return array
	 */
	public function getTransportNumber() {
		return self::$transportNumber;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getDestination
	 * 
	 * Get destination
	 * 
	 * @name getDestination
	 * @access public
	 * @return array
	 */
	public function getDestination() {
		return self::$destination;
	}
	
	// --------------------------------------------------------------------
	

	/**
	 * getSeat
	 * 
	 * Get seat
	 * 
	 * @name getSeat
	 * @abstract getSeat abstract method 
	 * @access public
	 * @return array
	 */
	public function getSeat() {
		return self::$seat;
	}
}

// --------------------------------------------------------------------


/**
 * @package Transport
 * @subpackage AbstractOtherTransport
 * @abstract AbstractOtherTransport
 */
abstract class AbstractOtherTransport {

}

class TransportByOther extends AbstractOtherTransport {
	
	public $data = array ();
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

}
?>