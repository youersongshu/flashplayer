<?php
include 'common.php';

$id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : null;
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : null;
$name = !empty($_POST['name']) ? $_POST['name'] : null;
$source = !empty($_POST['source']) ? $_POST['source'] : null;
$description = !empty($_POST['description']) ? $_POST['description'] : null;
$important = !empty($_POST['important']) ? $_POST['important'] : null;
$config = !empty($_POST['config']) ? $_POST['config'] : null;
$category_id= !empty($_POST['category_id']) ? $_POST['category_id'] : null;

$playerObj = new Player();
switch($action) {
case 'add':
	if (empty($name) || empty($source) || empty($description) || empty($important) || empty($config) || empty($category_id)) {
		exit('param missing');
	}
	$playerObj->insert($name,$source,$description,$important,$config,$category_id);
	break;
case 'edit':
	if (empty($id) || !is_numeric($id)) {
		exit('id invalid');
	}
	if (empty($name) || empty($source) || empty($description) || empty($important) || empty($config) ||empty($category_id)) {
		exit('param missing');
	}
	$playerObj->update($id,$name,$source,$description,$important,$config,$category_id);
	break;
case 'del':
	if (empty($id) || !is_numeric($id)) {
		exit('id invalid');
	}
	$playerObj->delete($id);
}
header('Location:index.php');
?>
