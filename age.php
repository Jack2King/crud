<?php


include_once('config.php');

if (isset($_POST['Submit'])) {
  //$_POST['age'] = 45;
  $age = mysqli_real_escape_string($mysqli, $_POST['age']);
  //$age = 34;
  //debug the value of $age;
  //echo $age;
  if (empty($age)) {
    echo "The age is empty.";
  } else {
    echo "mysqli begin.";
    $result = mysqli_query($mysqli, "INSERT INTO sums(age) VALUES('$age')");
    echo "<font color='green'>Data added successfully.";
  }
}
