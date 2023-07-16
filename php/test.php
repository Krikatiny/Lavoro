<?php

$mysqli = require __DIR__ . "/database_vacanties.php";
$query = "SELECT * FROM vacanties";
$result = mysqli_query($mysqli,$query);
$queryForTags = "SELECT tag_name FROM vacanties";
$resultTag = mysqli_query($mysqli, $queryForTags);

$tags = mysqli_fetch_assoc($resultTag);

$tags_imple = implode("",$tags);
$arr = explode(",", $tags_imple);


foreach ($arr as $item){
    echo $item;
    echo " ";
}



?>