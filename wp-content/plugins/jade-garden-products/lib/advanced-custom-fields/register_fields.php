<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_products',
		'title' => 'Products',
		'fields' => array (
			array (
				'key' => 'field_539f839fff99f',
				'label' => 'Product Settings',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_539c9025d834f',
				'label' => 'Product Images',
				'name' => 'jg_product_images',
				'type' => 'repeater',
				'instructions' => 'Upload multiple images to create a gallery for this product. ',
				'sub_fields' => array (
					array (
						'key' => 'field_539e0da12cd8c',
						'label' => 'Gallery Image',
						'name' => 'gallery_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Image',
			),
			array (
				'key' => 'field_539c77f5b967a',
				'label' => 'Product Description',
				'name' => 'jg_product_description',
				'type' => 'wp_wysiwyg',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
			array (
				'key' => 'field_539c8e8fac6cd',
				'label' => 'Product Effects',
				'name' => 'jg_product_effects',
				'type' => 'wp_wysiwyg',
				'instructions' => 'A short description of the product\'s effects.',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
			array (
				'key' => 'field_539f750e307e7',
				'label' => 'Batches',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_539f751f307e8',
				'label' => 'Batch',
				'name' => 'jg_batch',
				'type' => 'repeater',
				'instructions' => 'Create a batch and add batch specific data like analysis date and test results',
				'sub_fields' => array (
					array (
						'key' => 'field_53a12f75bcaef',
						'label' => 'Batch ID',
						'name' => 'batch_id',
						'type' => 'taxonomy',
						'column_width' => '',
						'taxonomy' => 'batch',
						'field_type' => 'select',
						'allow_null' => 0,
						'load_save_terms' => 0,
						'return_format' => 'object',
						'multiple' => 0,
					),
					array (
						'key' => 'field_539f755f307e9',
						'label' => 'Analysis Date',
						'name' => 'analysis_date',
						'type' => 'date_picker',
						'column_width' => '',
						'date_format' => 'yymmdd',
						'display_format' => 'dd/mm/yy',
						'first_day' => 1,
					),
					array (
						'key' => 'field_539f757e307ea',
						'label' => 'Test Results',
						'name' => 'test_results',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_539f75a5307eb',
								'label' => 'Chemical',
								'name' => 'chemical',
								'type' => 'text',
								'column_width' => 45,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_539f75ae307ec',
								'label' => 'Amount',
								'name' => 'amount',
								'type' => 'number',
								'column_width' => 25,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => 100,
								'step' => '',
							),
							array (
								'key' => 'field_53a381198922b',
								'label' => 'Color',
								'name' => 'color',
								'type' => 'color_picker',
								'column_width' => 30,
								'default_value' => '',
							),
						),
						'row_min' => 0,
						'row_limit' => 10,
						'layout' => 'table',
						'button_label' => 'Add Item',
					),
					array (
						'key' => 'field_539f7657307ed',
						'label' => 'Batch Attributes',
						'name' => 'batch_attributes',
						'type' => 'flexible_content',
						'instructions' => 'Add attributes for your products based on the type of product it is. Add additional attributes using the \'additional set\' then choose a label and a value for each new attribute you want to add.',
						'column_width' => '',
						'layouts' => array (
							array (
								'label' => 'Concentrates',
								'name' => 'concentrates',
								'display' => 'row',
								'sub_fields' => array (
									array (
										'key' => 'field_539f7684307ee',
										'label' => 'Distillation Temp',
										'name' => 'distillation_temp',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bb68aed44',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Distillation Temperature',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bb94aed45',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f76a0307ef',
										'label' => 'Decarboxylated',
										'name' => 'decarboxylated',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bc9c0d2db',
												'label' => '',
												'name' => '',
												'type' => 'text',
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f76b0307f0',
										'label' => 'Feed Stock',
										'name' => 'feed_stock',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bcda0d2dc',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Feed Stock',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bcf10d2dd',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f76b6307f1',
										'label' => 'Extraction Method',
										'name' => 'extraction_method',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bd080d2de',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Extraction Method',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bd170d2df',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f76bc307f2',
										'label' => 'Solvent',
										'name' => 'solvent',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bd270d2e0',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Solvent',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bd320d2e1',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
								),
							),
							array (
								'label' => 'Flower Buds',
								'name' => 'flower_buds',
								'display' => 'row',
								'sub_fields' => array (
									array (
										'key' => 'field_539f81feee742',
										'label' => 'Growing Medium',
										'name' => 'growing_medium',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bd4d8d562',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Growing Medium',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bd5b8d563',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f81feee743',
										'label' => 'Nutrients Used',
										'name' => 'nutrients_used',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bd708d564',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Nutrients Used',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bd808d565',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f81feee744',
										'label' => 'Flower Time',
										'name' => 'flower_time',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bdc58d566',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Flower Time',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bdd28d567',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f81feee745',
										'label' => 'Lights Used',
										'name' => 'lights_used',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4bde38d568',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Lights Used',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4bdf38d569',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f81feee746',
										'label' => 'Flush',
										'name' => 'flush',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4be078d56a',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Flush',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4be188d56b',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
									array (
										'key' => 'field_539f82b2ee747',
										'label' => 'Growing Method',
										'name' => 'growing_method',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53a4be2a8d56c',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => 50,
												'default_value' => 'Growing Method',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53a4be448d56d',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => 1,
										'layout' => 'table',
										'button_label' => 'Add Row',
									),
								),
							),
							array (
								'label' => 'Additional Attributes',
								'name' => 'additional',
								'display' => 'row',
								'sub_fields' => array (
									array (
										'key' => 'field_539f8306ee74a',
										'label' => 'Attributes',
										'name' => 'attributes',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_539f830eee74b',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
											array (
												'key' => 'field_539f8319ee74c',
												'label' => 'Value',
												'name' => 'value',
												'type' => 'text',
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'html',
												'maxlength' => '',
											),
										),
										'row_min' => 1,
										'row_limit' => '',
										'layout' => 'table',
										'button_label' => 'Add Attribute',
									),
								),
							),
						),
						'button_label' => 'Add Attributes',
					),
				),
				'row_min' => 1,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Batch',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_site-options',
		'title' => 'Site Options',
		'fields' => array (
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
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
	register_field_group(array (
		'id' => 'acf_taxonomy-fields',
		'title' => 'Taxonomy Fields',
		'fields' => array (
			array (
				'key' => 'field_539e15e3826e5',
				'label' => 'Image',
				'name' => 'jg_tax_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'product-type',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'strain',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'usage',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'batch',
					'order_no' => 0,
					'group_no' => 3,
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