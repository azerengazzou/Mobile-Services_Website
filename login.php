<!DOCTYPE html>
<html>
    <head>
        <title>demo.website </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="loginstyle.css">
        <link rel="stylesheet" href="header.css">
    </head>
    <body>
       <?php
        include('header.php');
       ?>
       <?php
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
                session_start();
    if(isset($_POST['login'])){
	
        $email =  $_POST['email'];
        $pass = $_POST['password'];
        $tel = $_POST['phone'];
        //connect to database

        $query = "SELECT * FROM utilisateur WHERE mail='$email' and phone='$tel'";
    
        $result = mysqli_query( $conn,$query );

        if( mysqli_num_rows($result)>=1 ){
        
            while( $row = mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $Passwd =$row['mdp'];
            }
            if($Passwd == $pass){
                //details correct
                $_SESSION['logged'] = TRUE;
                $_SESSION['loggedInId'] = $id;
                $_SESSION['loggedInEmail'] = $email;
                
                header("Location: repare.php");
                $message="You are logged in";
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            }else{
                
                $message="Mot de passe incorrect!";
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            }
        }else{
            $message="Utilisateur Incorrecte , Vérifier les champs ";
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        }
    }
        ?>

       <div class="content">
       <form method="POST" >
            <div class="box">
                <h1>Login</h1>
                <input type="email" name="email" value="email" class="email" required/> 
                <input type="password" name="password" value="password" class="email" required/>
                <input type="numbers" name="phone" value="phone Number" class="email" required/><br>
                <input type="submit" name="login" value="Sign In">
        </div> <!-- End Box -->
            <a href="home.php" class="need_acc">You need an account ? Click here ! </a>
        </form>
        
        </div>
       
    </body>
</html>