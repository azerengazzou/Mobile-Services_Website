<!DOCTYPE html>
<html>
    <head>
        <title> welcome</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="homestyle.css">
        <link rel="stylesheet" href="header.css">
    </head>
    <body>
       <?php
        include('header_login.php');
       ?>

    <section class="f_sec">
        <nav>
            <div class="form-area">
            <form method="POST">
                <h3>JOIN US !</h3>
                <input type="text" placeholder="Firstname" autocomplete="on" name="firstname" required><br>
                
                <input type="text" placeholder="Lastname" autocomplete="on" name="lastname" required><br>

                <input type="email" placeholder="Email" autocomplete="on" name="email" required><br>

                <input type="password" placeholder="Password" name="password" required><br>

                <input type="number" placeholder="Phone number" name="numphone" required maxlength="11"><br>
                <div id="city">
                    <select id="selc" name="sel">
                    <option value="City">City</option>
                    <option value="Tunis">Tunis</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Nabeul">Nabeul</option>
                    <option value="kairouan">kairouan</option>             
                    <option value="Sfax">Sfax</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Gabes">Gabes</option>
                    <option value="Tataouin">Tataouin</option>
                    </select>
                    <input type="number" placeholder="City code" name="codepostal" required maxlength="4"><br>
                </div>
                
                <input type="submit" name="ok" value="Confirmer"></button>
                <h4>You have an account ? <a href="" id="log">Login now.</a></h4>
            </form>
            </div>
        </nav>
    </section>

    <section class="desc_sec">
        <nav>
           <div id="wel_h2">
                <h2>Welcome to " Mobile Services. "</div></h2>
            </div>
            <h1>Do you want to </br><div id="repa">repair</div> </br>your cell phone ?</h1>
        </nav>
    </section>
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
                // Insertion à la base de données
                if(isset($_POST['ok']))
                {
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $mail=$_POST['email'];
                    $phone=$_POST['numphone'];
                    $city=$_POST['sel'];
                    $codepostal=$_POST['codepostal'];
                    if(isset($_POST['password']))
                    {
                        $mdp=$_POST['password'];
                    }
                    $sql=" INSERT INTO utilisateur (firstname,lastname,mail,phone,city,codepostal,mdp)
	                VALUE ('$firstname', '$lastname', '$mail', '$phone', '$city', '$codepostal','$mdp')";

                    if($conn->query($sql)===TRUE)
                    {
                        header("Location: home.php");
                    }else{
                        echo "<h2>Vérifier les champs </h2>" . $txt1 . "</h2>";
                        echo "Error: ". $sql . "<br>" . $conn->error;
                    }
                }
    ?>
    </body>
</html>