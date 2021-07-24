( function( api ) {

	// Extends our custom "advance-education" section.
	api.sectionConstructor['advance-education'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );


	// NumberSlider Control
		jQuery('input[type="number"].numberslider').each(function() {
			settings = [
				jQuery(this).attr('name'),
				parseFloat( jQuery(this).val() ),
				parseFloat( jQuery(this).attr('min') ),
				parseFloat( jQuery(this).attr('max') ),
				parseFloat( jQuery(this).attr('step') )
			]
			var the_input = this;

			jQuery(this).closest('.customize-control').find('div.slider').slider({
				value: settings[1],
				min: settings[2],
				max: settings[3],
				step: settings[4],
				slide: function( event, ui){
					jQuery(the_input).val( ui.value ).change();
				}
			});

			// update slider on input change
			jQuery(this).change( function(){
				jQuery(this).closest('.customize-control').find('div.slider').slider( 'option', 'value', jQuery(this).val() );
			} );

		}); // each

} )( wp.customize );