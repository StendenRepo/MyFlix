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
            <img src="assets/img/Placeholders/Placeholder_1.jpg" alt="placeholder 1">
            <img src="assets/img/Placeholders/Placeholder_2.jpg" alt="placeholder 2">
            <img src="assets/img/Placeholders/Placeholder_3.jpg" alt="placeholder 3">
            <img src="assets/img/Placeholders/Placeholder_4.jpg" alt="placeholder 4">
            <img src="assets/img/Placeholders/Placeholder_5.jpg" alt="placeholder 5">
        </div>
        <h1>Placeholder 2</h1>
    </div>

</body>
<?php showFooter(); ?>