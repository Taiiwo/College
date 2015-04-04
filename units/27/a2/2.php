<?php
//echo "doing all the PHP";
//ini_set('display_errors',1);
//error_reporting(E_ALL);
if (isset($_FILES['file'])) {
  $target_pat = "./uploads/";
  $target_path = $target_pat . basename( $_FILES['file']['name']);
  if (filesize($_FILES['file']['tmp_name']) <= 1024){
    exec("rm $target_pat*");
    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
      echo "The file <a href='$target_path'>" . basename( $_FILES['file']['name']) . "</a> has been uploaded";
    }
    else{
      echo "There was an error uploading the file, please try again!";
    }
  }
  else {
    echo "Error, files can only be less that 1024 bytes.";
  }
}
else {
  ?>
  <h3>Note: File must be under 1024 bytes.</h3>
  <h3>Note: All files in the uploads folder will be deleted prior to upload.</h3>
  <form action="./2.php" enctype="multipart/form-data" method="POST">
    <input type="file" name="file" />
    <input type="submit" value="Upload File" />
  </form>
  <?
}
?>
