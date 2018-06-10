<?php
$url = "manage_users.php";

$id = 0;
$fl =0;
if (isset($_GET['f']))
{
    $fl = $_GET['f'];
}
$fl = intval($fl);
if (isset($_GET['var']))
{
    $var = $_GET['var'];
}
$id = intval($var);
echo $id;
if ($fl==0)
{
//-------------------
    require_once 'connection.php';

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    //--------------------
    $query ="DELETE FROM bd_test.spr_users WHERE id = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    //-------------------
    mysqli_close($link);
}
session_start();
@header('Location: ' . $url);

?>