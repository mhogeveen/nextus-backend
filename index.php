<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php echo bloginfo('title'); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <main>

    <h1>
      <?php echo bloginfo('title'); ?>
    </h1>

  </main>

  <?php wp_footer(); ?>
</body>

</html>