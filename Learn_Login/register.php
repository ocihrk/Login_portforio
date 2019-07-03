<?php
// データベース接続
$conn = mysqli_connect("localhost","root","","loginphp");
//データベース接続エラー表示
if($conn->connect_errno >0){
    die("Unable to connection to dababase
    [".$conn->connect_error."]");
}else 
echo"";
session_start();
if(isset($_POST["save"])){
    //変数
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(trim($username)!=""and trim($password)!= ""){
        //入力されたものをサニタイズ
        $username=stripcslashes($username);
        $password=stripcslashes($password);
        $username=strip_tags($_POST["username"]);
        $password=strip_tags($_POST["password"]);
        
        $username= mysqli_real_escape_string($conn,$username);
        $password= mysqli_real_escape_string($conn,$password);
        //SQL Query
        $query = mysqli_query($conn,"SELECT * FROM loginphp WHERE 
        username='$username' AND password ='$password'");
        //MySQLを適用する
        $numrows= mysqli_num_rows($query);
        if($numrows >0){
            $_SESSION["username"]= $username;
            //遷移先
            echo"Username or password is correct！";
            exit;
        }else{
            echo"Username or password is incorrect.";
        }
           
    }
}

?>