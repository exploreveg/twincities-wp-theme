<?php
/** tcvf-sponsor-listing.php
 *
 * Template Name: TCVF Sponsor Listing
 *
 * @author		Dave Rolsky
 * @package		Exploreveg
 */

function display_sponsors_for_level( $level, $sponsors ) {
    if ( ! count($sponsors) ) {
        return;
    }

    echo "<h2 class=\"tcvf-exhibitor\">$level</h2>";

    $sizes = array(
        "Platinum" => 350,
        "Gold"     => 300,
        "Silver"   => 250,
        "Bronze"   => 200,
    );

    foreach ( $sponsors as $s ) {
        display_one_sponsor( $s, $sizes[$level] );
    }
}

function display_one_sponsor( $sponsor, $size ) {
    $title = $sponsor["post_title"];
    echo "<h3 class=\"tcvf-exhibitor\">$title</h3>";
    echo exploreveg_post_thumbnail( $sponsor["ID"], [ $size, $size ] );
    echo apply_filters( 'the_content', $sponsor["post_content"] );
}

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>
          <?php the_post(); ?>
          <?php the_title( '<h2 id="page-title">', '</h2>' ); ?>
          <div class="entry-content clearfix">
            <?php the_content(); ?>

<?php
$p = pods('sponsor')->find();
$sponsors = array();
while ( $s = $p->fetch() ) {
    $level = $p->field( 'sponsorship_level', TRUE );
    if ( ! $sponsors[$level] ) {
        $sponsors[$level] = array();
    }

    array_push( $sponsors[$level], $s );
}

$levels = [ 'Platinum', 'Gold', 'Silver', 'Bronze' ];

foreach ( $levels as $l ) {
    display_sponsors_for_level( $l, $sponsors[$l] );    
}
?>

          </div>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
