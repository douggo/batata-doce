var app = angular.module("BatataDoce", []);

app.directive('onKeyup', function() {
    return function(scope, elm, attrs) {
        var allowedKeys = scope.$eval(attrs.keys);
        elm.bind('keydown', function(evt) {           
            angular.forEach(allowedKeys, function(key) {
                if (key === evt.which) {
                   evt.preventDefault(); 
                   window.stop(); 
                   document.execCommand("Stop"); 
                   return false; 
                }
            });
        });
    };
});