<?php

//THEME SUPPORT
add_action( 'after_setup_theme', function(){
	//register post thumnails
	add_theme_support( 'post-thumbnails' );

	//register main nav menu
	register_nav_menu('primary',__( 'Primary Menu', 'autotrader' ));
	
	
	//check if theme is just activated
	if (isset($_GET['activated']) && is_admin()){
		//create welcome page and set as static front page, THEN creat About us page
		if(get_option('page_on_front')=='0' && get_option('show_on_front')=='posts'){
			
			$welcome_content	= 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,';
			$homepage_id		=  wp_insert_post(array(
					'post_type'		=> 'page',
					'post_title'    => 'Welcome',
					'post_content'  => $welcome_content,
					'post_status'   => 'publish',
					'post_author'   => 1
			));
			update_option('show_on_front', 'page');
			update_option('page_on_front', $homepage_id);
			
			
			//creat about us page
			$about_id	= wp_insert_post(array(
				'post_type'		=> 'page',
				'post_status'	=> 'publish',
				'post_title'	=> 'About Us',
				'post_content'	=> $welcome_content,
				'post_author'	=> 1
			));
			//update page tempalte for about us page as 3-cols
			update_post_meta($about_id, '_wp_page_template', 'page-about-us.php');
		
		}
	}

	
	

});




//THEME WIDGETS
add_action( 'widgets_init', function(){
	register_sidebar( array(
		'name'              =>  esc_html__( '1st Sidebar', 'autotrader' ),
		'id'                =>  'sidebar-1',
		'description'       =>  esc_html__( 'Add widgets here to appear in your sidebar.', 'autotrader' ),
		'before_widget'     =>  '<section id="%1$s" class="widget %2$s">',
		'after_widget'      =>  '</section>',
		'before_title'      =>  '<h4 class="widget-title">',
		'after_title'       =>  '</h4>'
	) );
	
	register_sidebar( array(
		'name'              =>  esc_html__( '2nd Sidebar', 'autotrader' ),
		'id'                =>  'sidebar-2',
		'description'       =>  esc_html__( 'Add widgets here to appear in your sidebar.', 'autotrader' ),
		'before_widget'     =>  '<section id="%1$s" class="widget %2$s">',
		'after_widget'      =>  '</section>',
		'before_title'      =>  '<h4 class="widget-title">',
		'after_title'       =>  '</h4>'
	) );
	
	
});




//ENQEUE STYLES AND SCRIPTS
add_action( 'wp_enqueue_scripts', function(){
	
	wp_register_style(
		'thesimplest-google-fonts',
		'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|PT+Serif:400,400i,700,700i'
	);
	wp_register_style(
		'bootstrap',
		get_template_directory_uri() . '/assets/css/bootstrap.min.css',
		false,
		'3.3.7'
	);
	wp_register_style(
		'font-awesome',
		get_template_directory_uri() . '/assets/css/font-awesome.min.css',
		false,
		'4.7.0'
	);
	wp_register_style(
		'autotrader-style',
		get_stylesheet_uri()
	);

	wp_enqueue_style( 'thesimplest-google-fonts' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'autotrader-style' );
	
	
	wp_register_script(
		'jquery-bootstrap',
		get_template_directory_uri() . '/assets/js/bootstrap.min.js',
		array( 'jquery' ),
		'3.3.7', true
	);

	wp_register_script(
		'autotrader-main-js',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery' ),
		'1.0', true
	);


	wp_enqueue_script( 'jquery-bootstrap' );
	wp_enqueue_script( 'thesimplest_screenReaderText-main-js' );
	
});







add_action('init', function(){
	update_post_meta(31, '_wp_page_template', 'page-about-us.php');
});


?>