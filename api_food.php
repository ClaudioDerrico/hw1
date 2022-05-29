<?php


$app_key= "1c354f8eeb34c2b9fc6dca11ee08cc1b";
$app_id= "089928d3";

$data = http_build_query(array("app_id" => $app_id, "app_key" => $app_key, "ingr" => $_GET["alimento"], "nutrition-type" => "cooking" ));
$curl= curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.edamam.com/api/food-database/v2/parser?".$data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);



$result = curl_exec($curl);
echo $result;
curl_close($curl);


?>