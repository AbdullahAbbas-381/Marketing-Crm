<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Khurram
Description: Simple Perfex module example that stores customer selections.
Version: 1.0
Author: ChatGPT
*/

hooks()->add_action('admin_init', 'khurram_module_init_menu_items');
register_activation_hook('khurram', 'khurram_module_activation_hook');

/**
 * Register sidebar menu item
 */
function khurram_module_init_menu_items()
{
    $CI = &get_instance();

    if (has_permission('customers', '', 'view')) {
        $CI->app_menu->add_sidebar_menu_item('khurram', [
            'name'     => _l('khurram'),
            'href'     => admin_url('khurram'),
            'position' => 50,
            'icon'     => 'fa fa-star',
        ]);
    }
}

/**
 * Activation hook
 */
function khurram_module_activation_hook()
{
    require_once(__DIR__ . '/install.php');
    khurram_module_install();
}
