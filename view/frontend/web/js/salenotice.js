;(function($){
    function getSalenoticeCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function close(options, wrapper){
        wrapper.fadeOut('slow', function(){
            $(this).remove();
        });
    }

    function create_element(tag, cl){
        return $(document.createElement(tag)).addClass(cl);
    }

    $.extend({
        notify: function(options, duration) {
            var
            // Default options object
                defaults = {
                    html: '',
                    close: '',
                    exdays:1
                },

            // Useful variables
                clone,
                container,
                wrapper = $('<li></li>').addClass('notification'),
                content;
            options = $.extend(defaults, options);
            if (getSalenoticeCookie('salenoticeclosebtn_name')!='salenoticeclosebtn_value') {
                if($('ul#notification_area').length) {
                    container = $('ul#notification_area');
                } else {
                    container = $('<ul></ul>').attr('id', 'notification_area');
                    $('body').append(container);
                }
            }

            clone = $(options.html);
            wrapper.append(
                content = create_element('div', 'notify_content').append(clone)
            );
            wrapper.css("visibility", "hidden").appendTo(container);
            if(options.close){
                var close_elem = $('<span></span>').addClass('cl').html(options.close);
                content.append(close_elem);
            }

            var anim_length = 0 - parseInt(wrapper.outerHeight());
            wrapper.css('marginBottom', anim_length);
            wrapper.animate({marginBottom: 0}, 'slow', function(){
                wrapper.hide().css('visibility', 'visible').fadeIn('slow');
                if(duration){
                    setTimeout(function(){
                        close(options, wrapper);
                    }, duration);
                }
                if(options.close){
                    close_elem.bind('click', function(){
                        close(options, wrapper);
                        var d = new Date();
                        d.setTime(d.getTime() + (options.exdays*24*60*60*1000));
                        var expires = "expires=" + d.toGMTString();
                        document.cookie = "salenoticeclosebtn_name=salenoticeclosebtn_value;" + expires + ";path=/";
                    })
                }

            });
        }
    });
})(jQuery);
