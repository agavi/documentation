<?php

/**
 * Data file for Pacific/Galapagos timezone, compiled from the olson data.
 *
 * Auto-generated by the phing olson task on 02/14/2009 18:36:26
 *
 * @package    agavi
 * @subpackage translation
 *
 * @copyright  Authors
 * @copyright  The Agavi Project
 *
 * @since      0.11.0
 *
 * @version    $Id: Pacific_47_Galapagos.php 3838 2009-02-14 18:42:45Z david $
 */

return array (
  'types' => 
  array (
    0 => 
    array (
      'rawOffset' => -18000,
      'dstOffset' => 0,
      'name' => 'ECT',
    ),
    1 => 
    array (
      'rawOffset' => -21600,
      'dstOffset' => 0,
      'name' => 'GALT',
    ),
  ),
  'rules' => 
  array (
    0 => 
    array (
      'time' => -1230746496,
      'type' => 0,
    ),
    1 => 
    array (
      'time' => 504939600,
      'type' => 1,
    ),
  ),
  'finalRule' => 
  array (
    'type' => 'static',
    'name' => 'GALT',
    'offset' => -21600,
    'startYear' => 1987,
  ),
  'name' => 'Pacific/Galapagos',
);

?>