<?php


    // *************** PHP7 START ***************  
    if(!function_exists('mysql_pconnect')){  
        function mysql_pconnect($dbhost, $dbuser, $dbpass){  
            global $dbport;  
            global $dbname;  
            global $mysqli;  
            //$mysqli = mysqli_connect("$dbhost:$dbport", $dbuser, $dbpass, $dbname);  
            $mysqli = mysqli_connect("localhost", "id8756987_web", "12345678", "id8756987_schoola");
            return $mysqli;  
            }  
        function mysql_p2connect($dbhost, $dbuser, $dbpass, $dbname){  
            global $mysqli;  
            $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);  
            return $mysqli;  
            }  
        function mysql_select_db($dbname){  
            global $mysqli;  
            return mysqli_select_db($mysqli,$dbname);  
            }  
        function mysql_fetch_array($result){  
            return mysqli_fetch_array($result);  
            }  
        function mysql_fetch_assoc($result){  
            return mysqli_fetch_assoc($result);  
            }  
        function mysql_fetch_row($result){  
            return mysqli_fetch_row($result);  
            }  
        function mysql_query($cxn){  
            global $mysqli;  
            return mysqli_query($mysqli,$cxn);  
            }  
        function mysql_escape_string($data){  
            global $mysqli;  
            return mysqli_real_escape_string($mysqli, $data);  
            }  
        function mysql_real_escape_string($data){  
            global $mysqli;  
            return mysqli_real_escape_string($mysqli, $data);  
            }  
        function mysql_close(){  
            global $mysqli;  
            return mysqli_close($mysqli);  
            }  
        function mysql_error(){  
            global $mysqli;  
            return mysqli_connect_error();  
        }
        function mysql_num_rows($result){
            global $mysqli;
            return mysqli_num_rows($result);
        }
        function mysql_free_result($result){
            global $mysqli;
            return mysqli_free_result($result);
        }
        function mysql_db_query($dbname, $cxn){
            global $mysqli;  
            return mysqli_query($mysqli,$cxn); 
        }
    }  


?>