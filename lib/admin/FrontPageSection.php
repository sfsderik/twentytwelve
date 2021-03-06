<?php

namespace Spotzer\Twentytwelve\Admin;

/**
* 
*/
class FrontPageSection
{
	
	public function __construct()
	{
		add_action('load-post.php', array(&$this, 'init_metabox'));
		add_action('load-post-new.php', array(&$this, 'init_metabox'));
	}

	public function admin_enqueue_scripts()
	{
		wp_enqueue_script('spotzer/admin-js', asset_path('scripts/admin.js'), array('jquery', 'thickbox', 'media-upload'), '20140711', true);
	}

	public function init_metabox()
	{
		add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
		add_action('add_meta_boxes', array(&$this, 'add_metabox'));
		add_action('save_post', array(&$this, 'save_metabox'), 10, 2 );
	}

	public function add_metabox()
	{
		global $post;

		if (empty($post)) return;
		if (get_post_meta($post->ID, '_wp_page_template', true) !== 'page-templates/front-page.php') return;

		add_meta_box(
			'front-page-section',
			__('Front Page Section', 'twentytwelve'),
			array(&$this, 'render_metabox'),
			'page',
			'normal',
			'default'
		);
	}

	public function render_metabox($post)
	{
		wp_nonce_field('front_page_section', 'front_page_section_nonce');
		$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

		$frontpage = get_post_meta($post->ID, '_front_page_section', true) ?: array(
			'content' => '',
			'infoboxes' => array(
				array('content' => '', 'thumbnail' => '-1'),
				array('content' => '', 'thumbnail' => '-1'),
				array('content' => '', 'thumbnail' => '-1'),
			),
			'columns' => 0,
		);

		wp_editor(
			$frontpage['content'],
			'_front_page_section_content',
			array(
				'textarea_name' => '_front_page_section[content]',
				'textarea_rows' => 4,
				'media_buttons' => false,
			)
		);

		echo '<h4><span>Info Boxes</span></h4>';
		echo '<table class="widefat fixed striped">';
		echo '<thead>';
		echo '<tr>';
		echo '<th scope="col" class="column-format">Thumbnail</th>';
		echo '<th scope="col">Content</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		for($i=0;$i<=2;$i++) {
			echo '<tr>';
			echo '<td class="column-format column-infobox-thumbnail" style="vertical-align: middle;">';
			$image = wp_get_attachment_image_src($frontpage['infoboxes'][$i]['thumbnail'], 'full');
			$has_image = is_array($image);

			echo '<p class="hide-if-no-js">';
			echo '<a href="'.$upload_link.'" style="display: inline-block;" id="set-infobox-thumbnail-'.$i.'" class="upload-infobox-img '.($has_image ? 'hidden' : '').'">';
			if ($has_image) {
				echo '<img src="'.$image[0].'" alt="" style="max-width:100%;" />';
			} else {
				_e('Set icon', 'twentytwelve');
			}
			echo '</a>';
			echo '<a class="delete-infobox-img '.($has_image ? '' : 'hidden').'" href="#">' . __('Remove icon', 'twentytwelve') .'</a>';
			echo '</p>';
			echo '<input type="hidden" class="infobox-img-'.$i.'" id="_front_page_section_infobox_thumbnail_' . $i .'" name="_front_page_section[infoboxes]['.$i.'][thumbnail]" value="'.esc_attr($frontpage['infoboxes'][$i]['thumbnail']).'">';
			echo '</td>';
			echo '<td class="column-infobox-content">';
			wp_editor(
				$frontpage['infoboxes'][$i]['content'],
				'_front_page_section_infobox_' . $i,
				array(
					'textarea_name' => '_front_page_section[infoboxes]['.$i.'][content]',
					'textarea_rows' => 4,
					'media_buttons' => false,
				)
			);
			echo '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';

	}

	public function save_metabox($post_id, $post) {
		$nonce_name   = isset( $_POST['front_page_section_nonce'] ) ? $_POST['front_page_section_nonce'] : '';
		$nonce_action = 'front_page_section';

        if (!isset($nonce_name)) return;
        if (!wp_verify_nonce($nonce_name, $nonce_action)) return;
        if (!current_user_can('edit_post', $post_id)) return;
        if (wp_is_post_autosave($post_id)) return;
        if (wp_is_post_revision($post_id)) return;

        $frontpage = $_POST['_front_page_section'];
        $frontpage['columns'] = 0;
        foreach($frontpage['infoboxes'] as $key => $box) {
        	if ($box['thumbnail'] < 0) {
        		$frontpage['infoboxes'][$key]['thumbnail'] = '';
        	}

        	if ($box['thumbnail'] >= 0 || !empty($box['content'])) {
        		$frontpage['columns']++;
        	}
        }
        update_post_meta($post_id, '_front_page_section', $frontpage);
	}
}
