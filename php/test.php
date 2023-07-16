<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$query = "SELECT * FROM user_favourite";
$result = mysqli_query($mysqli,$query);
$userID = $_SESSION['user_id'];
$queryForTags = "SELECT vac_id FROM user_favourite WHERE user_id = $userID";
$stmt = $mysqli->prepare($queryForTags);
if(!$stmt){
    die("Error1");
}



$resultTag = mysqli_query($mysqli, $queryForTags);

$tags = mysqli_fetch_assoc($resultTag);

$tags_imple = implode("",$tags);
$arr = explode(",", $tags_imple);


foreach ($arr as $item){
    echo $item;
    echo " ";
}



?>