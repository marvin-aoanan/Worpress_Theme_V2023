<?php
$template_path = "parts/navbar/navbar-";
$option_enable = of_get_option("enable_custom_navbar");
$option_type = of_get_option("navbar_type");
$option_color = of_get_option("custom_navbar_color");
$option_bg_color = of_get_option("custom_navbar_bg_color");
$option_bg_gradient = of_get_option("custom_navbar_bg_gradient");
$option_bg = empty($option_bg_gradient) ? $option_bg_color : $option_bg_gradient;
?>

<nav id="navbar" class="navbar navbar-<?php echo $option_type == "expand-center" ? "expand-md" : $option_type ; ?> <?php if($option_enable == 1) { echo "custom-navbar";} ?>">
  <div class="container-fluid">
    <?php
    switch ($option_type) {
      case "expand":
        get_template_part($template_path . $option_type);
        break;
      case "expand-md":
        get_template_part($template_path . $option_type);
        break;
      case "expand-no":
        get_template_part($template_path . $option_type);
        break;
      default: // expand-center is the default
        get_template_part($template_path . "center");
    }
    ?>
  </div>
</nav>


<?php if($option_enable == 1) { ?>
<style scoped>
  .custom-navbar {
    color: <?php echo $option_color; ?>;
    background: <?php echo $option_bg; ?>;
  }
  .custom-navbar a {
    color: <?php echo $option_color; ?>;
  }
  .custom-navbar a:hover {
    color: <?php echo $option_color; ?>;
    opacity: .70;
  }
  .custom-navbar a.disabled {
    color: <?php echo $option_color; ?>;
    opacity: .40;
  }
</style>
<?php } ?>
