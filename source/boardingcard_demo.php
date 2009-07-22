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

require_once 'helper/loader.php';

echo "<h1>Create Boarding Card :: Class demo</h1>";
echo "<p>Please read the source code.</p>";

//add('location', 'context', 'transport type', 'destination if any' , 'transport number if any' , 'seat if any', 'counter in any', 'gate if any');


Boarding::add ( 'Madrid', 'Take train from Madrid to %1$d Sit in', 'Train', 'Barcelona', '78A', '45B' );

Boarding::add ( 'Gairport bus', 'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.', 'Bus' );

Boarding::add ( 'Gerona Airport', 'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at
ticket counter 344', 'Air', 'Stockholm', 'SK455', '3A', '344', ' 45B' );

Boarding::add ( 'Stockholm', 'From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we
automatically transferred from your last leg', 'Air', 'New York JFK', 'SK22', '7B', null, ' 22' );

Boarding::add ( 'arrived', 'You have arrived at your final destination.' );

//Boarding::setBegin('Gairport bus');
Boarding::setCurrent ( 'Gerona Airport' );
//Boarding::setEnd('Stockholm');


echo "<h2>Current point:</h2><pre>";
print_r ( Boarding::getCurrent () );
echo "</pre>";

echo "<h2>Next point:</h2><pre>";
print_r ( Boarding::getNext () );
echo "</pre>";

echo "<h2>Previous point:</h2><pre>";
print_r ( Boarding::getPrev () );
echo "</pre>";

echo "<h2>All next steps:</h2><pre>getAllNext";
print_r ( Boarding::getAllNext () );
echo "</pre>";

echo "<h2>All Previous steps:</h2><pre>";
print_r ( Boarding::getAllPrev () );
echo "</pre>";

?>
