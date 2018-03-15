<?php

namespace Spotzer\Twentytwelve;

/**
* Call to action shortcode
*/
class CallToAction
{
	
	public function __construct()
	{
		add_shortcode('cta', array(&$this, 'callback'));
	}

	public function callback($atts, $content = "")
	{
		return str_replace('<a', '<a class="btn btn-cta"', $content);
	}
}
