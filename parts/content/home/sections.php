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

// Get Background Color or Image

// print_r($field['background']['color']);
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

// Get Link
$link = $field['link'];

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
        <div class="<?php echo $section_name; ?>-wrapper section-wrapper" style="<?php echo 'background: ' . $style_bg_color . ' ' . $style_bg_image; ?>">
            <?php if ($bg_file && preg_match('/(video|mp4|gif)/', $type)) { ?>
                <div class="section-background section-custom-background background-<?php echo $type; ?>">
                    <?php if ($type == "video" || $type == "mp4") { ?>
                        <video src="<?php echo $bg_file['url']; ?>" playsinline="" poster="" preload="none" autoplay="true" muted="" loop="" data-filter="<?php echo $bg_file['name']; ?>" crossorigin="anonymous"></video>
                    <?php } else if($type == "gif") { ?>
                        <img src="<?php echo $bg_file['url']; ?>" alt="<?php echo $bg_file['title']; ?>">
                    <?php } ?>   
                </div>
            <?php } ?>

            <?php if (($featured['show_featured'] && $featured['featured_image']) || ($caption['title'] || $caption['subtitle'])) // Check if fields have content
            { ?>
                <div class="section-content <?php if(!empty($bg_file) && preg_match('/(video|mp4|gif)/', $type)) { echo 'section-content-with-bg'; } ?>">
                    <?php if ($featured['show_featured'] && $featured['featured_image']) { ?>
                        <div class="featured-<?php echo $featured['featured_image']['type']; ?>">
                            <img src="<?php echo $featured_image; ?>" alt="<?php echo $featured['featured_image']['title']; ?>">
                        </div>
                    <?php } ?>

                    <?php if ($caption['title'] || $caption['subtitle']) // Check if fields have content 
                    { ?>
                        <div class="caption">
                            <h2><?php echo $caption['title']; ?></h2>
                            <p><?php echo $caption['subtitle']; ?></p>
                            <?php if ($link['show_link']) { ?>
                                <a href="<?php echo $link['link_url']['url']; ?>" class="btn btn-<?php echo $link['link_class']; ?> float-<?php echo $link['link_alignment']; ?>">
                                    <?php echo $link['link_url']['title']; ?>
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