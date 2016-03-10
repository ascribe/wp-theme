
var SessionState = (function(w, d, $) {

    'use strict'

    var app, _private, _config

    _config = {
        url:             'https://www.ascribe.io/api/users/',
        appLinksDefault: $('.app-links--default'),
        appLinksActive:  $('.app-links--active')
    }

    _private = {
        getCookie: function(name) {
            var parts = document.cookie.split(';');

            for(var i = 0; i < parts.length; i++) {
                if(parts[i].indexOf(name + '=') > -1) {
                    return parts[i].split('=').pop();
                }
            }
        },
        checkSession: function() {
            $.ajax({
                method: 'GET',
                url: _config.url,
                headers: {
                    'csrf-token': _private.getCookie('csrftoken2') // be sure to NOT forget the `2` here!!!
                }
            }).done(function() {

                _config.appLinksDefault.addClass('hide');
                _config.appLinksActive.removeClass('hide');

                console.log('active and valid session');

            }).fail(function() {

                _config.appLinksDefault.addClass('hide');
                _config.appLinksActive.removeClass('hide');

                console.log('no session active');
                
            });
        }
    }

    app = {
        init: function() {
            _private.checkSession()
        }
    }

    return app

})(window, document, jQuery)
