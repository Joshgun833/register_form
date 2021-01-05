 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

   <?php

   if($_COOKIE['user'] == ''):
   ?>

    <div class="login-page">
        <div class="form">
          <form action="form.php" class="register-form"   method='post' enctype="multipart/form-data" >
            <input type="text" name = 'name' placeholder="Full name"/>
            <input type="password" name = 'password' placeholder="password"/>
            <input type="email" name = 'email' placeholder="email address"/>
            <input type="file" name = 'file' />
            <button type="submit" class='submit' name = 'registr'>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form>
          <form action="sig_in.php" class="login-form" name = 'sigin' method = 'post'>
            <input type="email" placeholder="email" name = 'email'/>
            <input type="password" placeholder="password" name = "password"/>
            <button type = 'submit' name = 'sigin'>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
          </form>
        </div>
      </div>
      <?php else:?>
        <?php
// Include the database configuration file
include 'dbConfig.php';
$password =  htmlspecialchars($_POST['password']);
$email =  $_COOKIE['user'];
// Get images from the database
$query = $mysqli->query("SELECT * FROM `create` WHERE `email` = '$email' ORDER BY `image` AND 'name' ");



if($query->num_rows > 0){
    $row = $query->fetch_assoc();
        $imageURL = 'upload/'.$row["image"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
    <H1>Ad ve Soyad :<?php echo $row['name'] ?></H1>
    <H1>Email : <a href="#" type='send'><?=$_COOKIE['user']?></a></H1>
<?php 
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
        <p>Salam  <?=$_COOKIE['user']?>.Siz gotler qrupuna daxil olduzun.Cixmaq ucun <a href="exit.php">Gotem</a> Duymesini basin.</p> 
      <?php endif;?>
      <script src="js.js"></script>
</body>
</html>