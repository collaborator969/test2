<?php
$url = "manage_users.php";

//$username = $_POST['name'];
//$Address = $_POST['Address'];
//$sImage = $_POST['filename'];
$userId = $_POST['userId'];
$id = intval($userId);

require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
//--------------------
$username = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
$Address = htmlentities(mysqli_real_escape_string($link, $_POST['Address']));
$sImage = htmlentities(mysqli_real_escape_string($link, $_POST['filename']));
if ($id==0)
{
//-------------------
    $query ="INSERT INTO bd_test.spr_users (bi_image, c_name, c_adres) 
        VALUES ('$sImage', '$username', '$Address')";
//-------------------
}
else
{

    $query ="UPDATE bd_test.spr_users SET bi_image = '$sImage', c_name='$username',
        c_adres='$Address' WHERE id=$id";
    
}
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);

session_start();
@header('Location: ' . $url);

?>