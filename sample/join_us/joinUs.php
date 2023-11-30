<?php 
// Create database connection
$conn = mysqli_connect("localhost", "root", "")or die("Could not connect to MYSQL");
mysqli_select_db($conn, "divin_pro_contact")or die("Could not select db");

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $position = $_POST['position'];
    $about = $_POST['about'];
    // $resume = $_POST['resume'];
    $comments = $_POST['comments'];

    // $result = mysqli_query($conn, "SELECT * FORM `divin` WHERE `email`= '".$email."' ") or die("Cannot connect to database! line 17");
    $result = mysqli_query($conn, "SELECT * FROM `joinus` WHERE `email`= '".$email."' ") or die("Cannot be able to check the email.");

    $user_count = mysqli_num_rows($result);

    // $fileName = basename($_FILES["resume"]["name"]);
    // $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // $allowTypes = array('jpg' , 'png', 'jpeg', 'gif', 'jfif');

    if($user_count == 0) {
        // if(in_array($fileType, $allowTypes)) {
            // $image = $_FILES['resume']['tmp_name']; 
            // $imgContent = addslashes(file_get_contents($image));    

            $sql = mysqli_query($conn, "INSERT INTO joinus (`name`, `email`, `mobile`, `position`, `about`, `comments`) VALUES('".$name."' , '".$email."' , '".$mobile."' , '".$position."' , '".$about."' , '".$comments."' )") or die("Cannot connect to database and send the values.!");
            // move_uploaded_file($file_tmp,"../upload/".$file_name);

            if($sql){
                echo "<script>alert('Successfully Sent!');window.location='../index.html';</script>";
            }else{ 
                echo "<script>alert('Sorry, Data is not be able to submitted!');window.location='../index.html';</script>";     
            }
        // }else{
        //     echo"<script>alert('Sorry, only JPG, JPEG, PNG, JFIF, & GIF files are allowed to upload.');window.location='../index.html';</    script>";     
        // }
    }else {
        echo "<script>alert('Email already exists in the database.');window.location='../index.html';</script>";
    }
}
?>