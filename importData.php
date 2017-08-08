<?php

include_once('config.php');

if (isset($_POST['importSubmit'])) {
  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
  if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
      //open uploaded csv file with read only mode
      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

      //skip first line
      fgetcsv($csvFile);

      //parse data from csv file line by line
      while (($line = fgetcsv($csvFile)) !== FALSE) {
        //check whether member already exists in database with same email
        $prevQuery = "SELECT id FROM users WHERE mail = '".$line[2]."'";
        $prevResult = mysqli_query($mysqli, $prevQuery);
        if (mysqli_num_rows($prevResult) > 0) {
          //update member data
          mysqli_query($mysqli, "UPDATE users SET name = '".$line[0]."', pass = '".$line[1]."' WHERE mail = '".$line[2]."'");
        } else {
          //insert member data into database
          mysqli_query($mysqli, "INSERT INTO users (name, pass, mail) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."')");
        }
      }
      //close opened csv file
      fclose($csvFile);
      $qstring = '?status=succ';
    } else {
      $qstring = '?status=err';
    }
  } else {
    $qstring = '?status=invalid_file';
  }
}


//redirect to the listing page
header("Location: index.php".$qstring);
