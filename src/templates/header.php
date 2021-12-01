<?php
/**
 * This function shows the header and if needed extra css can be loaded
 * @param array $extra_css
 * @param bool $use_template
 */
function show_header($extra_css = [], $use_template = true) {
    // When use_template=true load the template.css else create an empty variable
    $css = ($use_template) ? '<link rel="stylesheet" href="assets/css/template.css">' . "\n" : '';
    // When there are extra_css files provided add them to the css variable
    if (sizeof($extra_css) > 0) {
        foreach ($extra_css as $css_line) {
            $css .= '<link rel="stylesheet" href="' . htmlspecialchars($css_line) . '">' . "\n";
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

