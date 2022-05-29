<?php
require_once 'database.php';

if(!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
    $error=array();
    $conn =  mysqli_connect($database['host'],$database['username_db'],$database['password_db'],$database['db_name']) or die(mysqli_error($conn));

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])){
        $error[] = "Username non valido";
    }

    else{
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $query="SELECT username FROM users WHERE username ='$username'";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res) >0){
            $error[]="username già esistente";
        }
    }


    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $query="SELECT email FROM users WHERE email ='$email'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res) >0){
        $error[]="email già esistente";
    }
    
    
    





if(isset($_POST['password']))
if (strlen($_POST['password']) < 8){
    $error[]="caratteri non sufficenti";
}

if(isset($_POST['email']))
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error[]="email non valida";
}


if(isset($error))
if(count($error)==0){
    $nome=mysqli_real_escape_string($conn,$_POST['nome']);
    $cognome=mysqli_real_escape_string($conn,$_POST['cognome']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    

    $query= "INSERT INTO users(username,nome,cognome,email,password) VALUES ('$username','$nome','$cognome','$email','$password')";

    if(mysqli_query($conn, $query)){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        header('Location: login.php');
        mysqli_close($conn);
        exit;
    }
}
}
    
?>




<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="stile.css">
        <script src="risorse/home.js" defer></script>
    </head>
    <body>

<?php

if(isset($error))
foreach ($error as $errore ){
echo $errore;
echo "<br>";
}

?>
  

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Registrati </h2>
    

    
    <form method="post" >
    <div class="names">
                    <div class="name">
                        <div><label for='name'>Nome</label></div>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                        <div><input type='text' name='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?> ></div>
                        <span></span>
                    </div>
                    <div class="surname">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='cognome' <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?> ></div>
                        <span></span>
                    
                    </div>
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span></span>
                </div>
                
                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                    <span></span>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span></span>
                </div>

                <div class="submit">
                <input type="submit" class="fadeIn fourth" value="REGISTRATI">
                </div>
</div>
      
    </form>
</div>
</div>
    </body>
</html>

