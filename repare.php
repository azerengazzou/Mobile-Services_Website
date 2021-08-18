<?php
session_start();

if($_SESSION["logged"] != true){
    header("Location: login.php",);
    exit;
}else{
     echo "  <!DOCTYPE html>
        <html>
    <head>
        <title>demo.website </title>
        <meta charset='utf-8'>
        <link rel='stylesheet' href='homestyle.css'>
        <link rel='stylesheet' href='repstyle.css'>
        <link rel='stylesheet' href='header.css'>
    </head>
    <body>";
        include('header.php');
    echo "<h3>Repaire Now !</h3>
        <form method='POST'>
            <input type='text' placeholder='Firstname' autocomplete='on' name='firstname' required><br>

            <input type='text' placeholder='Lastname' autocomplete='on' name='lastname' required><br>

            <input type='email' placeholder='Email' autocomplete='on' name='email' required><br>

            <input type='number' placeholder='Phone number' name='numphone' required maxlength='8'><br>

            <h2>Your phone details :</h2>

            <div class='details'>
            <select id='selc' name='sel' required><br>
            <option value='System'>System</option><br>
            <option value='IOS'>IOS</option><br>
            <option value='ANDROID'>Android</option><br>
            <input type='text' placeholder='phone model' autocomplete='on' name='model' required><br>
            <br><textarea name='Message' id='' required maxlength='100' required></textarea><br>
            <input type='submit' value='Send' name='ok'>
        </form>
        </head>
        </html>";

        $servername="localhost";
        $username="root";
        $password="";
        $dbname="projet_sem2";
        // Connection DB
        $conn= new mysqli($servername,$username,$password,$dbname);
        // Test cnx
        if($conn->connect_error){
            die("Cnx Failed : ".$conn->connect_error);
        }
        // Insertion à la base de données
        if(isset($_POST['ok']))
        {
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $mail=$_POST['email'];
            $phone=$_POST['numphone'];
            $sys=$_POST['sel'];
            $mod=$_POST['model'];
            $msg=$_POST['Message'];
            $sql=" INSERT INTO demande (firstname,lastname,email,phone,model,sys,msg)
            VALUE ('$firstname', '$lastname', '$mail', '$phone', '$mod','$sys','$msg')";
            if($conn->query($sql)===TRUE)
            {
                $message="Your request is under examination , Stay close to your phone ";
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            }else{
                $message="You need to back later ";
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            }
        }
}
?>