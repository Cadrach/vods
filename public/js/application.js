/*
 ======== Module Definition ===========================
 */
var module = angular.module('Application', [
    'ngRoute',
//    'ngSanitize',
    'ngAnimate',

    'angular-growl',

    'mgcrea.ngStrap',

    'ajoslin.promise-tracker',

    'VodsControllers'
])
.config(function($routeProvider, $httpProvider, growlProvider){
    $routeProvider
        .when('/', {
            templateUrl: 'html/home.html',
            controller: 'ctrlHome',
            resolve: {
//                user: function($http){
//                    return $http.get('site/tool/user').then(function(result){return result.data});
//                },
//                constants: function($http){
//                    return $http.get('site/hexbin/constants').then(function(result){return result.data});
//                }
            }
        })
        .otherwise({
            redirectTo: '/'
        });
//
//        //Register the interceptor via an anonymous factory
//        //Using "unshift" to get at the head of the interceptors
//        $httpProvider.interceptors.unshift(function($q, growl, $rootScope) {
//            return {
//                'request': function(config){
//                    config.tracker = $rootScope.loadingTracker;
//                    return config;
//                },
//                'responseError': function(rejection) {
//                    // do something on error
//                    if(rejection.data.error){
//                        growl.error(rejection.data.error.message, {ttl: -1});
////                        alert('ERROR');
//                    }
//                    return $q.reject(rejection);
//                }
//            };
//        });
//
//        //Setup Growl defaults
//        growlProvider.globalTimeToLive(5000);

}).run(function($rootScope, $location, $http, $templateCache, promiseTracker){
        $rootScope.test = "HELLO WORLD";
//    $rootScope.loadingTracker = promiseTracker();
});