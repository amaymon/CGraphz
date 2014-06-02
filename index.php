<?php
	include('config/config.php');
	$auth = new AUTH_USER();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />!-->
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/lib/css/redmond/jquery-ui-1.10.3.custom.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/lib/css/jquery-ui-timepicker-addon.css" />
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.strtotime.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.liveSearch.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.blockUI.js"></script>
	
	<?php
	/* If Lang defined, erase default jquery regional */
	if (DEF_LANG!='') {
		echo '<script type="text/javascript" src="'.DIR_WEBROOT.'/lib/development-bundle/ui/i18n/jquery.ui.datepicker-'.DEF_LANG.'.js"></script>';
		echo '<script type="text/javascript" src="'.DIR_WEBROOT.'/lib/development-bundle/ui/i18n/jquery.ui.timepicker-addon-'.DEF_LANG.'.js"></script>';
	}
	?>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/func.js"></script>
	<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/dateformat.js"></script>
	<?php
	// Javascript and css of admin
	if (GET('module') != 'dashboard') {
		?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/lib/css/demo_table.css" />
		<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.uix.multiselect/js/jquery.uix.multiselect.min.js"></script>
		<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.uix.multiselect/js/locales/jquery.uix.multiselect_fr.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/lib/jquery.uix.multiselect/css/jquery.uix.multiselect.css" />
		<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/dyn_js.php"></script>
		<script type="text/javascript" src="<?php echo DIR_WEBROOT; ?>/lib/jquery.dataTables.min.js"></script>
		<?php
	}
	?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/style/000.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WEBROOT; ?>/style/menu.css" />	 

	<?php
	if (GET('module') == 'dashboard') {
      	echo '<script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/sprintf.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/strftime.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdRpn.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdTime.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdGraph.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdGfxCanvas.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/binaryXHR.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/rrdFile.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdDataFile.js"></script>
	        <script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/RrdCmdLine.js"></script>';
		if ($CONFIG['rrd_fetch_method'] == 'async') echo '<script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/get_rrd_async.js"></script>';
		else echo'<script type="text/javascript" src="'.DIR_WEBROOT.'/lib/javascriptrrd/get_rrd_sync.js"></script>';
	}
	?>

	
	<title>CGRAPHZ <?php echo CGRAPHZ_VERSION; ?></title>
</head>
<body id="id_body">
<?php
if ($auth->verif_auth()) {
	include(DIR_FSROOT.'/html/menu/menu.php');
	echo '<div id="content">';
	include(DIR_FSROOT.'/config/module.php');
	echo '</div>
		<div id="mask" style="display: none;"></div>
		<div id="popup" style="display: none;"></div>';
} else {
	include(DIR_FSROOT.'/html/auth/auth/f_auth.php');
}
?> 

</body>
</html>
