<?php

if ( ! function_exists( 'dd' ) ) :
    function dd($debug) {
        echo '<pre>';
        print_r($debug);
        echo '</pre>';
        exit();
    }
endif;

if ( ! function_exists('asset_path') ) :
    function asset_path($asset) {
        if ( file_exists( $manifest = get_template_directory() . '/dist/assets.json' ) ) {
            $manifest = json_decode(file_get_contents($manifest), true);
            return get_template_directory_uri() . '/dist/' . $manifest[$asset];
        }

        return get_template_directory_uri() . '/dist/' . $asset;
    }
endif;
