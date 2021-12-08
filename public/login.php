<?php
require_once "../src/config.php";
showHeader($extra_css = ['assets/css/template.css']);
?>

<?php
$email = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "test@test.com";
        $sql2 = "test";
//        $sql = "SELECT emailadress FROM account WHERE emailadress=$email";
//        $stmtLogin = mysqli_prepare($conn, $sql) OR DIE("stmt errer");
//
//        mysqli_stmt_execute($stmtLogin) OR DIE("stmt execute error");
//
//        mysqli_stmt_close($stmtLogin);
        if($email == $sql){
            if($password == $sql2){
                echo "you are logged in";
            }
            else{
                echo "wrong information";
            }
        }else{
            echo "wrong information";
        }
    }else{
        echo "please fill in both";
    }
}

?>

    <body>
    <h1>Login</h1>

    <form method="post" action="">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="E-mail adress">
        <label for="password">Password</label>
        <input  type="password" id="password" name="password" placeholder="Password">

        <input type="submit" value="Log in">
    </form>

    </body>
<?php showFooter(); ?>