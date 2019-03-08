<?php
include 'common.php';


$categoryid = !empty($_GET['categoryid']) ? $_GET['categoryid'] : null;
$keyword= !empty($_GET['keyword']) ? $_GET['keyword'] : null;
$keyword = str_replace(array('%',"'",'"','#','`','&','*'),'',$keyword);
$type= !empty($_GET['type']) ? $_GET['type'] : 1;
$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$pageSize = 20;
$playerObj = new Player();
$cases = $playerObj->getByCategory($categoryid,$page,$pageSize,$keyword,$type);
$total = $playerObj->getCount($categoryid,$type,$keyword);
// caetgory
$categoryList = $playerObj->getCategories();

render('index.tpl',array(
			'cases'=>$cases,'page'=>$page,'categoryList'=>$categoryList,'keyword'=>$keyword,'type'=>$type,'categoryid'=>$categoryid,'total'=>$total,'pageSize'=>$pageSize,
			'totalPage'=>ceil($total/$pageSize),
			));
?>
