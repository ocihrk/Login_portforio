<?php
// Create connection to the database
$conn = mysqli_connect("localhost","root","","loginphp");
//check for database connection error
if(!$conn){
die("Database Error");
}
mysqli_set_charset($conn,"utf8");
$msg="";
if (array_key_exists("username",$_POST) &&
array_key_exists("password",$_POST)&&
array_key_exists("repassword",$_POST)
){
    if($_POST["password"]!== $_POST["repassword"])
    die("incorrect repassword");
    {
        echo"Secessfully";
        // Insert password
        $query = "INSERT INTO loginphp";
        $query .= "(username, password)";
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $query .= "VALUES('{$_POST["username"]}','{$password}')";
        if(!mysqli_query($conn,$query)){
            echo $query;
            echo musqli_error($conn);
        }
    }
}
?>
