<?php
/**
 * This function shows the header and if needed extra css can be loaded
 * @param array $extraCss
 * @param bool $useTemplate
 */
function showHead(array $extraCss = [], bool $useTemplate = true) {
    // When use_template=true load the template.css else create an empty variable
    $css = ($useTemplate) ? '<link rel="stylesheet" href="assets/css/template.css">' . "\n" : '';
    // When there are extra_css files provided add them to the css variable
    if (sizeof($extraCss) > 0) {
        foreach ($extraCss as $cssLink) {
            $css .= '<link rel="stylesheet" href="' . htmlspecialchars($cssLink) . '">' . "\n";
        }
    }
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFlix</title>
    ' . $css . '
</head>' . "\n";
}

