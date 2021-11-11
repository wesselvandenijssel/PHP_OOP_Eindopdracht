<?php
include_once '../config/database.php';
include_once '../objects/words.php';

$database = new Database();
$db = $database->getConnection();
// initialize object 
$scheldewoord = new words($db);

if (isset($_POST['inputTxt'])) {
    echo $scheldewoord->filter($_POST['inputTxt']);
}

?>

<form method="POST">
    <textarea name="inputTxt" cols="30" rows="10"></textarea>
    <input type="submit" value="filter">
</form>