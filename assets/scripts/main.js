/** import external dependencies */
import 'jquery';
import 'bootstrap-sass';
const Chartist = require('chartist');

(function($) {
  var TWENTYTWELVE = {
    // All pages
    'common': {
      init: function() {
        $('.menu-item-has-children').mouseenter(function() {
          if ($('[data-target="#navbar"]').is(':visible') === false) {
            if ($(this).hasClass('open') !== true) {
              $(this).addClass('open');
              $(this).find('[data-toggle="dropdown"]').attr('aria-expanded', true);
            }
          }
        }).mouseleave(function() {
          if ($('[data-target="#navbar"]').is(':visible') === false) {
            if ($(this).hasClass('open') === true) {
              $(this).removeClass('open');
              $(this).find('[data-toggle="dropdown"]').attr('aria-expanded', false);
            }
          }
        });
      },
    },
    'home': {
      init: function() {
        // code
      },
    },
    'page_template_calculator': {
      init: function() {
        $('.btn-calculator').click(function(event) {
          event.preventDefault();
          $.get(rest_url + 'calculate.json', $('.mortgage-calculator').serializeArray(), function(data) {
            var options = {
              axisX: {
                type: Chartist.AutoScaleAxis,
                onlyInteger: true,
              },
              showPoint: false,
              height: '100%',
              showArea: true,
              low: 0,
              high: data.capital,
              fullWidth: true,
            };
            new Chartist.Line('.mortgage-calculator-chart', data, options);
            $('.mortgage-total').text(data.total);
            $('.mortgage-capital').text(data.capital);
            $('.mortgage-monthly').text(data.monthly);
            $('.mortgage-interest').text(data.interest);
            if ($('#mortgage-result').is(':visible') === false) {
              $('#mortgage-result').fadeIn();
            }
            $('html, body').animate({scrollTop: $('#mortgage-result').offset().top}, 'slow');
          });
        });
      },
    },
  };

  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = TWENTYTWELVE;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      UTIL.fire('common');

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      UTIL.fire('common', 'finalize');
    },
  };

  $(document).ready(UTIL.loadEvents);

})(jQuery);
