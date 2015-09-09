<?php

if ( !defined('ABSPATH') )
    exit; // Shhh

/**
 * Admin panel.
 * 
 * @since 2.0.0
 * @package TotalPoll\Admin
 */

Class TP_Admin {

    /**
     * Initializing (register menu, enqueue required scripts).
     * 
     * @since 2.0.0
     * @return void
     */
    public function __construct()
    {
	// Register menus
	add_action('admin_menu', array( $this, 'register_menus' ));
	
	// Enqueue assets
	if ( isset($_GET['page']) && substr($_GET['page'], 0, 3) == 'tp-' ):
	    add_action('admin_enqueue_scripts', array( $this, 'enqueue_assets' ));
	endif;
	
	// Thickbox JS callback for media uploads
	if ( !empty($_GET['thickbox_callback']) && !empty($_GET['type']) && !empty($_GET['tab']) ):
	    add_filter('media_upload_form_url', array( $this, 'add_jscallback_param' ));
	    add_action('init', array( $this, 'check_head_js_callback' ));
	endif;
    }
    
    /**
     * Add Thickbox callback to form action.
     * 
     * @since 2.2.0
     * @param string $url
     * @return string
     */
    public function add_jscallback_param($url)
    {
	return add_query_arg('thickbox_callback', $_GET['thickbox_callback'], $url);
    }
    
    /**
     * Start output buffer capturing.
     * 
     * @since 2.2.0
     * @return void
     */
    public function check_head_js_callback()
    {
	ob_start(array( $this, 'check_footer_js_callback' ));
    }
    
    /**
     * Change Thickbox JS callback to a user-defined callback.
     * 
     * @since 2.2.0
     * @param string $buffer
     * @return string
     */
    public function check_footer_js_callback($buffer)
    {
	if ( !empty($buffer) ):
	    return str_replace('win.send_to_editor', 'win.' . $_GET['thickbox_callback'], $buffer);
	endif;
    }
    
    /**
     * Enqueue assets.
     * 
     * @since 2.0.0
     * @return void
     */
    public function enqueue_assets()
    {
	wp_enqueue_style('tp-admin', TP_CSS_ASSETS . 'admin-style.min.css', array(), TP_VERSION);
    }

    /**
     * Register menus.
     * 
     * @since 2.0.0
     * @return void
     */
    public function register_menus()
    {
	// Tempaltes
	add_submenu_page('edit.php?post_type=poll', __('Templates Manager', TP_TD), __('Templates', TP_TD), 'install_themes', 'tp-templates-manager', array( $this, 'templates' ));
	// Store
	add_submenu_page('edit.php?post_type=poll', __('Templates & Addons Store', TP_TD), __('Store', TP_TD), 'install_themes', 'tp-store', array( $this, 'store' ));
	// Tools
	add_submenu_page('edit.php?post_type=poll', __('TotalPoll Tools', TP_TD), __('Tools', TP_TD), 'edit_posts', 'tp-tools', array( $this, 'tools' ));
	// Pro
	$this->pro();
	// About
    	add_submenu_page('edit.php?post_type=poll', __('About TotalPoll', TP_TD), __('About', TP_TD), 'edit_posts', 'tp-about', array( $this, 'about' ));
    }
    
    /**
     * Pro link.
     * 
     * @since 2.0.0
     * @return void
     */
    public function pro()
    {
	global $submenu;
	$submenu['edit.php?post_type=poll'][] = array(__('Upgrade to Pro', TP_TD), 'edit_posts', 'http://totalpoll.com');
    }
    
    /**
     * Tools page.
     * 
     * @since 2.0.0
     * @return void
     */
    public function tools()
    {
	/**
	 * Include tools page.
	 */
	include_once( TP_PATH . 'includes/admin/tools.php' );
    }
    
    /**
     * About page.
     * 
     * @since 2.0.0
     * @return void
     */
    public function about()
    {
	/**
	 * Include about page.
	 */
	include_once( TP_PATH . 'includes/admin/about.php' );
    }

    /**
     * Templates manager.
     * 
     * @since 2.0.0
     * @return void
     */
    public function templates()
    {
	// Let's do some work
	$this->process_templates();
	/**
	 * Include templates page.
	 */
	include_once( TP_PATH . 'includes/admin/templates.php' );
    }

    /**
     * Template & Addons Store.
     * 
     * @since 2.0.0
     * @return void
     */
    public function store()
    {
	/**
	 * Include store page.
	 */
	include_once( TP_PATH . 'includes/admin/store.php' );
    }

    /**
     * Process installation and deletion of templates.
     * 
     * @since 2.0.0
     * @return void
     */
    public function process_templates()
    {
	if ( $_POST ):

	    /**
	     * Install templates
	     */
	    if ( $_FILES && wp_verify_nonce($_POST['upload-template-nonce'], 'upload-template') ):
		TotalPoll()->template->install();
	    endif;

	    /**
	     * Delete templates
	     */
	    if ( isset($_POST['template']) && is_array($templates = $_POST['template']) && wp_verify_nonce($_POST['delete-template-nonce'], 'delete-template') ):

		foreach ( $templates as $template ):
		    TotalPoll()->template->delete($template);
		endforeach;

		// Refresh the templates list
		TotalPoll()->template->fetch();

	    endif;
	endif;
    }

}
