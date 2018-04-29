    <div id="right-nav" class="standard-sidebar">
	<?php tha_sidebar_top();
	
	if ( ! dynamic_sidebar( 'main' ) ) {
		the_widget( 'WP_Widget_Archives', array(
			'count'		=>	0,
			'dropdown'	=>	0
		), array(
			'before_widget'	=>	'<aside id="archives" class="widget well widget_archives">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h3 class="widget-title">',
			'after_title'	=>	'</h3>',
		) );
		the_widget( 'WP_Widget_Meta', array(), array(
			'before_widget'	=>	'<aside id="meta" class="widget well widget_meta">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h3 class="widget-title">',
			'after_title'	=>	'</h3>',
		) );
	} // end sidebar widget area
	
	tha_sidebar_bottom(); ?>
    </div>