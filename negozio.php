<?php

require_once 'database.php';
session_start();
$connect =  mysqli_connect($database['host'],$database['username_db'],$database['password_db'],$database['db_name']) or die(mysqli_error($conn));


if (isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        
      $session_array_id= array_column($_SESSION['cart'], "id"); // array column vuole un input e una column keyù


      if(!in_array($_GET['id'], $session_array_id)){ //controlla se dentro l'array è presente l'id di session_array_id

        $session_array = array(
            'id'=> $_GET['id'],
            "name"=>$_POST['name'],
            "price"=>$_POST['price'],
            "quantity"=>$_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;

        

      }

    }
    else{
        $session_array = array(
            'id'=> $_GET['id'],
            "name"=>$_POST['name'],
            "price"=>$_POST['price'],
            "quantity"=>$_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<meta charset="utf-8">
<link rel="stylesheet" href="slide.css">

</head>

<body>



<header>
        <nav>
            <ul class="menu">
                <li><a href="_home2.php">Home</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Orari</a></li>
                
            </ul>
           
        </nav> 
    </header>






<div class="container-fluid">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">SCEGLI IL TUO PIANO</h2>

            <?php

            $query = "SELECT * FROM cart_item";
            $result = mysqli_query($connect,$query);

            while($row = mysqli_fetch_array($result)){?>
            <div class="col-md-4">

            <form method="post" action="negozio.php?id=<?=$row['id']?>">
            <img src="immagini/<?= $row['image'] ?>"  style= 'height: 150px;margin: 25px 335px;'>
            <h5  class="text-center" style="margin: 3px 335px;"><?=$row['name']; ?></h5>
            <h5 class="text-center" style="margin: 3px 335px;"><?= number_format($row['price'],2); ?></h5>
            <input type="hidden" name="name" value="<?= $row['name'] ?>">
            <input type="hidden" name="price" value="<?= $row['price'] ?>">
            <input  type="number" name="quantity" value="1" class="form-control" style="margin: 3px 335px;">
            <input  type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Aggiungi al carrello" style="margin-left: 335px;">

            </form>
            </div>


            <?php
            }

            ?>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">CARRELLO</h2>

            <?php

            $total = 0;

            //var_dump($_SESSION['cart']); //stampa le variabili specificandone il tipo

            $output = "";

            $output .= "
            <table class = 'table table-bordered table-striped'>
            <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item quantity</th>
            <th>Total Price</th>
            <th>Action</th>
            </tr>

            ";
            //con tr td e th creo le tabelle: Il <tr>tag definisce una riga in una tabella HTML 

            /*
            Una tabella HTML ha due tipi di celle: 
            Celle di intestazione: contiene informazioni sull'intestazione (create con l' elemento <th> )
               Celle dati - contiene dati (creati con l' <td>elemento)*/


               if(!empty($_SESSION['cart'])){

                foreach ($_SESSION['cart'] as $key => $value){  

                    $output .=" 
                    <tr>
                    <td>".$value['id']."</td>
                    <td>".$value['name']."</td>
                    <td>".$value['price']."</td>
                    <td>".$value['quantity']."</td>
                    <td>$".number_format($value['price'] * $value['quantity'])."</td>
                    <td>

                    <a href= 'negozio.php?action=remove&id=".$value['id']."'>
                    <button class='btn btn-danger btn-block'>Remove</button>
                    </a>
                      
                    </td>
                    
                    ";

                    $total = $total + $value['quantity']  * $value['price'];



                }

                //colspan mi dice dopo quante colonne deve essere inserito il valore in questo caso dopo 3
                $output .= "
                <tr>
                <td colspan='3'></td> 
                <td><strong>Total Price</strong></td>
                <td>".number_format($total,2)."</td>
                <td>
                   <a href='negozio.php?action=clearall'>
                   <button class='btn btn-warning btn-block'>Clear All</button>
                   </a>
                
                </td>
                </tr>
                ";

               }


               echo $output;
            ?>


        </div>
    </div>
</div>



</div>



<?php
if(isset($_GET['action'])){
    if($_GET['action'] == "clearall"){
        unset($_SESSION['cart']);
    }

    if($_GET['action'] == "remove"){

        foreach($_SESSION['cart'] as $key => $value){

            if($value['id'] == $_GET['id']){

                unset($_SESSION['cart'][$key]);

            }
        }
       
    }
}
?>




</body>

</html>