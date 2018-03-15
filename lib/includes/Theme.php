<?php

namespace Spotzer\Twentytwelve;

class Theme {

    protected static $instance;

    function __construct()
    {
        self::$instance =& $this;
        $this->register_shortcodes();
        $this->nav_menu_filters();
    }

    private function register_shortcodes()
    {
        new \Spotzer\Twentytwelve\CallToAction;
    }

    private function nav_menu_filters()
    {
        new \Spotzer\Twentytwelve\NavMenu;
    }

    public static function &get_instance()
    {
        if (!isset(self::$instance)) return null;

        return self::$instance;
    }
}
