<?php

namespace Spotzer\Twentytwelve;

class Theme {

    protected static $instance;

    function __construct()
    {
        self::$instance =& $this;
        $this->register_shortcodes();
        $this->nav_menu_filters();
        add_action('admin_init', array(&$this, 'admin_scripts'));
    }

    private function register_shortcodes()
    {
        new \Spotzer\Twentytwelve\CallToAction;
    }

    private function nav_menu_filters()
    {
        new \Spotzer\Twentytwelve\NavMenu;
    }

    public function admin_scripts()
    {
        foreach(glob(get_template_directory() . "/lib/admin/*.php") as $admin_script) {
            $name = basename($admin_script, ".php");
            $class = '\\Spotzer\\Twentytwelve\\Admin\\' . $name;

            new $class;
        }
    }

    public static function &get_instance()
    {
        if (!isset(self::$instance)) return null;

        return self::$instance;
    }
}
