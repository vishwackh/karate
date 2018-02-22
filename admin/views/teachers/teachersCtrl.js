(function () {
    'use strict';

    angular
        .module('emsAdmin')
        .controller('teachersCtrl', teachersCtrl);

    teachersCtrl.$inject = ['$scope', '$http', '$rootScope', 'localStorageService', 'toaster', '$state'];

    /* @ngInject */
    function teachersCtrl($scope, $http, $rootScope, localStorageService, toaster, $state) {
        
        $scope.ldata = {};

        $scope.addTeacher = function (location, userForm) {
            $scope.submitted = true;
            if (userForm.$valid) {

                $http.post($rootScope.ApiUrl + 'addTeachar',location).then(function (data) {
                    if (data.data.status) {
                        toaster.pop('success', "Success", "Teacher addded successfully.");
                        $scope.ldata = {};
                        userForm.$setPristine();
                        $scope.getTeachersList()
                    } else {
                        toaster.pop('error', "Error", "Rename image name & try again.");
                    }
                });

            }
        };

        $scope.deleteImage = function (x) {
            $scope.delobj = x;
            $('#deletemodel').modal('show');
        };

        $scope.getTeachersList = function () {
            $http.get($rootScope.ApiUrl + 'teacherList').then(function (data) {
                if (data) {
                    $scope.imageList = angular.copy(data.data.data);
                }
            });
        };


        $scope.deleteImagerecord = function (customer) {
            $http.post($rootScope.ApiUrl + 'deleteteacher', customer).then(function (data) {

                if (data.data.status) {
                    toaster.pop('success', "Success", "Teacher Deleted successfully.");
                    $scope.getTeachersList()
                } else {
                    toaster.pop('error', "Error", "Error While deleting Image.");
                }
                $('#deletemodel').modal('hide');
            });
        };
 
        $scope.getTeachersList()

    }
})();