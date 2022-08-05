<?php
  include_once 'config.php';
  
  if(isset($_POST['semester'])){
    $query = "SELECT * FROM sem_sub WHERE semNo = ".$_POST['semester'];
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
      
      while($row = mysqli_fetch_assoc($result)){
        echo '<option value='.$row['subCode'].'>'.$row['subName'].'</option>';
      }
    }
    else{
      echo '<option>No Subject found</option>';
    }
  }
?>