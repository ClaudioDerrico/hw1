<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="slide.css">
<link rel="stylesheet" href="risorse/owl.carousel.min.css">
<link rel="stylesheet" href="risorse/owl.theme.default.min.css">
<script src="risorse/tornasu.js" defer="true"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="risorse/owl.carousel.js"></script>



<script type= "text/javascript">

$( document ).ready(function() {
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    //i numeri 0,600,1000 dicono: se la dim è maggiore di 1000 fai vedere 1 items se compreso tra 600 e 1000 fai vedere 1 item (gli item decidi tu quanti farne vedere) 
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
});

</script>

</head>
<body>
    
    <header>

        
    <nav>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Orari</a></li>
                <li><span id="accedi"> <a href="login.php"> Accedi</a></span></li>
            </ul>
           
        </nav> 
    </header>


    <div class="owl-carousel owl-theme">
        <div class="item" id="img1">
            <div id='overlay'></div>
            <h1>Un nuovo mondo per il fitness</h1>
        </div>

        <div class="item" id="img2">
            <div id='overlay'></div>
            <h1>Migliaia di schede per te </h1>
        </div>
        <div class="item" id="img3">
            <div id='overlay'></div>
            <h1>Scegli un percorso e inzia ad allenarti</h1>
        </div>
        
    </div>


    <div class="spazio"></div>

<h1 class="intestazione">RAGGIUNGI LA TUA FORMA IDEALE ,SCEGLIENDO QUELLO CHE FA PIU' PER TE</h1>

<div class="spazio"></div>

<p class="presentazione"> Sito dedicato a chi vuole raggiungere risultati tangibili in poco tempo. 
    Nella nostra palestra di nuova concezione offriamo varie tipologie di allenamento. I nostri percorsi fitness sono studiati in base alle esigenze di ogni genere ed età. 
    Personal trainer qualificati ti seguiranno in modo dedicato durante l'allenamento.
</p>



<section class="contenitore_immagini">

<div class="contenuto">
<img src="immagini/alimentazione.jpg"/>
<h1>ALIMENTAZIONE</h1>
<p>Scopri subito la miglior dieta per te, seguendo i nostri consigli potrai migliorarti in pochissimo tempo</p>
<a href="#">SCOPRI DI PIU'</a>
</div>

<div class="contenuto">
    <img src="immagini/abbonamento.jpg"/>
    <h1>ABBONAMENTO</h1>
    <p>Scegli il piano che fa più per te, un team di personal trainer si prenderà l'impegno di gestirti al meglio</p>
    <a href="#">SCOPRI DI PIU'</a>
    </div>

<div class="contenuto">
<img src="immagini/allenamenti.jpg"/>
<h1>ALLENAMENTO</h1>
<p>Valuta qual è il miglior tipo di allenamento adatto al tuo fisico in base al tuo metabolismo e somatotipo</p>
<a href="#" >SCOPRI DI PIU'</a>

</div>



</section>


<footer class="end">
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