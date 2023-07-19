<?php
$template_path = "parts/footer/footer-";
$option_enable = of_get_option("enable_custom_footer");
$option_type = of_get_option("footer_type");
$option_color = of_get_option("custom_footer_color");
$option_bg_color = of_get_option("custom_footer_bg_color");
$option_bg_gradient = of_get_option("custom_footer_bg_gradient");
$option_bg = empty($option_bg_gradient) ? $option_bg_color : $option_bg_gradient;
?>

<footer id="footer" class="footer <?php if($option_enable == 1) { echo "custom-footer";} ?>">
  <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
    <?php
        get_template_part($template_path . "simple");
    ?>
  </div>  
</footer>

<?php if($option_enable == 1) { ?>
<style scoped>
  .custom-footer {
    color: <?php echo $option_color; ?>;
    background: <?php echo $option_bg; ?>;
  }
  .custom-footer a {
    color: <?php echo $option_color; ?>;
  }
  .custom-footer a:hover {
    color: <?php echo $option_color; ?>;
    opacity: .70;
  }
  .custom-footer a.disabled {
    color: <?php echo $option_color; ?>;
    opacity: .40;
  }
</style>
<?php } ?>
