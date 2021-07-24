(function ($) {
    'use strict';


    $(document).ready(function($){

    });

    //for elementor widget render
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cbxinstaphotos_single.default', function($scope, $){

            //console.log($scope)

            /*var $element = $scope.find('.cbxgooglemap_embed');
            if(parseInt($element.length) > 0){

                var $render = parseInt($element.data('render'));
                if(!$render){
                    $element.data('render', 1);
                    cbxgooglemap_render($element, $);
                }
            }*/

        });
    });//end for elementor widget render


})(jQuery);
