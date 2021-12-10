<?php
require_once "../src/config.php";
showHeader($extraCss = ['assets/css/home.css']);
?>
<body>
    <h1>Myflix</h1>
    <h1><?php echo $lang["submit"]; ?></h1>
</body>
<?php showFooter(); ?>