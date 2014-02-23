<?php
// Add Shortcode
function youtube_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => 'dQw4w9WgXcQ',
		), $atts )
	);

	// Code
	return '<iframe width="640" height="360" src="//www.youtube.com/embed/'.$id.'?theme=light&color=white&showinfo=0&controls=2" frameborder="0" allowfullscreen></iframe>';
}
add_shortcode( 'youtube', 'youtube_shortcode' );

// Add Quicktags
function youtube() {

	if ( wp_script_is( 'quicktags' ) ) {
	?>
	<script type="text/javascript">
	QTags.addButton( 'youtube', 'YouTube', '<iframe width="640" height="360" src="//www.youtube.com/embed/dQw4w9WgXcQ?theme=light&color=white&showinfo=0&controls=2" frameborder="0" allowfullscreen>', '</iframe>', '', '', 11 );
	</script>
	<?php
	}

}

// Hook into the 'admin_print_footer_scripts' action
add_action( 'admin_print_footer_scripts', 'youtube' );

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 600;

// Register Theme Features
function ahoy_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );	

	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', );
	add_theme_support( 'html5', $markup );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'ahoy_theme_features' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'ahoy_meta',
		'title' => 'Meta',
		'fields' => array (
			array (
				'key' => 'ahoy_sub_title',
				'label' => 'Titel',
				'name' => 'sub-title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Extratitel (Om något annat än sidans titel ska stå över presentationsbilden)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 40,
			),
			array (
				'key' => 'ahoy_page_description',
				'label' => 'Beskrivning',
				'name' => 'description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'Beskrivning för sidan. Syns över presentationsbilden.',
				'maxlength' => 140,
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'ahoy_quote',
		'title' => 'Quote',
		'fields' => array (
			array (
				'key' => 'ahoy_post_quote',
				'label' => 'Citat',
				'name' => 'quote',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'Text som syns över presentationsbilden',
				'maxlength' => 140,
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}

// Add function for counting words

function wordCount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}

// Add custom title function
add_filter( 'wp_title', 'rw_title', 10, 3 );
function rw_title( $title, $sep, $seplocation )
{
    global $page, $paged;
    // Don't affect in feeds.
    if ( is_feed() )
        return $title;
    // Add the blog name
    if ( 'right' == $seplocation )
        $title .= get_bloginfo( 'name' );
    else
        $title = get_bloginfo( 'name' ) . $title;
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_front_page() ) )
        $title .= " {$sep} {$site_description}";
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        $title = sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) ) . " {$sep} " . $title;
    return $title;
}

?>