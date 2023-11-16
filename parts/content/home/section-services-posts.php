<?php

$field = get_field($args['section_name']);

// Get Featured Image
$featured = $field['featured'];
$featured_image = $featured['featured_image']['sizes']; // 'thumbnail', | 'medium' | 'medium_large' | 'large' | 'post-thumbnail' | 
$select_size = $featured['select_size']['value'];

// Get Background
$bg_file = $field['background']['file']; // get object path or url
$bg_color = $field['background']['color'];
$type = $bg_file['type'];

// Get Caption
$caption = $field['caption'];

?>

<section id="<?php echo $args['section_name']; ?>" class="section <?php echo $args['section_name']; ?>" style="order=<?php echo $args['section_order']; ?>">
    <div class="<?php echo $args['section_name']; ?>-wrapper section-wrapper">
        <div class="section-background custom-bg-color background-<?php echo $type; ?>" style="background-color:<?php echo $bg_color; ?>">
            <?php if ($type == "video") { ?>
                <video src="<?php echo $bg_file['url']; ?>" playsinline="" poster="" preload="none" autoplay="true" muted="" loop="" data-filter="<?php echo $bg_file['name']; ?>" crossorigin="anonymous"></video>
            <?php } else { ?>
                <img crossorigin="anonymous" src="<?php echo $bg_file['url']; ?>" draggable="true" alt="<?php echo $bg_file['title']; ?>">
            <?php } ?>
        </div>

        <div class="section-content <?php if($bg_file['url']) { echo 'section-content-with-bg'; } ?>">
            <?php if ($featured['show']) { ?>
                <div class="featured-<?php echo $featured['featured_image']['type']; ?>">
                    <img src="<?php echo $featured_image[$select_size]; ?>" draggable="true" alt="<?php echo $featured['featured_image']['title']; ?>">
                </div>
            <?php } ?>

            <div class="caption">
                <h2><?php echo $caption['title']; ?></h2>
                <p><?php echo $caption['subtitle']; ?></p>
                <?php if($caption['show_link']) { ?>
                    <a href="<?php echo $caption['link']['url']; ?>" class="link">
                    <?php echo $caption['link']['title']; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>