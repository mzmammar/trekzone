<?php




    //host
    define("HOST","localhost");

    //dbname
    define("DBNAME","trekzone");

    //username
    define("USER","root");

    //passwrd
    define("PASS","");


    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER,PASS);

    /*if($conn == true)
    {
        echo "db connection success";
    }
    else { echo "erro";   }  */

    
