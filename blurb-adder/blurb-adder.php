<?php

	/*
		Plugin Name: Blurb Adder
		Description: The plugin adds a fixed sentence or blurb to the bottom of each post
		Author: Mazen Hesham
		Text Domain: blurbA
		
	*/
	
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	
	if(!class_exists('Blurb_Adder_Init')):
	class Blurb_Adder_Init{
	
		function __construct(){
			$this->prefix	= "blurbA_";
			$this->enqeue_scripts();
			$this->admin_init();
			$this->content_filter();
		}
		
		function enqeue_scripts(){
			//ENQUEUE FRONTEND SCRIPTS AND STYLES
			add_action('wp_enqueue_scripts', function(){
				wp_enqueue_style('frontend-style', plugin_dir_url(__FILE__) . 'frontend-style.css');
			});
			
			//ENQUEUE ADMIN SCRIPTS AND STYLES
			add_action( 'admin_enqueue_scripts', function(){
				wp_enqueue_style('admin-style', plugin_dir_url(__FILE__) . 'admin-style.css');
			});
		}

		function admin_init(){
			add_action('admin_menu', function(){
				add_menu_page(
					'Blurb Adder', 
					'Blurb Adder', 
					'manage_options', 
					'blurbA', 
					array($this, 'blurbA_admin_callback'), 
					'dashicons-pressthis', 
					5
				);
				add_submenu_page(
					'blurbA', 
					'Uninstall', 
					'Uninstall', 
					'manage_options', 
					'blurbA_uninstall', 
					array($this, 'blurbA_uninstall_callback')
				);
			});
			
		}
		
		
		function blurbA_admin_callback(){
			if(isset($_POST['submit_blurb']))update_option($this->prefix.'blurb_content', $_POST[$this->prefix.'blurb_content']);
				
			$blurb_content	= get_option($this->prefix.'blurb_content');
			?>
			
			<form method = "post">
			<div class = "blurbA-admin-wrapper">
				<h1>Blurb Adder</h1>
				<h3>The blurb you submit here, will be attached to the bottom of each post.</h3>
				<table>
					<tr>
						<th>Blurb</th>
						<td>
							<textarea name = "<?php echo $this->prefix;?>blurb_content"><?php echo $blurb_content;?></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class = "button-primary" type = "submit" name = "submit_blurb" value = "Submit" />
						</td>
					</tr>
				</table>
			</div>
			</form>
			<?php
		}
		
		function blurbA_uninstall_callback(){
			if(isset($_POST['uninstall_blurbA'])){
				//plugin cleanup before deactivating
				delete_option($this->prefix.'blurb_content');
				
				
				//deleting blurb-adder
				require_once(ABSPATH . 'wp-admin/includes/plugin.php');
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				
				if(file_exists(ABSPATH.'/wp-content/plugins/blurb-adder/blurb-adder.php')){
					
					deactivate_plugins(array('blurb-adder/blurb-adder.php'));
					delete_plugins(array('blurb-adder/blurb-adder.php'));
				
				}else{
					
					deactivate_plugins(array('blurb-adder-master/blurb-adder.php'));
					delete_plugins(array('blurb-adder-master/blurb-adder.php'));
				}
				

				
			}
			
			?>
			<div class = "blurbA-admin-wrapper">
				<h1>Are you sure you want to uninstall the "Blurb Adder" plugin ?</h1>
				<h3><em>By uninstalling, you will be deleting all files of the plugin, and all settings added/modified by it</em></h3>
			
				<form method = "post">
					<input class = "button-primary" type = "submit" name = "uninstall_blurbA" value = "Yes, uninstall the plugin and delete all."/>
				</form>
			</div>
			
			<?php
		}
		
		function content_filter(){
			add_action('the_content', function($content){
				$blurb_content	= get_option($this->prefix.'blurb_content');
				
				$content		.= '<div class = "blurb-content"><p>';
				$content		.= $blurb_content;
				$content		.= '<p></div>';
				
				return $content;
			});
		}
		
		
	}
	endif;
	
	new Blurb_Adder_Init();
?>
