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

echo "<h1>Create Transport :: Class Demo</h1>";

echo "<p>Please read the source code.</p>";

$type = 'Air';
Transport::makeTransportType ( 'Train' );
Transport::makeTransportType ( $type )->setTransportNumber ( 'FKg59' );
Transport::makeTransportType ( $type )->setDestination ( 'London' );
Transport::makeTransportType ( $type )->setCounter ( 'A78' );
Transport::makeTransportType ( $type )->setGate ( '32' );
Transport::makeTransportType ( $type )->setSeat ( '18A' );

echo "<h2>Created transport</h2><pre>";
print_r ( $transport = Transport::makeTransportType ( $type )->data );
echo "</pre>";
?>
