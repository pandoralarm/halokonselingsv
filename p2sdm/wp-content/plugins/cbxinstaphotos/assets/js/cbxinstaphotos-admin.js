(function ($) {
    'use strict';

    function cbxinstaphotos_copyText( text ){
        var div = document.createElement( 'div' );
        div.innerHTML = text;
        div.style.height = '';
        div.style.position = 'fixed';
        div.style.bottom = '0';
        div.style.left = '0';
        div.style.opacity = '0';
        div.style.display = 'block';
        div.style.overflow = 'hidden';
        div.style.zIndex = 9999999999;
        document.body.appendChild( div );

        var range = document.createRange();
        range.selectNode(div);
        window.getSelection().addRange(range);

        var selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);
        var successful = false;

        try {
            successful = document.execCommand('copy');
        } catch(err) {

        }

        window.getSelection().removeAllRanges();
        div.remove();
        return successful;
    }

    $(document).ready(function ($) {

        $('.cbxinstaphotos_ajax_icon').hide();

        //reset cache
        $(document).on('click', '.cbxinstaphotos_reset_cache', function (e) {
            e.preventDefault();
            var $this = $(this);

            $('.cbxinstaphotos_ajax_icon').show();
            var transientid = $this.data('transientid');

            //ajax call for sending test notification
            $.ajax({
                type: "post",
                dataType: "json",
                url: cbxinstaphotos.ajaxurl,
                data: {
                    action: "cbxinstaphotos_reset_transient",
                    transientid: transientid,
                    security: cbxinstaphotos.nonce
                },
                success: function (data, textStatus, XMLHttpRequest) {
                    $('.cbxinstaphotos_ajax_icon').hide();
                    //$('<p>' + cbxinstaphotos.success + '</p>').insertAfter($this);
                }// end of success
            });// end of ajax
        });


        //for shortcode copy to clipboard
       $('.cbxinstaphotosshortcodetrigger').on('click', function (e) {
           e.preventDefault();

           var $this = $(this);
           var $copy_target = $this.data('clipboard-target');
           var $copy_text = $($copy_target).text();

           var $copy_status = cbxinstaphotos_copyText($copy_text);

           //console.log($copy_status);
       });

        var elem  = document.querySelector('.cbxinstaphotosjs-switch');
        var elems = Array.prototype.slice.call(document.querySelectorAll('.cbxinstaphotosjs-switch'));


        elems.forEach(function (changeCheckbox) {

            changeCheckbox.onchange = function () {

                var enable = (changeCheckbox.checked) ? 1 : 0;
                var postid = $(changeCheckbox).attr('data-postid');

                //ajax call enable/disable
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: cbxinstaphotos.ajaxurl,
                    data: {
                        action: "cbxinstaphotos_enable_disable",
                        security: cbxinstaphotos.nonce,
                        enable: enable,
                        postid: postid
                    },
                    success: function (data, textStatus, XMLHttpRequest) {
                        //console.log(data);
                    }// end of success
                });// end of ajax
            };

            var switchery = new Switchery(changeCheckbox);
        });

        //authtype method change show/hide
        $('input[type="radio"][name="cbxinstaphotosmetabox[authtype]"]').on('change', function() {
            var $this = $(this);

            var $value = parseInt($this.val());

            if($value){
                $('.cbxinstaphotosmetabox_api').addClass('cbxinstaphotosmetabox_api_hide');
            }
            else{
                $('.cbxinstaphotosmetabox_api').removeClass('cbxinstaphotosmetabox_api_hide');
            }
        });

    });


})(jQuery);
