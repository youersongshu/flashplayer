<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>播放器测试用例系统</title>
<link href="css/index.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="add"><a href="edit.php?action=add" target="_blank">增加新用例</a></div>
<select name="category_id" onchange="window.location='index.php?categoryid='+this.options[this.selectedIndex].value">
<option value="0">全部分类</option>
{foreach from=$categoryList item=item}
<option value="{$item.id}"{if $categoryid==$item.id} selected="selected"{/if}>{$item.name}</option>
{/foreach}
</select>
</div>
<form method="get" action="index.php" >
<input type="text" name ="keyword" value ="{$keyword}">
<input type="radio" name="type" id="type_1" value="1"{if $type==1} checked="checked"{/if}/><label for="type_1">名称</label>
<input type="radio" name="type" id="type_2" value="2"{if $type==2} checked="checked"{/if} /><label for="type_2">Jira</label>
<input type="radio" name="type" id="type_3" value="3"{if $type==3} checked="checked"{/if} /><label for="type_3">描述</label>
<input type="submit" value="搜索" />
</form>
<div class="list">
	<table border="1" class="listTable">
	<tr>
		<th>ID</th>
		<th>名称</th>
		<th>需求来源</th>
		<th>描述</th>
		<th>分类</th>
		<th>操作</th>
	<!--	<th>创建时间</th> -->
	</tr>
	{foreach from=$cases item=item}
	<tr>
		<td>{$item.id}</td>
		<td>{$item.name}</td>
		<td><a href="http://bug.1verge.net/browse/{$item.source}" target="_blank">{$item.source}</a></td>
		<td>{$item.description}</td>
		<td>{$item.category_id|player:categoryname}</td>
	<!--<td><a href="case.php?id={$item.id}" target="_blank">预览</a> <a href="edit.php?action=edit&id={$item.id}">编辑</a> <a href="deal.php?action=del&id={$item.id}">删除</a></td> -->
		<td><a href="case.php?id={$item.id}" target="_blank">预览</a> <a href="edit.php?action=edit&id={$item.id}">编辑</a></td>
	<!--	<td>{$item.create_time}</td>-->
	</tr>
	{/foreach}
	</table>
</div>
<div>

{section start=1 loop=$totalPage+1 name=page}
<a href="?page={$smarty.section.page.index}&categoryid={$categoryid}&type={$type}&keyword={$keyword}">{$smarty.section.page.index}</a>
{/section}


</div>
</body>
</html>
