var app = angular.module('meulanche',['ngRoute']);
    app.config(['$routeProvider', function ($routeProvider){
        $routeProvider
        .when('/pedidos', {templateUrl: 'views/produto/pedidos.html'})
        .when('/clientes', {templateUrl: 'views/produto/clientes.html'})
        .when('/produtos', {templateUrl: 'views/produto/produtos.html'})
        .otherwise({redirectTo: '/'});
}]);

    app.controller('ProdutoController', ['$scope', '$http', function ($scope, $http) {
        $scope.produto = {};
        $scope.btnSalvar = 'save';
        $scope.getProdutos = function(){
            $http.get('produto/all').
                success(function(data, status, headers, config) {
                    $scope.produtos = data;
                });
        };

        $scope.getProdutos();
        console.log($scope.produto);
        console.log($);
        console.log($.param($scope.produto));
        $scope.save = function() {
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'produto' : 'produto/'+ $scope.produto.id,
                       data    : jQuery.param($scope.produto) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        console.log(response);
                        $scope.produto = {};
                        location.reload();
                    }).
                    error(function(response){
                       console.log(response);
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.produto = $scope.produtos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('produto/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              console.log(data);
                              alert('Unable to delete');
                           });
                }
    }]);
