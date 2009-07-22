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

echo "<h1>Create Destination :: Class Demo</h1>";
echo "<p>
	Steps are starting from <b>A</b> to <b>L</b>
	<br />
	In this demo start point sets to <b>B</b> and end point <b>J</b> and current location <b>D</b>
	</p>";

Destination::add ( 'A', 'Info here' );
Destination::add ( 'B', 'Info here' );
Destination::add ( 'C', 'Info here' );
Destination::add ( 'D', 'Info here' );
Destination::add ( 'E', 'Info here' );
Destination::add ( 'F', 'Info here' );
Destination::add ( 'J', 'Info here' );
Destination::add ( 'K', 'Info here' );
Destination::add ( 'L', 'Info here' );

Destination::setBegin ( 'B' );
Destination::setCurrent ( 'D' );
Destination::setEnd ( 'J' );

echo "<h2>Current point:</h2><pre>";
print_r ( Destination::getCurrent () );
echo "</pre>";

echo "<h2>Next point:</h2><pre>";
print_r ( Destination::getNext () );
echo "</pre>";

echo "<h2>Previous point:</h2><pre>";
print_r ( Destination::getPrev () );
echo "</pre>";

echo "<h2>All next steps:</h2><pre>getAllNext";
print_r ( Destination::getAllNext () );
echo "</pre>";

echo "<h2>All Previous steps:</h2><pre>";
print_r ( Destination::getAllPrev () );
echo "</pre>";

?>
