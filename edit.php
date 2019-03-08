<?php
include 'common.php';

$id = !empty($_GET['id']) ? $_GET['id'] : null;
$action = !empty($_GET['action']) ? $_GET['action'] : null;

$playerObj = new Player();
if ($action=='edit') {
	if (empty($id) || !is_numeric($id)) exit('id error.');
	$caseInfo = $playerObj->getById($id);
	if (empty($caseInfo)) {
		exit("the id $id not exist.");
	}
}
else {
	$caseInfo = array('id'=>null,'name'=>null,'source'=>null,'description'=>null,'important'=>null,'category_id'=>null,'config'=>null);
	$action = 'add';
}
// caetgory
$categoryList = $playerObj->getCategories();

$result = array(
	'action' => $action,
	'caseInfo' => $caseInfo,
	'categoryList' => $categoryList
);
render('edit.tpl',$result);
?>
