<?php 
include 'dbconfig.php';

      $targetdir = "upload/";
if(isset($_POST['registr'] )){
          $name =  htmlspecialchars($_POST['name']);
          $password =  htmlspecialchars($_POST['password']);
          $email =  htmlspecialchars($_POST['email']);
           if(!empty($name) && !empty($password) && !empty($email) && !empty($_FILES["file"]["name"]) ){
           $fileName = basename($_FILES["file"]["name"]);
           $targetFilePath = $targetdir.$fileName;
           $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

           $allowTypes = array('jpg' , 'png' ,'jpeg','gif','pdf');
           if(in_array($fileType,$allowTypes)){
             if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              $query = "INSERT INTO `create` (`name`, `email`, `password`, `image`, `date_reg`) VALUES ('$name', '$email', MD5('$password'), '$fileName', UNIX_TIMESTAMP())";
              $result = $mysqli->query($query);
             }
            
           }
          //  $query = "INSERT INTO `create` (`name`, `email`, `password`, `image`, `date_reg`) VALUES ('$name', '$email', MD5('$password'), '$fileName', UNIX_TIMESTAMP())";
          
   
    }

 
}
else{
    echo "Duzgun doldurun";
   
}
$result = $mysqli->query("SELECT*FROM `create` WHERE `email` = '$email' AND `password`=MD5('$password') ");
$user = $result->fetch_assoc();


setcookie('user',$user['email'], time() + 3600, "/");


$mysqli->close();
  header("Location: /");
?> 