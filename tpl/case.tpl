<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>{$caseInfo.name}</title>
<link href="css/index.css" type="text/css" rel="stylesheet" />
<script src="js/swfobject.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/player.js" type="text/javascript"></script>
<script type="text/javascript">
var player = '{$configInfo.player}';
var playerParam = 'isAutoPlay={$configInfo.isAutoPlay}&liveid={$configInfo.liveid}&VideoIDS={$configInfo.videoid}&winType={$configInfo.winType}&policy={$configInfo.policy}&partnerid={$configInfo.partnerid}&loadinglogo={$configInfo.loadinglogo}&ctu={$configInfo.ctu}&autohide={$configInfo.autohide}&showsearch={$configInfo.showsearch}&imglogo={$configInfo.imglogo}&showloop={$configInfo.showloop}&adext={$configInfo.adext}&delayload={$configInfo.delayload}&firsttime={$configInfo.firsttime}&embedid={$configInfo.embedid}&quality={$configInfo.quality}&show_ce={$configInfo.show_ce}&youkuId={$configInfo.youkuId}&passwordstr={$configInfo.passwordstr}&ev={$configInfo.ev}&sv={$configInfo.sv}&pvid={$configInfo.pvid}&uepflag={$configInfo.uepflag}&isMute={$configInfo.isMute}&allowp2p={$configInfo.allowp2p}&ykstreamurl={$configInfo.ykstreamurl}&isShowRelatedVideo={$configInfo.isShowRelatedVideo}&ykstreamurl={$configInfo.ykstreamurl}';
var width = '{$configInfo.width}';
var height = '{$configInfo.height}';
var isAutoPlay = '{$configInfo.isAutoPlay}';
var wmode ='{$configInfo.wmode}';
var allowNetworking ='{$configInfo.allowNetworking}';
{literal}
window.onload = function() {
    var swfObject = new SWFObject(player + '?' + playerParam,"player", width, height, "9.0.0","#000000", "expressInstall.swf", true);
	swfObject.addParam("allowScriptAccess", "always");
	swfObject.addParam("allowFullscreen", "true");
	swfObject.addVariable("isAutoPlay", isAutoPlay); 
	swfObject.addParam("wmode", wmode); 
	swfObject.addParam("allowNetworking", allowNetworking); 
    var attributes = {id:"youkuPlayer",name:"youkuPlayer"};
	swfObject.write("player_box");
}
/*<!--
function onPlayerStart(){
		alert("playerstate is playing");
}
function onPlayerComplete(){
		alert("playerstate is Completed");
}
-->*/
function getq() {
	var quality=Player.getquality2();
	var targetValueInput = document.getElementById("targetValueInput");
	var linkObj = document.getElementById("targetLink");

	linkObj.href = "getSegs.php?vid=" + targetValueInput.value + "&quality=" + quality;
//	alert(quality);
	return quality;
}
{/literal}
function ljllq(){
		alert("调用ljllq函数");
}




function addInteract(){
	var swfData = Object(); 
	swfData.name = "xingmengplugin"; 
	swfData.info = "roomid=110&text=wokaka&pos_x=0.78&pos_y=0.75"; 
	//alert(Player.getVideo());
	//Player.getVideo().pauseVideo(true);
	Player.getVideo().addInteract(swfData);
	
}

</script>
</head>
<body>
<div class ="content">
	<div id="player_box"></div>
	<div class="right_box">
	<p><a href ="http://10.103.12.71/video.video?q=userid%3A4098051&fc=&fd=title&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">广告素材视频 userid:4098051</a></p>
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal&fc=&fd=title%20total_down&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">重定向视频：中间层不支持直接查询，可用94599049 94597299</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=state%3Ablocked%20&fc=&fd=title&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">屏蔽视频 state:blocked state:checking state:encoding</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20area_limit%3AAREA_RESTRICTED1&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">地区屏蔽</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20operation_limit%3ASHARE_DISABLED&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">权限视频</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20device_limit%3AMOBILE_DISABLED&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">设备屏蔽(MOBILE)</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=streamtypes%3Ahd2%20state%3Anormal%20category%3A%E7%94%B5%E5%BD%B1&fc=&fd=pk_video%20videoid%20title%20streamtypes%20state%20category&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">画质：标清、高清、超清</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=streamtypes%3Artmp%20state%3Anormal%20&fc=&fd=pk_video%20videoid%20title%20streamtypes%20state%20category&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">rtmp</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=streamtypes%3A3gphd%20state%3Anormal%20category%3A%E7%94%B5%E5%BD%B1&fc=&fd=pk_video%20videoid%20title%20streamtypes%20state%20category&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">手机视频 streamtypes:3gphd</a></p>
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20haspoint%3A1%20category%3A%E7%94%B5%E8%A7%86%E5%89%A7&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">电视剧</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20haspoint%3A1%20category%3A%E7%BB%BC%E8%89%BA&fc=&fd=variety_genre&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">综艺</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20category%3A%E9%9F%B3%E4%B9%90&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">音乐</a></p>	
	<p><a href ="http://10.103.12.71/video.hot?q=category%3A%E7%BA%AA%E5%BD%95%E7%89%87&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">纪录片</a></p>	
	<p><a href ="http://10.103.12.71/video.hot?q=category%3A%E6%95%99%E8%82%B2&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">教育</a></p>
	<p><a href ="http://10.103.12.71/video.show?q=state%3Anormal%20category%3A%E5%8A%A8%E6%BC%AB&fc=&fd=&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">动漫</a></p>
	<p><a href ="http://10.103.12.71/video.dvd?q=state%3Anormal%20haspoint%3A1&fc=&fd=title%20point&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">中插点、故事点</a></p>
	<p><a href ="http://10.103.12.71/video.dvd?q=is3d%3A1&fc=&fd=title%20threed&pn=1&pl=10&ob=&ft=json&cl=test_page&h=1" target="_blank">3D</a></p>	
	<p><a href ="http://10.103.12.71/video.dvd?q=hasattachment%3A1%20&fc=&fd=pk_video%20videoid%20title%20attachment&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">字幕</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=source%3A10012&fc=&fd=title%20source%20state%20createtime&pn=1&pl=100&ob=createtime%3Adesc&ft=json&cl=test_page&h=1">拍客视频</a></p>	
	<p><a href ="http://10.103.12.71/video.dvd?q=hasattachment%3A1%20&fc=&fd=pk_video%20videoid%20title%20attachment&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">字幕</a></p>	
	<p><a href ="http://10.103.12.71/video.video?q=videoid%3A108655443%20&fc=&fd=title%20operation_limit&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1">指定查看某视频观看权限</a></p>	
	<p><a href ="http://10.103.21.121/query.php?ip=60.247.104.110">线上IP地址信息</a></p>	
	<p><a href ="http://www.youku.com/QTask/getip">获取IP地址信息</a></p>	
	<p><a href ="http://10.103.12.71/video.dvd?q=state%3Anormal%20haspoint%3A1%20category%3A%E8%B5%84%E8%AE%AF&fc=&fd=title%20point&pn=1&pl=10&ob=createtime%3Adesc&ft=json&cl=test_page&h=1">资讯频道中插点视频</a></p>	
	<p><a href ="http://10.103.12.71/video.hot?q=videoid%3AXMTkyMTQyNTg0%2CXMTkyMTQyODg0%2CXMTkyMTQzMjUy%2CXMTkyMTQzOTIw%2CXMTkyMTQ0NTAw%2CXMTkyMTQyMTQ4&fc=&fd=title%20state%20device_limit%20&pn=1&pl=10&ob=&ft=json&cl=test_page&h=1" target="_blank">禁止PC（yoku）</a></p>	
	<p><a href ="http://10.103.12.71/video.show?q=audiolang%3A%E7%B2%A4%E8%AF%AD%2C%E9%9F%A9%E8%AF%AD%2C%E6%97%A5%E8%AF%AD&fc=&fd=title%20audiolang&pn=1&pl=100&ob=createtime%3Adesc&ft=json&cl=test_page&h=1" target="_blank">多语音，韩日等视频</a></p>
	<p><a href ="http://10.103.12.191/playpolicy.playpolicy?q=device_disabled%3Apc&fc=&fd=policyid%20policyname%20policydesc%20state%20createtime%20lastupdate%20site_disabled%20area_disabled%20device_disabled%20apple_disabled%20ua_disabled%20watchtime_disabled%20videoids%20showids&pn=1&pl=10&ob=&ft=json&cl=test_page&h=1" target="_blank">集团播控禁pc</a></p>
	<p><a href ="http://10.103.12.191/test.html" target="_blank">集团播控查询url</a></p>
	<p><a href="http://10.103.12.71/test.html" target="_blank">线上中间层查询url</a></p>

	<p><a href ="http://i.youku.com/u/UNjI5NDU3NjY0/videos" target="_blank">DRM视频</a></p>
	</div>
</div>
{if !empty($configInfo.jstpl)}
	{include file="tpl/jstpl/`$configInfo.jstpl`"}
{/if}
<div class="info">
    <div class="left">
	<table border="0" class="listTable">
	<tr>
		<th>名称</th>
		<td>{$caseInfo.name}</td>
	</tr>
	<tr>
		<th>需求来源</th>
		<td><a href="http://bug.1verge.net/browse/{$caseInfo.source}" target="_blank">{$caseInfo.source}</a></td>
	</tr>
	<tr>
		<th>描述</th>
		<td>{$caseInfo.description|nl2br}</td>
	</tr>
	<tr>
		<th>重要</th>
		<td>{$caseInfo.important|nl2br}</td>
	</tr>
	<tr>
		<th>分类</th>
		<td>{$caseInfo.category_id|player:categoryname}</td>
	</tr>
	<tr>
		<th>创建时间</th>
		<td>{$caseInfo.create_time}</td>
	</tr>
	<tr>
		<th>ID</th>
		<td>{$caseInfo.id}</td>
	</tr>

	</table>
</div>
  <div class="right">
     <ul>
		{if !empty($configInfo.videoid)}
		<li><a href="http://v.youku.com/player/getPlayList/VideoIDS/{$configInfo.videoid}/timezone/+08/version/5/source/video?ran=9539&password=&n=3" target="_blank">查看视频信息</a></li>
		{else}
		<li><a href="http://v.youku.com/player/getPlayList/VideoIDS/{$configInfo.youkuId}/timezone/+08/version/5/source/video?ran=959&password=&n=3" target="_blank">查看视频信息</a></li>
		{/if}
     </ul>
	 <ul>
	 <!--
	   <li><a onclick="getq();" href="getSegs.php?vid={$configInfo.videoid}&quality="+getq(); target="_blank" id="targetLink">查看分片信息</a></li>
	   
	   <li>
		<input type="hidden" value="{$configInfo.videoid}" id="targetValueInput">
	   <a onclick="getq();" href="" target="_blank" id="targetLink">查看分片信息</a></li>
	   -->
	   <form method="post" action="getSegs.php" target="_blank">
	   <select name="q">
	   <option value="flv">flv</option>
	   <option value="mp4">mp4</option>
	   <option value="hd2">hd2</option>
	   <option value="hd3">hd3</option>
	   </select>
	   <input type="hidden" name="vid" value="{$configInfo.videoid}">
	   <input type="submit" value="查看分片信息">
	   </form>
	 </ul>
  </div>
<a href="javascript:addInteract()">调用星梦的链接</a> 
</div>
</body>
</html>
