<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" media="screen" href="manage.css" >
</head>
<body>
<form name="edit" >
<?php
$id = 0;
$strName = "";
if (isset($_GET['var']))
{
    $var = $_GET['var'];
}
if (isset($_GET['strVar']))
{
    $strName = $_GET['strVar'];
}

$id = intval($var);
echo $id;
echo $strName;
echo "<a href='#openModal'>Delete</a>";

echo "<div id='openModal' class='modalDialog' display='block' method='post'
    name='Delete'>
    <div><a href='#close' title='Закрыть' class='close'></a>
    <h2>Question</h2>
    <p> Delete $strName user?</p>
    <p>git commit -m "first commit"
       <button type='submit' formmethod='post' formaction='delete1.php?var=$id&f=1'>Cancel</button></p>
    </div></div>";

?>

</form>
</body>
</html>