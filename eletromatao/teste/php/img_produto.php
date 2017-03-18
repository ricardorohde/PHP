<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" />
<style>
body{
	padding: 0;
	margin: 0;
}
</style>
<script>
	if(navigator.appName == "Microsoft Internet Explorer");
	window.width += 16;
	window.heigth += 4;
</script>
</head>

<body>
<table width="150" border="0">
  <tr>
    <td align="center"><img src="<? echo $_GET['foto']; ?>" /></td>
  </tr>
  <tr>
    <td align="center"><input name="Button" type="button" class="btn" value="Fechar" onclick="window.close();" /></td>
  </tr>
</table>
</body>
</html>
