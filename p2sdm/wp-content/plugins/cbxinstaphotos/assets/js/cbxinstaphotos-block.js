'use strict';

(function (blocks, element, components, editor, $) {
	var el = element.createElement,
		registerBlockType = blocks.registerBlockType,
		InspectorControls = editor.InspectorControls,
		ServerSideRender = components.ServerSideRender,
		RangeControl = components.RangeControl,
		Panel = components.Panel,
		PanelBody = components.PanelBody,
		PanelRow = components.PanelRow,
		TextControl = components.TextControl,
		//NumberControl = components.NumberControl,
		TextareaControl = components.TextareaControl,
		CheckboxControl = components.CheckboxControl,
		RadioControl = components.RadioControl,
		SelectControl = components.SelectControl,
		ToggleControl = components.ToggleControl,
		//ColorPicker = components.ColorPalette,
		//ColorPicker = components.ColorPicker,
		//ColorPicker = components.ColorIndicator,
		PanelColorPicker = editor.PanelColorSettings,
		DateTimePicker = components.DateTimePicker,
		HorizontalRule = components.HorizontalRule,
		ExternalLink = components.ExternalLink;

	var MediaUpload = wp.editor.MediaUpload;

	/*var iconEl = el('svg', {
		width: 20,
		height: 20
	},
		el('path', {
			d: 'M0 100 l0 -100 100 0 100 0 0 100 0 100 -100 0 -100 0 0 -100z'
		}),
	);*/

	registerBlockType('codeboxr/cbxinstaphotos', {
		title: cbxinstaphotos_block.block_title,
		icon: 'instagram',
		category: cbxinstaphotos_block.block_category,

		/*
		 * In most other blocks, you'd see an 'attributes' property being defined here.
		 * We've defined attributes in the PHP, that information is automatically sent
		 * to the block editor, so we don't need to redefine it here.
		 */
		edit: function (props) {

			return [
				/*
				 * The ServerSideRender element uses the REST API to automatically call
				 * php_block_render() in your PHP code whenever it needs to get an updated
				 * view of the block.
				 */
				el(ServerSideRender, {
					block: 'codeboxr/cbxinstaphotos',
					attributes: props.attributes,
				}),

				el(InspectorControls, {},
					// 1st Panel – Form Settings
					el(PanelBody, {	title: cbxinstaphotos_block.general_settings.title,	initialOpen: true},
						el(SelectControl, {
							label: cbxinstaphotos_block.general_settings.id,
							options: cbxinstaphotos_block.general_settings.id_options,
							onChange: (value) => {
								props.setAttributes({
									id: parseInt(value)
								});
							},
							value: props.attributes.id
						}),
						el(SelectControl, {
							label: cbxinstaphotos_block.general_settings.layout,
							options: cbxinstaphotos_block.general_settings.layout_options,
							onChange: (value) => {
								props.setAttributes({
									layout: value
								});
							},
							value: props.attributes.layout
						}),
						el(TextControl, {
							label: cbxinstaphotos_block.general_settings.count,
							onChange: (value) => {
								props.setAttributes({
									count: parseInt(value)
								});
							},
							value: props.attributes.count
						}),
						el( ToggleControl,
							{
								label: cbxinstaphotos_block.general_settings.follow,
								onChange: ( value ) => {
									props.setAttributes( { follow: value } );
								},
								checked: props.attributes.follow
							}
						),
						el( ToggleControl,
							{
								label: cbxinstaphotos_block.general_settings.show_like,
								onChange: ( value ) => {
									props.setAttributes( { show_like: value } );
								},
								checked: props.attributes.show_like
							}
						),
						el( ToggleControl,
							{
								label: cbxinstaphotos_block.general_settings.show_com,
								onChange: ( value ) => {
									props.setAttributes( { show_com: value } );
								},
								checked: props.attributes.show_com
							}
						),
					)
				)

			]
		},
		// We're going to be rendering in PHP, so save() can just return null.
		save: function () {
			return null;
		},
	});
}(
	window.wp.blocks,
	window.wp.element,
	window.wp.components,
	window.wp.editor,
));