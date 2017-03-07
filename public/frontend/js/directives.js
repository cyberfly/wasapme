// 'use strict';

/* Directives */

angular.module('wasapMe.directives', []).
  directive('selectAll', function() {
    return {
      restrict: 'A',
      scope: {},
      link: function (scope,elem,attr) {
        // var textarea = elem.parent().find("textarea")[0];
        var final_link = angular.element('final_link');

        console.log(1);
        console.log(final_link);
        elem.bind('click', function() {
          final_link.select();
        });
      }
    }
  });