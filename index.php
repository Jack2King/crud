<?php
  //including the database connection file
  include_once("config.php");

  //fetching data in descending order (lastest entry first)
  //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
  $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

   <form class="" action="search.php" method="get">
      <input type="text" name="query">
      <input type="submit" value="Search">

   </form>
   <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
      <input type="file" name="file" />
      <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
  </form>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Pass</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['pass']."</td>";
		echo "<td>".$res['mail']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>
</html>
