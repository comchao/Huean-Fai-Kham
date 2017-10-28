<html>
<head>
<title>Test</title>
</head>
<body>
<form name="frmSearch" method="post" action="<?=$_SERVER['category_name'];?>">
<table width="599" border="1">
<tr>
<th>Select
<select name="ddlSelect" id="ddlSelect">
<option>- Select -</option>
<option value="CustomerID" <?if($_POST["ddlSelect"]=="CustomerID"){echo"selected";}?>>CustomerID</option>
<option value="Name" <?if($_POST["ddlSelect"]=="Name"){echo"selected";}?>>Name</option>
<option value="Email" <?if($_POST["ddlSelect"]=="Email"){echo"selected";}?>>US</option>
</select>
Keyword
<input name="category" type="text" id="category" value="<?=$_POST["category"];?>">
<input type="submit" value="Search"></th>
</tr>
</table>
</form>
<?
 
$objConnect = mysql_connect("localhost","root","","logindb") or die("Error Connect to Database");
$objDB = mysql_select_db("mydatabase");
// Search By Name or Email
$strSQL = "SELECT * FROM customer WHERE 1  ";
if($_POST["ddlSelect"] != "" and  $_POST["category"]  != '')
{
$strSQL .= " AND (".$_POST["ddlSelect"]." LIKE '%".$_POST["category"]."%' ) ";
}  
 
 
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
<tr>
<th width="91"> <div align="center">category_id </div></th>
<th width="98"> <div align="center">category_name </div></th>
</tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
<tr>
<td><div align="center"><?=$objResult["category_id"];?></div></td>
<td><?=$objResult["category_name"];?></td>
</tr>
<?
}
?>
</table>
<?
mysql_close($objConnect);
?>
</body>
</html>