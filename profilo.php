
<?php
require_once 'database.php';
require_once 'auth.php';

$conn =  mysqli_connect($database['host'],$database['username_db'],$database['password_db'],$database['db_name']) or die(mysqli_error($conn));



$query="SELECT nome,cognome,email FROM users WHERE username = '".$_SESSION['username']."'";
$res=mysqli_query($conn,$query);
$utente= mysqli_fetch_assoc($res);
$nome = mysqli_real_escape_string ($conn,$utente['nome']);
$cognome = $utente['cognome'];
$email = $utente['email'];

?>

<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="slide.css">

<body>

<header>
        <nav>
            <ul class="menu">
                <li><a href="_home2.php">Home</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Orari</a></li>
                </ul>
            </li>
            </ul>
           
        </nav> 
    </header>

    <section class="utente">

        <div>nome:<?php echo($nome)?></div>
        <div>cognome:<?php echo($cognome)?></div>
        <div>email:<?php echo($email)?></div>
        
     </section>

     <footer class="end2">
    <div>
      <a href="#">Comunity</a>
      <a href="#">FAQ</a>
      <a href="#">Supporto</a>
    </div>

    <div>
    <a href="#">FAX</a>
    <a href="#">numeri utili</a>
    

    </div>

    </footer>



</body>
</html>