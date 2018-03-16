<?php

namespace Spotzer\Twentytwelve;

use WP_REST_Request;
use WP_REST_Response;
use WP_Error;

/**
* Mortgage Calculator Module
*/
class MortgageCalculator
{
	
	public function __construct()
	{
		add_shortcode('mortgage_calculator', array(&$this, 'shortcode_callback'));
		add_action('rest_api_init', array(&$this, 'register_routes'));
	}

	public function register_routes()
	{
		register_rest_route('spotzer/v1', '/calculate.json', array(
			'method'   => 'GET',
			'callback' => array(&$this, 'calculator_callback'),
		));
	}

	public function calculator_callback(WP_REST_Request $request)
	{
		$PV = (int) $request->get_param('amount');
		$n  = (int) $request->get_param('period');
		$r  = (int) $request->get_param('rate');

		if (empty($PV)) {
			return new WP_Error('no_amount', 'Invalid amount', array('status' => 404));
		}
		if (empty($n)) {
			return new WP_Error('no_period', 'Invalid period', array('status' => 404));
		}
		if (empty($r)) {
			return new WP_Error('no_rate', 'Invalid rate', array('status' => 404));
		}

		$r = ($r/1000);
		$n = ($n*12);

		$P = round($PV * ($r / (1-(1+$r)**-$n)), 2);
		$total = round(($P * $n), 2);
		$capital = round($PV, 2);
		$period = ($n/12);
		$axisY = range(0, $capital, ($capital/$period));
		for($i=0;$i<=$period;$i++) {
			$data[$i] = ['x' => $i, 'y' => round($axisY[$i], 2)];
		}
		$data = array(
			'total'    => number_format($total),
			'capital'  => number_format($capital),
			'interest' => number_format(($total - $capital)),
			'monthly'  => number_format($P),
			'labels'  => range(0, ($n/12)),
			'series'   => array(
				$data,
			),
		);
		return new WP_REST_Response($data);
	}

	public function shortcode_callback($atts)
	{
		$defaults = array(
			'title'        => 'What will my monthly mortgage payments be?',
			'result_title' => 'Your results',
		);
		$args = wp_parse_args($atts, $defaults);

		ob_start();
		include get_template_directory() . '/calculator.php';
		$output = ob_get_clean();
		
		return $output;
	}
}
