<?php 
// Create database connection
$conn = mysqli_connect("localhost", "root", "")or die("Could not connect to MYSQL");
mysqli_select_db($conn, "divin_pro_contact")or die("Could not select db");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // $result = mysqli_query($conn, "SELECT * FORM `divin` WHERE `email`= '".$email."' ") or die("Cannot connect to database! line 17");
    $result = mysqli_query($conn, "SELECT * FROM `divin` WHERE `email`= '".$email."' ") or die("Cannot be able to check the email.");

    $user_count = mysqli_num_rows($result);

    if($user_count == 0) {
        $sql = mysqli_query($conn, "INSERT INTO divin (`name`, `email`, `subject`, `message`) VALUES('".$name."' , '".$email."' , '".$subject."' , '".$message."' )") or die("Cannot connect to database and send the values.!");

        if($sql){
            echo "<script>alert('Successfully Sent!');window.location='index.html';</script>";
        }else{ 
            echo "<script>alert('Sorry, Data is not be able to submitted!');window.location='index.html';</script>";     
        }
    }else {
        echo "<script>alert('Email already exists in the database.');window.location='index.html';</script>";
    }
}
?>