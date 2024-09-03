<?php  
session_start();

$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die(mysqli_connect_error());
}
mysqli_select_db($con, 'tarekor-clone');

if(isset($_POST['email']) && isset($_POST['passsword'])) {
    $name = $_POST['email'];
    $pass = $_POST['passsword'];

    
    $query = "SELECT * FROM userdata WHERE username='$name'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
      
        echo "Bu kullanıcı zaten mevcut.";
    } else {
        
        $query = "INSERT INTO userdata(username, passsword) VALUES ('$name', '$pass')";
        if (mysqli_query($con, $query)) {
            echo "Yeni kullanıcı başarıyla eklendi.";
        } else {
            echo "Kullanıcı eklenirken bir hata oluştu: " . mysqli_error($con);
        }
    }
} else {
    
    echo "Eksik post verisi.";
}

mysqli_close($con);
?>
