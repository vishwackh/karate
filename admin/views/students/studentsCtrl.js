(function () {
    'use strict';

    angular
        .module('emsAdmin')
        .controller('studentsCtrl', studentsCtrl);

    studentsCtrl.$inject = ['$scope', '$http', '$rootScope', 'localStorageService', 'toaster', '$state'];

    /* @ngInject */
    function studentsCtrl($scope, $http, $rootScope, localStorageService, toaster, $state) {
        $scope.ldata = {
            usn: '',
            name: '',
            teacher: '',
            rank1: false,
            rank2: false,
            rank3: false,
            rank4: false,
            rank5: false,
            rank6: false,
            rank6: false,
            rank7: false,
            rank8: false,
            rank9: false
        };

        $scope.addStudent = function (location, userForm) {
            $scope.submitted = true;
            if (userForm.$valid) {

                $http.post($rootScope.ApiUrl + 'addStudent',location).then(function (data) {
                    if (data.data.status) {
                        toaster.pop('success', "Success", "Student addded successfully.");
                        $scope.ldata = {
                            usn: '', 
                            name: '', 
                            teacher: '', 
                            rank1: false,
                            rank2: false,
                            rank3: false,
                            rank4: false,
                            rank5: false,
                            rank6: false,
                            rank6: false,
                            rank7: false,
                            rank8: false, 
                            rank9: false
                        };
                        userForm.$setPristine();
                        $scope.getStudentList()
                    } else {
                        toaster.pop('error', "Error", "Something went wrong & try again.");
                    }
                });

            }
        };

        $scope.deleteImage = function (x) {
            $scope.delobj = x;
            $('#deletemodel').modal('show');
        };
        $scope.selectTeachers = function (x) {             
            $('#teachermodel').modal('show');
        };
        $scope.getTeachersList = function () {
            $http.get($rootScope.ApiUrl + 'teacherList').then(function (data) {
                if (data) {
                    $scope.teachers = angular.copy(data.data.data);
                }
            });
        };

        $scope.getStudentList = function () {
            $http.get($rootScope.ApiUrl + 'StudentList').then(function (data) {
                if (data) {
                    $scope.imageList = angular.copy(data.data.data);
                }
            });
        };

        $scope.deleteImagerecord = function (customer) {
            $http.post($rootScope.ApiUrl + 'deleteStudent', customer).then(function (data) {

                if (data.data.status) {
                    toaster.pop('success', "Success", "Student Deleted successfully.");
                    $scope.getTeachersList()
                } else {
                    toaster.pop('error', "Error", "Something went wrong & try again.");
                }
                $('#deletemodel').modal('hide');
            });
        };
 
        $scope.getTeachersList()
        $scope.getStudentList()

    }
})();