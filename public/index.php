<?php
require_once "../src/config.php";
showHeader($extraCss = ['assets/css/home.css']);
?>
<body>
    <div class="header">
        <img src="assets/img/logo.png" alt="logo" height="45">
        <input type="text" placeholder="Search">
        <button class="red-btn-filled">My Account</button>
    </div>
    <div class="content">
        <h1>Placeholder</h1>
        <div class="images">
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_1.jpg" alt="placeholder 1"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_2.jpg" alt="placeholder 2"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_3.jpg" alt="placeholder 3"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_4.jpg" alt="placeholder 4"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_5.jpg" alt="placeholder 5"></a>
        </div>
        <h1>Placeholder</h1>
        <div class="images">
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_6.jpg" alt="placeholder 6"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_7.jpg" alt="placeholder 7"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_8.jpg" alt="placeholder 8"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_9.jpg" alt="placeholder 9"></a>
            <a href="index.php"><img src="assets/img/Placeholders/Placeholder_10.jpg" alt="placeholder 10"></a>
        </div>
    </div>

</body>
<?php showFooter(); ?>