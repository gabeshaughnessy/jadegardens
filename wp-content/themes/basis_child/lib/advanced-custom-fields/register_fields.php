<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_products',
		'title' => 'Products',
		'fields' => array (
			array (
				'key' => 'field_539c77f5b967a',
				'label' => 'Product Description',
				'name' => 'jg_product_description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>