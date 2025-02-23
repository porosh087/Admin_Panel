<?php
  require_once('function/function.php');

  $id=$_GET['d'];
  $del="DELETE FROM user_table WHERE user_id='$id'";
  if($Q=mysqli_query($con,$del)){
    header('Location: all-user.php');
  }else{
    echo "User delete Failed! Try Again";
  }
?>