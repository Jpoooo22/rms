<?php

// define constant variables
// Values come from environment variables when set (e.g. inside Docker),
// otherwise fall back to the local XAMPP/MySQL setup.
define('DB_NAME', getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'rms');
define('DB_USER', getenv('DB_USER') !== false ? getenv('DB_USER') : 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : 'underwaterxxx*');
define('DB_HOST', getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost');

try{

    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded language
    mysqli_set_charset($con, 'utf8');

    // relax SQL mode so MySQL 8 accepts the loose values this app was built for (MariaDB)
    mysqli_query($con, "SET SESSION sql_mode=''");


}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}
?>