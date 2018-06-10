<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML5 Contact Form</title>
<link rel="stylesheet" media="screen" href="edit.css" >
</head>
<body>
<a href='manage_users.php'>Back</a>
        <?php
        $var = 0;
        if (isset($_GET['var']))
        {
            $var = $_GET['var'];
        }
        $id = intval($var);

        $strUserName = "";
        $iIdUser = 0;
        $sAdress = "";
        $sImage ="";
        if ($id == 0)
        {
            $name_form = "Add new user";
        }
        else
        {
            $name_form = "Edit user";
            //--------
            require_once 'connection.php';

            $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link));
          
            //--------------------
            $query ="SELECT bi_image, c_name, c_adres, id FROM bd_test.spr_users 
                    where id = $id";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                //--------------
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                        for ($j = 0 ; $j < 3 ; ++$j) echo $row[$j];
                        $strUserName = $row[1];
            $iIdUser = $row[3];
            $sAdress = $row[2];
            $sImage =$row[0];
            echo $sImage;
           
                }
                mysqli_free_result($result);
            }
            // --------------------------------
            mysqli_close($link);
            //--------
        }
        ?>
        <form class="edit_form" action="save.php" method="post" name="edit_form">
                <ul>
                    
                    <li>
                        <h2><?php echo $name_form; ?></h2>
                    <!--<span class="required_notification">* Denotes Required Field</span>-->
                    </li>
                    <li>
                        <label for="name_user">Name:</label>
                        <!--<input type='text' name='name' value='$strUserName'/>-->
                        <?php echo "<input type='hidden' name='userId' value='$iIdUser'/>"; ?>
                        <?php echo "<input type='text' name='name' value='$strUserName'/>"; ?>
                        <span class="form_hint">Proper format email</span>
                    </li>
                    <li>
                        <label for="image">Image:</label> 
                        <!--<a href="upload.php">-->
                        <?php //echo "<img src='$sImage' alt='Image'>";?>
                                
                        <!--</a>   -->
                        <input type='file' name='filename' value='use2.jpg'/>
                        <?php echo "<img src='$sImage' alt='Image'>";?>
                    </li>

                    <li>
                        <label for="address">Address:</label>
                        <?php echo "<input type='text' name='Address' value='$sAdress'/>"; ?>
                        <span class="form_hint">Proper format email</span>
                    </li>

                    <li>
                        <button class="submit" type="submit">Submit</button>
                        <?php
                        //echo "<button type='submit' formmethod='post' formaction='save.php?f=1&var=$id'>Submit</button>";
                        //echo "<button type='submit' formmethod='post' formaction='save.php?f=0&var=$id'>Cancel</button>";
                        ?>
                    </li>
                </ul>
        </form>
</body>
</html>