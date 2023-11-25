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
$bg_file = $field['background']['file']; // get object path or url
$bg_color = $field['background']['color'];
$type = "";
if (!empty($bg_file) || $bg_file != null) {
    $type = $bg_file['type'];
}

// Get Caption
$caption = $field['caption'];


?>

<?php if ($field['show']) { ?>
    <div id="<?php echo $service_name; ?>" class="service <?php echo $service_name; ?>" style="order:<?php echo $order; ?>;">
        <div class="<?php echo $service_name; ?>-wrapper service-wrapper" style="background-color:<?php echo $bg_color; ?>">
            <?php if (!empty($bg_file) || $bg_file != null) { ?>
                <div class="service-background service-custom-background background-<?php echo $type; ?>">
                    <?php if ($type == "video") { ?>
                        <video src="<?php echo $bg_file['url']; ?>" playsinline="" poster="" preload="none" autoplay="true" muted="" loop="" data-filter="<?php echo $bg_file['name']; ?>" crossorigin="anonymous"></video>
                    <?php } else { ?>
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
                            <h2><?php echo $caption['title']; ?></h2>
                            <p><?php echo $caption['subtitle']; ?></p>
                            <?php if ($caption['show_link']) { ?>
                                <a href="<?php echo $caption['link']['url']; ?>" class="btn btn-link">
                                    <?php echo $caption['link']['title']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>