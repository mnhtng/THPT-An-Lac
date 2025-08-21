<?php
$width = isset($_GET['w']) ? max(1, (int)$_GET['w']) : 300;
$height = isset($_GET['h']) ? max(1, (int)$_GET['h']) : 200;
$text = isset($_GET['text']) ? urldecode($_GET['text']) : ($width . 'x' . $height);
$bg = isset($_GET['bg']) ? $_GET['bg'] : 'e5e7eb';
$color = isset($_GET['color']) ? $_GET['color'] : '374151';

function hexToRgb($hex)
{
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $int = hexdec($hex);
    return [($int >> 16) & 255, ($int >> 8) & 255, $int & 255];
}

if (!function_exists('imagecreatetruecolor')) {
    header('Content-Type: image/svg+xml');
    $bg = '#' . preg_replace('/[^0-9a-f]/i', '', $bg);
    $color = '#' . preg_replace('/[^0-9a-f]/i', '', $color);
    echo "<svg xmlns='http://www.w3.org/2000/svg' width='{$width}' height='{$height}'>";
    echo "<rect width='100%' height='100%' fill='{$bg}'/>'";
    echo "<text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' font-family='Arial' font-size='16' fill='{$color}'>" . htmlspecialchars($text) . "</text>";
    echo '</svg>';
    exit;
}

$img = imagecreatetruecolor($width, $height);
[$br, $bg_g, $bb] = hexToRgb($bg);
[$cr, $cg, $cb] = hexToRgb($color);
$bgColor = imagecolorallocate($img, $br, $bg_g, $bb);
$textColor = imagecolorallocate($img, $cr, $cg, $cb);

imagefilledrectangle($img, 0, 0, $width, $height, $bgColor);

$fontSize = 4; // built-in font
$textWidth = imagefontwidth($fontSize) * strlen($text);
$textHeight = imagefontheight($fontSize);
$x = max(0, (int)(($width - $textWidth) / 2));
$y = max(0, (int)(($height - $textHeight) / 2));

imagestring($img, $fontSize, $x, $y, $text, $textColor);

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
