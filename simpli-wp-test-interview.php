<?php
/*
Plugin Name: simpli-wp-test-interview
Description: TEST
Author: Simplifia
Version: 1.0
*/

namespace SimpliCeremonyStreamingPlugin;
use \SimpliCeremonyStreamingPlugin\Models\Singleton;
use \SimpliWP\FormPage\CreatePostForm;

include_once plugin_dir_path(__FILE__).'/Autoloader.php';
include_once plugin_dir_path(__FILE__).'/Models/Singleton.php';

class SimpliCeremonyStreamingPlugin extends Singleton
{

    public function __construct()
    {
        include_once plugin_dir_path( __FILE__ ).'/CeremonyStreaming.php';
        new CeremonyStreamingPlugin();

        include_once plugin_dir_path(__FILE__) . '/FormPage/CreatePostForm.php';
        new CreatePostForm();

        register_block_type(plugin_dir_path( __FILE__ ) . '/build/demo');
        register_block_type(__DIR__ . '/build/reverse-text');
    }

}
Autoloader::register();
\SimpliCeremonyStreamingPlugin\SimpliCeremonyStreamingPlugin::GetInstance();
