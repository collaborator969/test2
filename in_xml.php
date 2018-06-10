<?php
            //------------------------------------------
            function parseToXML($htmlStr)
            {
                $xmlStr=str_replace('<','&lt;',$htmlStr);
                $xmlStr=str_replace('>','&gt;',$xmlStr);
                $xmlStr=str_replace('"','&quot;',$xmlStr);
                $xmlStr=str_replace("'",'&#39;',$xmlStr);
                $xmlStr=str_replace("&",'&amp;',$xmlStr);
                return $xmlStr;
            }
            //-------------------------------------------
            require_once 'connection.php';
            $link = mysqli_connect($host, $user, $password, $database) 
                    or die("Ошибка " . mysqli_error($link));

            $query ="SELECT bi_image, c_name, c_adres, id FROM bd_test.spr_users";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            
            header("Content-type: text/xml");
            echo '<markers>';
            $rows = mysqli_num_rows($result);
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                // Add to XML document node
                echo '<marker ';
                echo 'name="' . parseToXML($row[1]) . '" ';
                echo 'address="' . parseToXML($row[2]) . '" ';
                //echo 'lat="' . $row['lat'] . '" ';
                //echo 'lng="' . $row['lng'] . '" ';
                //echo 'type="' . $row['type'] . '" ';
                echo '/>';
              }

            echo '</markers>';

            //---------------------------------------------



        ?>