<?php
require_once 'Text/CAPTCHA.php';
    // Set CAPTCHA image options (font must exist!)
session_start;
    $imageOptions = array(
        'font_size' => 24,
        'font_path' => './',
        'font_file' => 'arial.ttf',
        'text_color' => '#DDFF99',
        'lines_color' => '#CCEEDD',
        'background_color' => '#555555'
    );
// Set CAPTCHA options
    $options = array(
        'width' => 200,
        'height' => 80,
        'output' => 'png',
        'imageOptions' => $imageOptions
    );
// Generate a new Text_CAPTCHA object, Image driver
    $c = Text_CAPTCHA::factory('Image');
    $c->init($options);
    // Get CAPTCHA secret passphrase
    $_SESSION['phrase'] = $c->getPhrase();
    // Get CAPTCHA image (as PNG)
    $png = $c->getCAPTCHA();

	file_put_contents("test". '.png', $png);

    echo '<form method="post">' .
        '<img src="'."test".'.png?' . time() . '" />' .
        '<input type="text" name="phrase" />' .
        '<input type="submit" /></form>';
?>