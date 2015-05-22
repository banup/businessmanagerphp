<html>
<head><title>View Users</title>
<style>
body {
  font: normal medium/1.4 sans-serif;
}
table {
  border-collapse: collapse;
  width: 20%;
   margin-left: auto;
    margin-right: auto;
}
tr > td {
  padding: 0.25rem;
  text-align: center;
  border: 1px solid #ccc;
}
tr:nth-child(even) {
  background: #FAE1EE;
}
tr:nth-child(odd) {
  background: #edd3ff;
}
tr#header{
background: #c1e2ff;
}
div.header{
padding: 10px;
background: #e0ffc1;
width:30%;
color: #008000;
margin:5px;
}
div.refresh{
margin-top:10px;
width: 5%;
margin-left: auto;
margin-right: auto;
}
div#norecord{
margin-top:10px;
width: 15%;
margin-left: auto;
margin-right: auto;
}
</style>
<script>
function refreshPage(){
location.reload();
}
</script>
</head>
<body>
<center>
<div class="header">
Android SQLite and MySQL Sync Results
</div>
</center>
<?php
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $businesses = $db->getAllBusinesses();
    if ($businesses != false)
        $no_of_businesses = mysql_num_rows($businesses);
    else
        $no_of_businesses = 0;
?>
<?php
    if ($no_of_businesses > 0) {
?>
<table>
<tr id="header"><td>businessid</td><td>businessname</td><td>businessaddress</td><td>businesscity</td><td>businessstate</td><td>businesscountry</td><td>businessphone</td><td>businesscontact</td><td>businesscatalog</td><td>surveyorphone</td></tr>
<?php
    while ($row = mysql_fetch_array($users)) {
?> 
<tr>
<td><span><?php echo $row["businessid"] ?></span></td>
<td><span><?php echo $row["businessname"] ?></span></td>
<td><span><?php echo $row["businessaddress"] ?></span></td>
<td><span><?php echo $row["businesscity"] ?></span></td>
<td><span><?php echo $row["businessstate"] ?></span></td>
<td><span><?php echo $row["businesscountry"] ?></span></td>
<td><span><?php echo $row["businessphone"] ?></span></td>
<td><span><?php echo $row["businesscontact"] ?></span></td>
<td><span><?php echo $row["businesscatalog"] ?></span></td>
<td><span><?php echo $row["surveyorphone"] ?></span></td>
</tr>
<?php } ?>
</table>
<?php }else{ ?>
<div id="norecord">
No records in MySQL DB
</div>
<?php } ?>
<div class="refresh">
<button onclick="refreshPage()">Refresh</button>
</div>
</body>
</html>

