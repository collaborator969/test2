<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
        table {
            border: 1px solid #ccc;
            border-spacing: 3px;
        }
         
        td, th{
            border: solid 1px #ccc;
        }
        .collapsed{
            border-collapse: collapse;
        }
        .separated{
            border-collapse: separate;
        }
        </style>
</head>
<body>
<form name="edit">
<a href='index.php'>Back</a>
<a href='Edit.php?var=0'>Add News User</a>
<?php

require_once 'connection.php';

$strUserName = " ";
$iIdUser = 0;
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
//--------------------
$query ="SELECT bi_image, c_name, c_adres, id FROM bd_test.spr_users";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    //--------------
    echo "<h3>Users Manage</h3>";
    echo "<table class='collapsed'>";
    echo "<tr>";
    echo "<th>Image</th><th>Name</th><th>Adress</th><th>Action</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) 
            {
                if ($j==0)
                {
                    echo "<td><img src='$row[$j]'></td>";
                    //echo "<td>$row[$j]</td>";
                }
                else
                {
                    echo "<td>$row[$j]</td>";
                }
                
            }
        
        echo "<td>";
        echo "<a href='Edit.php?var=$row[3]'>Edit</a>";
        echo "        ";
        echo "<a href='Delete.php?var=$row[3]&strVar=$row[1]'>Delete</a>";
        
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($result);
}
     
// --------------------------------
mysqli_close($link);

   
?>
</form>
</body>
</html>