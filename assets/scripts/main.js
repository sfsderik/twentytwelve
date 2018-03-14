/** import external dependencies */
import 'jquery';
import 'bootstrap-sass';

(function($) {
  var TWENTYTWELVE = {
    // All pages
    'common': {
      init: function() {
        // code
      },
    },
    'home': {
      init: function() {
        // code
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
