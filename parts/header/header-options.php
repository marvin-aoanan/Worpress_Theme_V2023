<?php
  $header_template = of_get_option('header');
?>
<header class="d-flex flex-wrap justify-content-center pt-3 px-3 border-bottom">

<?php if ( $header_template == 0  ) { ?>
  <?php get_template_part( 'parts/header/header-title-tagline' ); ?>
<?php } ?>

<?php if ($header_template == 1) { ?>
  <div class="col-md-6"><?php get_template_part( 'parts/header/header-title-tagline' ); ?></div>
  <div class="col-md-6 pb-3 text-end"><?php get_template_part( 'parts/header/header-cta' ); ?></div>
<?php } ?>

<?php if ($header_template == 2) { ?>
  <?php get_template_part( 'parts/header/header-logo' ); ?>
<?php } ?>

<?php if ($header_template == 3) { ?>
  <div class="col-md-6"><?php get_template_part( 'parts/header/header-logo' ); ?></div>
  <div class="col-md-6 pb-3 text-end"><?php get_template_part( 'parts/header/header-cta' ); ?></div>
<?php } ?>

</header>
