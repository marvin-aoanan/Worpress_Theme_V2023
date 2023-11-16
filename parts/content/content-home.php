<?php

/**
 * Template part for displaying home page content in page.php
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme
 * @subpackage Cybro Services Theme v2023
 * @since 2023
 */

?>

<div id="content-home" class="content home">
    <?php
    $field_group = acf_get_fields('group_64ccfda0de43e'); // get group slug
    for ($x = 0; $x < count($field_group); $x++) {
        $section_name = $field_group[$x]['name'];
        $order = $field_group[$x]['menu_order'];

        get_template_part(
            'parts/content/home/' . 'sections',
            '',
            $args = [
                'section_name' => $section_name,
                'section_order' => $order
            ]
        );
    }
    ?>
</div>