<?php

include_once('config.php');

$query = $_GET['query'];

$min_length = 3;

if (strlen($query) >= $min_length) {
    $query = htmlspecialchars($query);

    // makes sure nobody uses SQL injection
    $query = mysqli_real_escape_string($mysqli, $query);

    // $SQL
  //$sql = "SELECT * FROM users WHERE (`name` LIKE '%".$query."%')";
    $raw_results = mysqli_query($mysqli, "SELECT * FROM users WHERE (`name` LIKE '%".$query."%') OR (`mail` LIKE '%".$query."%')");


    if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
        while($results = mysqli_fetch_array($raw_results)){
        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
        echo "<p><h3>".$results['name']."</h3>".$results['mail']."</p>";
        // posts results gotten from database(title and text) you can also show id ($results['id'])
        }
    }  else{ // if there is no matching rows do following
        echo "No results";
    }

  } else {
  echo "plesae input the keyword to search, Minimum length is ".$min_length;
}
