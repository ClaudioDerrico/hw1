<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="slide.css">

<script src="risorse/apifood.js" defer="true"></script>


</head>
<body>
    
    <header>
        <nav>
            <ul class="menu">
                <li><a href="_home2.php">Home</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Orari</a></li>
                <li class="has-children"><a href="#">Profilo</a>
                <ul class="sub-menu">
                <li><a href="profilo.php"> Impostazioni</a></li>
                <li><a href="logout.php"> LogOut </a></li>
                </ul>
            </li>
            </ul>
           
        </nav> 
    </header>



    

    <form method="POST" class="barra">
    
    <span>scopri i valori nutrzionali per 100g di alimento</span>
    <input type='text' id='food' name="alimento" placeholder="insert food in english">
    <input type='submit' id='invia' value='cerca'>
       
    </form>



    <div class="raggruppamento">
        <div></div>

    </div>
        




<footer class="end2">
    <div class="prova">
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