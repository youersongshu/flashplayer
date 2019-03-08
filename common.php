<?php
error_reporting(E_ALL ^ E_NOTICE);
/**
 * common
 */
include 'local.php';
include 'include/smarty/Smarty.class.php';
include 'include/DB.class.php';
include 'include/Player.class.php';

// smarty render
function render($tpl,$param) {
	$smarty = new Smarty();
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->setPluginsDir('include/smarty/plugins_player');
	if (!empty($param)) {
		foreach($param as $k=>$v)
			$smarty->assign($k,$v);
	}
	$smarty->display('tpl/'.$tpl,$param);
}
?>
