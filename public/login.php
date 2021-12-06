<?php
require_once "../src/config.php";
showHeader($extra_css = ['assets/css/template.css']);
?>

<?php
$username = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["username"]) || !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        echo "niet leeg";
    }else{
        echo "leeg";
    }
}

?>

    <body>
    <h1>Login</h1>

    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Username">
        <label for="password">Password</label>
        <input  type="password" id="password" name="password">

        <input type="submit" value="Log in">
    </form>

    </body>
<?php showFooter(); ?>