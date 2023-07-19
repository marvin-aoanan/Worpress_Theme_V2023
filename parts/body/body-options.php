<?php
$option_enable = of_get_option("enable_custom_body");
$option_type = of_get_option("background_type");
$body_bg_color = of_get_option("body_bg_color");
$body_text_color = of_get_option("body_text_color");
$body_bg_gradient = of_get_option("body_bg_gradient");
$body_bg_img = of_get_option("bgimage_upload");
$body_bg_repeat = of_get_option("bgrepeat_select");
$body_bg_attachment = of_get_option("bgattachement_select");
$body_bg_pos = of_get_option("bgposition_select");
$body_bg_size = of_get_option("bgimage_size");
$output = "";

// Get custom Typography

$enable_custom_typography = of_get_option("enable_custom_typography");
$body_font_family = of_get_option("body_font_family_select");
$headings_font_family = of_get_option("headings_font_family_select");
$p_font_family = of_get_option("p_font_family_select");

if ($option_type == 0) {
    $output .= $body_bg_color;
} else if ($option_type == 1) {
    $output .= $body_bg_gradient;
} else if ($option_type == 2) {
    $output .= $body_bg_color . " url('" . $body_bg_img . "') " . $body_bg_repeat . " " . $body_bg_attachment . " " . $body_bg_pos . ";\n";
    $output .= "background-size: " . $body_bg_size . ";";
} else {
    $output .= "none";
}

?>

<?php if($enable_custom_typography == 1) { ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Beau+Rivage&family=Neonderthaw&family=Quintessential&family=Rubik:wght@400;700&family=Sacramento&family=Shadows+Into+Light&family=Tangerine:wght@400;700&family=Water+Brush&family=Waterfall&display=swap" rel="stylesheet">
<?php } ?>

<?php if($option_enable == 1) { ?>
<style type="text/css">
    :root {
        --bs-body-bg: <?php echo $body_bg_color; ?>;
        --bs-body-color: <?php echo $body_text_color; ?>;
    }
    body {
        background: <?php echo $output; ?>;
    }
</style>
<?php } ?>

<?php if($enable_custom_typography == 1) { ?>
    <style type="text/css">
        :root {
        <?php if($enable_custom_typography == 1 && !empty($body_font_family)) { ?>
            --bs-body-font-family: <?php echo $body_font_family; ?>;
        <?php } ?>
        }
        <?php if($enable_custom_typography == 1 && !empty($headings_font_family)) { ?>
        h1, h2, h3, h4, h5, h6 {
            font-family: <?php echo $headings_font_family; ?>;
        }
        <?php } ?>
        <?php if($enable_custom_typography == 1 && !empty($p_font_family)) { ?>
        p {
            font-family: <?php echo $p_font_family; ?>;
        }
    <?php } ?>
    </style> 
<?php } ?>