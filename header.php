<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0 - 05.02.2012
 */

?>
<?php
$logo = get_option('exploreveg-logo');
if (!$logo) {
    $logo = 'caa';
}

$logo_alts = array(
    'bridges' => 'Bridges of Respect',
    'caa'     => 'Compassionate Action for Animals',
    'tcvf'    => 'Twin Cities Veg Fest',
    );

$logo_width = 3;

$favicon = $logo . '-favicon.ico';
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <?php tha_head_top(); ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()) ?>/img/<?php echo $favicon ?>" />
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title> Yash <?php wp_title( '&laquo;', true, 'right' ); ?></title>
        
        <?php tha_head_bottom(); ?>
        <?php wp_head(); ?>

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56be203d5f1e147b"></script>

    </head>

    <body <?php body_class(); ?>>
<?php
$fb_app_id = get_option('exploreveg-fb-app-id');
if ($fb_app_id) :
?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo $fb_app_id ?>',
      status     : true,
      xfbml      : true
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<?php endif ?>

    <div class="container main">
      <header id="site-header">
        <?php tha_header_top(); ?>
        <div class="row">
          <div id="follow-buttons" class="col-sm-12">
<?php
/* All icons are from http://www.iconsdb.com/ */

$facebook = get_option('exploreveg-facebook');
$twitter = get_option('exploreveg-twitter');
$tumblr = get_option('exploreveg-tumblr');
$pinterest = get_option('exploreveg-pinterest');
$instagram = get_option('exploreveg-instagram');
$rss = get_option('exploreveg-rss');
?>

<?php if ($facebook) : ?>
            <a href="<?php echo $facebook ?>" title="Follow us on Facebook"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/facebook.png"
                     height="24" width="24" alt="Facebook icon"></a>
<?php endif; if($twitter) : ?>
            <a href="<?php echo $twitter ?>" title="Follow us on Twitter"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/twitter.png"
                     height="24" width="24" alt="Twitter icon"></a>
<?php endif; if($tumblr) : ?>
            <a href="<?php echo $tumblr ?>" title="Follow us on Tumblr"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/tumblr.png"
                     height="24" width="24" alt="Tumblr icon"></a>
<?php endif; if($pinterest) : ?>
            <a href="<?php echo $pinterest ?>" title="Follow us on Pinterest"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/pinterest.png"
                     height="24" width="24" alt="Pinterest icon"></a>
<?php endif; if($instagram) : ?>
            <a href="<?php echo $instagram ?>" title="Follow us on Instagram"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/instagram.png"
                     height="24" width="24" alt="Instagram icon"></a>
<?php endif; if($rss) : ?>
            <a href="/feed/" title="Subscribe to our news feed"
               rel="alternate" type="application/rss+xml"
               ><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/rss.png"
                     height="24" width="24" alt="RSS icon"></a>
<?php endif; ?>
          </div>
        </div>
        <div class="row">


<img <?php
                             echo 'src="';
                             echo esc_url(get_stylesheet_directory_uri());

                             echo  '/img/' . $logo . '-logo.png';
                             echo '" ';

                             echo "id='$logo-logo' alt='$logo_alts[$logo] logo'>";
                             ?>
        </div>
        <div class="row">
          <nav class="navbar navbar-inverse navbar-default" id="global-nav" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#global-navbar-collapse"
                        aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="global-navbar-collapse">
                <?php wp_nav_menu( array(
                    'theme_location'    =>  'primary',
                    'menu_class'        =>  'nav navbar-nav',
                    'depth'             =>  3,
                    'fallback_cb'       =>  false,
                    'walker'            =>  new The_Bootstrap_Nav_Walker,
                ) ); ?>

                <div class="col-sm-3 col-md-3 pull-right">
                  <form action="<?php echo esc_url(home_url()); ?>/"
                        method="get" id="searchform" class="navbar-form">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s"
                             value="<?php echo get_search_query() ?>" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default" id="search-button"
                            ><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </div>
      <?php tha_header_bottom(); ?>
      </header>
      <?php tha_header_after();
                

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
