<?php

namespace Spotzer\Twentytwelve;

class Theme {

    protected static $instance;

    function __construct()
    {
        self::$instance =& $this;
    }

    public static function &get_instance()
    {
        if (!isset(self::$instance)) return null;

        return self::$instance;
    }
}
