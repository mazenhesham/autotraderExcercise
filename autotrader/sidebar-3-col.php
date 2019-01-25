<aside id="secondary" class="sidebar widget-area col-md-3 col-sm-12" role="complementary">
	<?php 
	
		if( ! is_active_sidebar( 'sidebar-1' )) {
			echo 'You have to select widgets for 1st Sidebar to be shown here.';
		
		}else dynamic_sidebar( 'sidebar-1' ); 
		
	?>
</aside><!-- .sidebar .widget-area -->

<aside id="secondary" class="sidebar widget-area col-md-3 col-sm-12" role="complementary">
	<?php 
		
		if( ! is_active_sidebar( 'sidebar-2' )) {
			echo 'You have to select widgets for 2nd Sidebar to be shown here.';
		
		}else dynamic_sidebar( 'sidebar-2' ); 
	?>
</aside><!-- .sidebar .widget-area -->

