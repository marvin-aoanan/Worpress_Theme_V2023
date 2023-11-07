<?php
$section_name = $args['section_name'];
$order = $args['section_order'];

$field = get_field($section_name);

// Get Featured Image
$featured = $field['featured'];
$select_size = $featured['select_size']['value'] ?? 'thumbnail';
if ($featured['featured_image']) {
    $url = $featured['featured_image']['url'];
    $type = $featured['featured_image']['mime_type'];
    if ($type != 'image/gif') {
        $featured_image = $featured['featured_image']['sizes'][$select_size]; // 'thumbnail', | 'medium' | 'medium_large' | 'large' | 'post-thumbnail' 
    } else {
        $featured_image = $url;
    }
}
//print_r($featured['featured_image']['sizes'][$select_size]);

// Get Background
$bg_file = $field['background']['file']; // get object path or url
$bg_color = $field['background']['color'];
$type = "";
if (!empty($bg_file) || $bg_file != null) {
    $type = $bg_file['type'];
}

// Get Caption
$caption = $field['caption'];

// Get Services Contents
//print_r($field);

if ($field['show'] && $section_name == 'section-services') {
    $services = $field['services'];
    $show_services = $services['show_services'];
    $select_services = $services['select_services'];
    // if ($select_services == 'acf_services_content') {
    //     echo "Showing from ACF";
    // }
}

?>

<?php if ($field['show']) { ?>
    <section id="<?php echo $section_name; ?>" class="section <?php echo $section_name; ?>" style="order:<?php echo $order; ?>;">
        <div class="<?php echo $section_name; ?>-wrapper section-wrapper" style="background-color:<?php echo $bg_color; ?>">
            <?php if ($bg_file) { ?>
                <div class="section-background section-custom-background background-<?php echo $type; ?>">
                    <?php if ($type == "video") { ?>
                        <video src="<?php echo $bg_file['url']; ?>" playsinline="" poster="" preload="none" autoplay="true" muted="" loop="" data-filter="<?php echo $bg_file['name']; ?>" crossorigin="anonymous"></video>
                    <?php } else { ?>
                        <img crossorigin="anonymous" src="<?php echo $bg_file['url']; ?>" draggable="true" alt="<?php echo $bg_file['title']; ?>">
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (($featured['show_featured'] && $featured['featured_image']) || ($caption['title'] || $caption['subtitle'])) // Check if fields have content
            { ?>
                <div class="section-content">
                    <?php if ($featured['show_featured'] && $featured['featured_image']) { ?>
                        <div class="featured-<?php echo $featured['featured_image']['type']; ?>">
                            <img src="<?php echo $featured_image; ?>" draggable="true" alt="<?php echo $featured['featured_image']['title']; ?>">
                        </div>
                    <?php } ?>

                    <?php if ($caption['title'] || $caption['subtitle']) // Check if fields have content 
                    { ?>
                        <div class="caption">
                            <h2><?php echo $caption['title']; ?></h2>
                            <p><?php echo $caption['subtitle']; ?></p>
                            <?php if ($caption['show_link']) { ?>
                                <a href="<?php echo $caption['link']['url']; ?>" class="link">
                                    <?php echo $caption['link']['title']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($section_name == 'section-services' && $show_services) { ?>
                        <div class="services">
                            <?php
                            if ($select_services == 'acf_services_content') {
                                $field_group = acf_get_fields('group_64d24bc7d9f7e'); // get group slug
                                for ($x = 0; $x < count($field_group); $x++) {
                                    $service_name = $field_group[$x]['name'];
                                    $order = $field_group[$x]['menu_order'];
                                    get_template_part(
                                        'parts/content/home/' . 'services',
                                        '',
                                        $args = [
                                            'service_name' => $service_name,
                                            'service_order' => $order
                                        ]
                                    );
                                }
                            } else {
                                echo "Not ACF";
                            }
                            ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>