<?php

/**
 * @package Azar Plugin
 * @version 1.0.0
 */
/*
Plugin Name: Azar Plugin
Plugin URI: http://johnazar.com/plugin
Description: This is just a plugin, for testing.
Author: John Azar
Version: 1.0.0
Author URI: http://johnazar.com/
License: MIT
Text Domain: azar-plugin
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die('unauthorized access');

/* if(! function_exists('add_action')){
    die();
} */

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;


// check if we have class then init object and run funcs
if(!class_exists('AzarPlugin')){
    
class AzarPlugin
{
    public $plugin;

    function __construct(){
        $this->plugin= plugin_basename(__FILE__);
        
    }
    //THIS FUNC IS CALLED AT INIT
    function register(){
        //load to admin area css & js
        add_action('admin_enqueue_scripts',array($this,'enqueue'));
        //load front end wp css & js
        add_action('wp_enqueue_scripts',array($this,'enqueue'));

        // Plugin page PP 01
        // add action to admin menu on loading will run a function
        add_action('admin_menu', array($this,'add_admin_pages'));

        // PP 02
        //add a link into plugin to our plugin's page
        //add_filter('plugin_action_link_NAME-OF-PLUGIN')
        add_filter("plugin_action_links_$this->plugin" ,array($this,'azar_settings_link'));
        //run a function to generate custom post type CPT 01
        $this->create_post_type();
        
    }
    function activate(){
        Activate::activate();
    }
    function deactivate(){
        Deactivate::deactivate();
    }

    //CPT 03 
    function custom_post_type(){
        //here we register a CPT
        register_post_type('book', ['public'=>true,'label'=>'Books','menu_icon'=>'dashicons-book']);
    }

    //CPT 02
    protected function create_post_type(){
        //start at init a function
        add_action('init',array($this,'custom_post_type'));
    }

    //PP 03
    function add_admin_pages(){
        //run a built-in function to add item to menu
        add_menu_page('Azar Plugin','Azar','manage_options','azar_plugin',array($this,'azar_index'),'dashicons-tide',110);

    }
    //PP 03
    function azar_settings_link($links){
        $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=azar_plugin') ) .'">Settings</a>';
        $links[] = '<a href="http://johnazar.com" target="_blank">Plugins by John Azar</a>';
        return $links;
        
    }
    //PP 04
    function azar_index(){
        require_once plugin_dir_path(__FILE__).'templates/admin.php';
    }



    function enqueue(){
        // enqueue CSS define where the scripts
        wp_enqueue_style('mypluginstyle',plugins_url('assets/mystyle.css',__FILE__));
        // enqueue CSS define where the scripts
        wp_enqueue_script('mypluginscript',plugins_url('assets/myscript.js',__FILE__));
    }

    
}

// init obj of class
$azarPlugin = new AzarPlugin();
// run main func
$azarPlugin->register();

// activation
//plugin activation
register_activation_hook(__FILE__,array('Inc\Activate','activate'));

// deactivation
//plugin deactivation
register_deactivation_hook(__FILE__,array($azarPlugin,'deactivate'));

//plugin uninstall (we need to make unistall a static method)
//register_uninstall_hook(__FILE__, array($azarPlugin,'uninstall'));

}
