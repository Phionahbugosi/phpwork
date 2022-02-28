<html>

<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body background color="blue">
    <?php
    $servername='127.0.0.1';
    $username='root';
    $password='';
    $dbname = "crud";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
       die('Could not Connect My Sql:' .mysqli_connect_error());
    }
    //require('signup.php');
    if(isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username=mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query="SELECT*FROM login WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            
            header("Location: next.php");
        } else {
            echo "incorect username and password";

    }
}
else{


    ?>
    <div class="container-sm p-3 my-3 bg-dark text-white">
<form action="next.php" method="post">
    <div class="form_group">
  <label for = "username">user name:</label><br>
    <input type="text" name="username" required class="form-control" placeholder="name">
</div>
    <br><br>
    <div class='form-group'>
    <label for="password">password:</label><br>
    <input type="password" name="password" required class="form-control" placeholder="password">
</div>

<div class="form-group form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="checkbox">remember me</label><br>
        <br><br>
    <input type="submit" name="submit" value="submit"><br>
</div>
</form>
<?php
}
?>
<p>if you donot have an account </p>
<a href="signup.php"> sign up</a>
</div>

</body>
    </html>