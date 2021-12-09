<?php
/**
 * A simple template for all the buttons and html tags
 * THIS FILE NEEDS TO BE REMOVED BEFORE PRODUCTION
 */
require_once "../src/config.php";
showHead();
?>
<body>
    <?php showHeader(); ?>
    <h1>H1</h1>
    <h2>H2</h2>
    <h3>H3</h3>
    <h4>H4</h4>
    <h5>H5</h5>
    <h6>H6</h6>
    <button class="red-btn">.red-btn</button>
    <button class="red-btn-filled">.red-btn-filled</button>
    <form method="post">
        form
        <input type="text" placeholder="text">
        <input type="button" value="button">
        <input type="password" placeholder="password">
        <input type="number" placeholder="number">
        <input type="tel" placeholder="tel">
        <textarea placeholder="textarea"></textarea>
        <select>
            <optgroup label="optgroup">
                <option>option</option>
                <option>option</option>
            </optgroup>
            <option>option</option>
        </select>
        <input type="submit" value="submit">
    </form>
    <?php showFooter(); ?>
</body>
