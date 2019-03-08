<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>编辑测试用例</title>
<link href="css/index.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>{if $action=='add'}新增{else}编辑{/if}</h1>
<div class="form">
<form method="post" action="deal.php" name="myform" id="myform">
<input type="hidden" name="action" value="{$action}" />
	<table border="1" cellpadding="10">
	<tr>
		<th>字段</th>
		<th>值</th>
	</tr>
	<tr>
		<td>ID</td>
		<td><input type="hidden" name="id" value="{$caseInfo.id}" />{$caseInfo.id}</td>
	</tr>
	<tr>
		<td>名称</td>
		<td><input type="text" name="name" value="{$caseInfo.name}" size="100" /></td>
	</tr>
	<tr>
		<td>需求来源</td>
		<td><input type="text" name="source" value="{$caseInfo.source}" size="100" /></td>
	</tr>
	<tr>
		<td>描述</td>
		<td><textarea name="description" cols="100" rows="2">{$caseInfo.description}</textarea></td>
	</tr>
	<tr>
		<td>重要</td>
		<td><textarea name="important" cols="100" rows="5">{$caseInfo.important}</textarea></td>
	</tr>
	<tr>
		<td>分类</td>
		<td>
			<select name="category_id">
		{foreach from=$categoryList item=item}
			<option value="{$item.id}"{if $caseInfo.category_id==$item.id} selected="selected"{/if}>{$item.name}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td>配置</td>
		<td><textarea name="config" cols="100" rows="5">{$caseInfo.config}</textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" value="提交" onclick="check();" /> <input type="reset" value="取消" />  <input type="button" value="返回" onclick="window.history.go(-1);" /></td>
	</table>
</form>
</div>
<script>
function check() {
	var f = document.getElementById('myform');
	if (f.name.value=='') {
		alert('名称不能为空');
		f.name.focus();
		return;
	}
	if (f.description.value=='') {
		alert('描述不能为空');
		f.description.focus();
		return;
	}
	if (f.important.value=='') {
		alert('重要不能为空');
		f.important.focus();
		return;
	}
	if (f.config.value=='') {
		alert('配置不能为空');
		f.config.focus();
		return;
	}
	f.submit();
}
</script>
</body>
</html>
