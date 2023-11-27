<?php
$service_name = $args['service_name'];
$order = $args['service_order'];

$field = get_field($service_name);
//print_r($field['show']);

// Get Featured Image
$featured = $field['featured'];
$select_size = $featured['select_size']['value'];
if ($featured['featured_image']) {
    $featured_image = $featured['featured_image']['sizes']; // 'thumbnail', | 'medium' | 'medium_large' | 'large' | 'post-thumbnail' 
}

// Get Background
$bg_color = $field['background']['color'];
$style_bg_color = !empty($bg_color) ? $bg_color : '';

$bg_file = $field['background']['file']; // get object path or url
if (!empty($bg_file) || $bg_file != null) {
    $type = $bg_file['subtype'];
    if (preg_match('/(webp|png|jpeg)/', $type)) {
        $style_bg_image = "url(" . "'" . $bg_file['url'] . "'" . ") top center; background-size: cover;";
    } else {
        $style_bg_image = '';
    }
} else {
    $style_bg_image = '';
}


// Get Caption
$caption = $field['caption'];

?>

<?php if ($field['show']) { ?>
    <div id="<?php echo $service_name; ?>" class="service <?php echo $service_name; ?>" style="order:<?php echo $order; ?>;">
        <div class="<?php echo $service_name; ?>-wrapper service-wrapper" style="<?php echo 'background: ' . $style_bg_color . ' ' . $style_bg_image; ?>">
            <?php if ($bg_file && preg_match('/(video|mp4|gif)/', $type)) { ?>
                <div class="service-background service-custom-background background-<?php echo $type; ?>">
                    <?php if ($type == "video" || $type == "mp4") { ?>
                        <video src="<?php echo $bg_file['url']; ?>" playsinline="" poster="" preload="none" autoplay="true" muted="" loop="" data-filter="<?php echo $bg_file['name']; ?>" crossorigin="anonymous"></video>
                    <?php } else if($type == "gif") { ?>
                        <img crossorigin="anonymous" src="<?php echo $bg_file['url']; ?>" draggable="true" alt="<?php echo $bg_file['title']; ?>">
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (($featured['show_featured'] && $featured['featured_image']) || ($caption['title'] || $caption['subtitle'])) // Check if fields have content
            { ?>
                <div class="service-content">
                    <?php if ($featured['show_featured'] && $featured['featured_image']) { ?>
                        <div class="featured-<?php echo $featured['featured_image']['type']; ?>">
                            <img src="<?php echo $featured_image[$select_size]; ?>" draggable="true" alt="<?php echo $featured['featured_image']['title']; ?>">
                        </div>
                    <?php } ?>

                    <?php if ($caption['title'] || $caption['subtitle']) // Check if fields have content 
                    { ?>
                        <div class="caption">
                            <h4><?php echo $caption['title']; ?></h4>
                            <p><?php echo $caption['subtitle']; ?></p>
                            <?php if ($caption['show_link']) { ?>
                                <a href="<?php echo $caption['link']['url']; ?>" class="btn btn-sm btn-outline-warning float-end">
                                    <?php echo $caption['link']['title']; ?> <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>