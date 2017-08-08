<?php
/*

include_once("config.php");

//echo "first step";

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($database_connect,$_POST['name']);
  $pass = mysqli_real_escape_string($database_connect,$_POST['pass']);
  $mail = mysqli_real_escape_string($database_connect,$_POST['mail']);


  if (empty($name) || empty($pass) || empty($mail)) {
    if (empty($name)) {
      # code...
      echo "name is empty!";
    }
    if (empty($pass)) {
      echo "password is empty.";
    }
    if (empty($mail)) {
      # code...
      echo "mail is empty.";
    }


    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  } else {
    //insert data to database
		$result = mysqli_query($database_connect, "INSERT INTO users(name,pass,mail) VALUES('$name','$pass','$mail')");
    //display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
  }
}

*/



//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
	$mail = mysqli_real_escape_string($mysqli, $_POST['mail']);

	// checking empty fields
	if(empty($name) || empty($pass) || empty($mail)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($pass)) {
			echo "<font color='red'>pass field is empty.</font><br/>";
		}

		if(empty($mail)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		//$result = mysqli_query($database_connect, "INSERT INTO users(name,pass,mail) VALUES('$name','$pass','$mail')");
    $result = mysqli_query($mysqli, "INSERT INTO users(name,pass,mail) VALUES('$name','$pass','$mail')");


		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
