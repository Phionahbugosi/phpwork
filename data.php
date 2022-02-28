<html>
    <head>
</head>
<body>
    <form action="" method="post">
        first name:<br><br>
        <input type="text" name="fname">
        <br><br>
        last name:<br>
        <input type="text" name="lname">
        <br><br>
        email:<br>
        <input type="email" name="email">
        <br><br>
        contact:<br>
        <input type="number" name="contact">
        <br><br>
        <input type="submit" name="submit" value="submit">
</form>
</body>
    </html>
    <?php
    
$servername='127.0.0.1';
$username='root';
$password='';
$dbname = "fregister";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
   die('Could not Connect My Sql:' .mysqli_connect_error());
}

if(isset ($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $sql="INSERT INTO register VALUES('$fname','$lname','$email','$contact')";
if(mysqli_query($conn,$sql)){
    echo "$fname\n $lname\n $email\n $contact\n";
    echo "new record created successfully\n";

}
else{
    echo "error".$sql."<br>" .mysqli_error($conn);
}
}

mysqli_close($conn);


?>