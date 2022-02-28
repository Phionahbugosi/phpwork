<html>
    <head>
</head>
<body>
    <form action="login.php" method="post">
        username:<br>
        <input type="text" name="username">
        <br><br>
        password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="submit">
</form>
<p> already have an account??</p>
<a href="login.php"> login</a>
</body>
    </html>
    <?php
    
$servername='127.0.0.1';
$username='root';
$password='';
$dbname = "crud";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
   die('Could not Connect My Sql:' .mysqli_connect_error());
}

if(isset ($_POST['submit'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="INSERT INTO login VALUES('$username','$password')";
if(mysqli_query($conn,$sql)){
    echo "new record created successfully\n";

}
else{
    echo "error".$sql."<br>" .mysqli_error($conn);
}

}

mysqli_close($conn);


?>