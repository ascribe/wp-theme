
//=include vendor/toc.js
//=include vendor/affix.js

var Faq = (function(w, d, $) {

    'use strict'

    var app, _private, _config

    _config = {
        faqQuestion:  $('.faq__question'),
        faqAnswer:    $('.faq__answer'),
        faqTitle:     $('.faq__title'),
        faqTocColumn: $('.grid__col--toc'),
        faqToc:       $('#toc'),
        minWidth:     768 // $screen-sm
    }

    _private = {
        faqToggle: function() {
            _config.faqQuestion.click(function() {
                $(this).toggleClass('open');
                $(this).next(_config.faqAnswer).toggleClass('open');
            });
        },
        faqTocInit: function() {
            _config.faqToc.toc({
                'selectors': _config.faqTitle, // elements to use as headings
                'container': 'body', // element to find all selectors in
                'highlightOffset': 100, // offset to trigger the next headline
            });
        },
        faqTocSticky: function() {
            var win = $(window);

            win.on('load resize',function(e) {
                if (_private.isWide()) {
                    _config.faqToc.affix({
                        offset: {
                            top: ( _config.faqTocColumn.offset().top + 20 ),
                            bottom: ( $('.section-faq:last-child').outerHeight(true) + 40 )
                        }
                    });
                }
            });
        },
        isWide: function() {
            return $(window).width() >= _config.minWidth;
        }
    }

    app = {
        init: function() {
            _private.faqToggle();
            _private.faqTocInit();
            _private.faqTocSticky();
        }
    }

    return app

})(window, document, jQuery)
