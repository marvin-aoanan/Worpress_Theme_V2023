<?php
$template_path = "parts/header/header-";
$option_enable = of_get_option("enable_custom_header");
$option_type = of_get_option("header_type");
//$option_custom = of_get_option("custom_header");
$option_color = of_get_option("custom_header_color");
$option_bg_color = of_get_option("custom_header_bg_color");
$option_bg_gradient = of_get_option("custom_header_bg_gradient");
$option_bg = empty($option_bg_gradient) ? $option_bg_color : $option_bg_gradient;
?>
<header id="header" class="header">
  <div class="<?php if ($option_enable == 1) {
                                    echo "custom-header ";
                                  } ?>d-flex flex-wrap justify-content-start align-items-center py-2">
    <?php if ($option_type == 0) {
      get_template_part($template_path . "title-tagline");
    ?>
    <?php get_template_part($template_path . "navbar-toggler"); ?>
      
    <?php } ?>

    <?php if ($option_type == 1) { ?>
      <div class="col-sm d-flex align-items-center"><?php get_template_part($template_path . "title-tagline"); ?></div>
      <div class="text-end"><?php get_template_part($template_path . "cta"); ?></div>
    <?php } ?>

    <?php if ($option_type == 2) {
      get_template_part($template_path . "logo");
    } ?>

    <?php if ($option_type == 3) { ?>
      <div class="col-sm d-flex align-items-center"><?php get_template_part($template_path . "logo"); ?></div>
      <div class="text-end"><?php get_template_part($template_path . "cta"); ?></div>
    <?php } ?>
  </div>
  
    
</header>

<?php if ($option_enable == 1) { ?>
  <style scoped>
    .custom-header {
      color: <?php echo $option_color; ?>;
      background: <?php echo $option_bg; ?>;
    }
  </style>
<?php } ?>