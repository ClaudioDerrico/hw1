

<?php

require_once 'database.php';

 // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
 require_once 'auth.php';
 if (checkAuth()) {
     header('Location: _home.php');
     exit;
 }  

if( isset($_POST["username"]) && isset($_POST["password"])){
    $error=array();
    $conn =  mysqli_connect($database['host'],$database['username_db'],$database['password_db'],$database['db_name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username";
    $query = "SELECT username, password FROM users WHERE $searchField = '$username'";
    $res=mysqli_query($conn,$query);

    if (mysqli_num_rows($res) > 0) {
      
        // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
        $entry = mysqli_fetch_assoc($res);
        if ($password==$entry['password']) {

            // Imposto una  ione dell'utente
            $_SESSION["username"] = $entry['username'];
            header("Location: _home2.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    $error[] = "Username e/o password errati.";

}
else if (isset($_POST["username"]) || isset($_POST["password"])) {
    // Se solo uno dei due è impostato
    $error[] = "Inserisci username e password.";
}

?>





<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="stile.css">
        <script src="home.js" defer></script>
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

    <h2 class="active"> LOGIN </h2>
    
    <!-- Login Form -->
    <form method="post">

    <div class="names">


              <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span></span>
              </div>

              <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span></span>
              </div>
                    <div class="submit">
                    <input type="submit" class="fadeIn fourth" value="LOGIN">
              </div>
  </div>
    </form>

    
    <div id="formFooter">
      <a class="underlineHover" href="registrati.php">Registrati</a>
    </div>

  </div>
</div>
</body>
</html>