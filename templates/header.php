<header class="banner" role="banner">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark at-rest" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img class="logo" src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="<?= get_bloginfo("name"); ?>"/></a>
      <div class="collapse navbar-collapse" id="primary-nav">
        <?php
        wp_nav_menu( array(
          'menu'              => 'primary_navigation',
          'theme_location'    => 'primary_navigation',
          'depth'             => 2,
          'menu_class'        => 'nav navbar-nav ml-auto',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker())
        );
        ?>
      </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
</header>
