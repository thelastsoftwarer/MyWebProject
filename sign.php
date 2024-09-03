<?php  
session_start();
echo "Successfully logged in ";
$con = mysqli_connect('localhost', 'root');
if ($con) {
    echo"connection successfuly";
}
else{
    echo "no connection";
}
mysqli_select_db($con,'tarekor-clone');
$name = $_POST['email'];
$pass = $_POST['passsword'];
$query = "SELECT * FROM userdata WHERE username='$name' && passsword='$pass'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if ($num==1) {
    $_SESSION['username']=$name;  
    header('location:index.html');  
} else {
    header('location:login.html');
}

