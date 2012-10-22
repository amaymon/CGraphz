<?php

# Collectd GenericJMX plugin

require_once 'type/GenericStacked.class.php';
require_once 'modules/collectd.inc.php';

$obj = new Type_Default($CONFIG);

switch($obj->args['pinstance']) {
   case (preg_match('/catalina_request_processor.*/', $obj->args['pinstance']) ? true : false) :
      switch ($obj->args['type']) {
         case 'io_octets':
			$obj = new Type_GenericStacked($CONFIG); 
            $obj->data_sources = array('rx', 'tx');
            $obj->ds_names = array(
               'rx' => 'Receive',
               'tx' => 'Transmit',
            );
            $obj->colors = array(
               'rx' => '0000ff',
               'tx' => '00b000',
            );
            $obj->rrd_title = sprintf('Interface Traffic (%s)', str_replace('_', ' ',$obj->args['pinstance']));
            $obj->rrd_vertical = 'Bytes/s';
         break;
         default:
            $obj->generate_colors();

            $obj->rrd_title = sprintf('%s', str_replace('_', ' ',$obj->args['pinstance']));
            $obj->rrd_vertical = sprintf('%s', str_replace('_', ' ', $obj->args['type']));
            $obj->rrd_format = '%5.1lf%s';
         ;;
      }
   break;
   default:
      $obj->generate_colors();

      $obj->rrd_title = sprintf('%s', str_replace('_', ' ',$obj->args['pinstance']));
      $obj->rrd_vertical = sprintf('%s', str_replace('_', ' ', $obj->args['type']));
      $obj->rrd_format = '%5.1lf%s';

   break;
}

$obj->width = $width;
$obj->heigth = $heigth;
$obj->rrd_format = '%5.1lf%s';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
?>