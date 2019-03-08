<?php
include 'common.php';

$id = !empty($_GET['id']) ? $_GET['id'] : null;
if (empty($id) || !is_numeric($id)) {
	exit('id invalid');
}
// 取出测试用例信息
$playerObj = new Player();
$caseInfo = $playerObj->getById($id);
if (empty($caseInfo)) {
	exit("the id $id not exist.");
}
$pvid =rand(100,1000000000);
// 分析config
$configInfo = $playerObj->parseConfig($caseInfo['config']);
// 给默认值
$configDefaults = array(
	'player' => '',
        'liveid'=>'',
	'videoid' => '',
	'winType' => '',
	'partnerid' => '',
	'isAutoPlay' => '',
	'width' => '480',
	'height' => '400',
	'autohide' => '',
	'showsearch' =>'',
	'delayload'=>'',
	'imglogo'=>'',
	'showloop'=>'',
	'jstpl'=>'',
	'adext'=>'',
	'ctu'=>'',
	'firsttime'=>'',
	'embedid'=>'www.taobao.com',
	'quality'=>'auto',
	'show_ce'=>'',
	'youkuId'=>'',
	'passwordstr'=>'',
	'isMutp'=>'',
	'allowNetworking'=>'',
	'wmode'=>'',
	'ev'=>'',
	'sv'=>'',
	'pvid'=>$pvid,
	'uepflag'=>'1',
        'allowp2p'=>'',
	'policy'=>'',
	'ykstreamulr'=>'',
	'isShowRelatedVideo'=>'',
	'ykstreamurl'=>'',
	'loadinglogo'=>'',
);
foreach($configDefaults as $k=>$v) {
	if (!isset($configInfo[$k]))
		$configInfo[$k] = $v;
}

$result = array(
	'caseInfo' => $caseInfo,
	'configInfo' => $configInfo
);

render('case.tpl',$result);
?>
