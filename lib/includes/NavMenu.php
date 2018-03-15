<?php

namespace Spotzer\Twentytwelve;

/**
* Call to action shortcode
*/
class NavMenu
{
	
	public function __construct()
	{
		add_filter('nav_menu_css_class', array(&$this, 'nav_menu_css_class'), 10, 4);
		add_filter('nav_menu_link_attributes', array(&$this, 'nav_menu_link_attributes'), 10, 4);
		add_filter('nav_menu_item_title', array(&$this, 'nav_menu_item_title'), 10, 4);
	}

	public function nav_menu_css_class($classes, $item, $args, $depth)
	{
		if ($args->theme_location !== 'primary') return $classes;
		if ($depth > 1) return $classes;
		if (!in_array('menu-item-has-children', $classes)) return $classes;
		
		return $classes;
	}

	public function nav_menu_link_attributes($atts, $item, $args, $depth)
	{
		if ($args->theme_location !== 'primary') return $atts;
		if ($depth > 1) return $atts;
		if (!in_array('menu-item-has-children', $item->classes)) return $atts;

		$atts['data-toggle'] = 'dropdown';
		$atts['role'] = 'button';
		$atts['aria-haspopup'] = 'true';
		// $atts['aria-expanded'] = 'false';

		return $atts;
	}

	public function nav_menu_item_title($title, $item, $args, $depth)
	{
		if ($args->theme_location !== 'primary') return $title;
		if ($depth > 1) return $title;
		if (!in_array('menu-item-has-children', $item->classes)) return $title;

		$title .= '<span class="caret"></span>';
		
		return $title;
	}
}
