<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-route.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body ng-app="meulanche">
        <div class="container-fluid">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#"><i class="fa fa-cutlery"></i></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class=""><a href="#/produtos"> Produtos</a></li>
                    <li><a href="#/pedidos"><i class="fa fa-file-o"></i> Pedidos</a></li>
                    <li><a href="#/clientes"><i class="fa fa-users"></i> Clientes</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            <div ng-view></div>
            <script>
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
                        $scope.getProdutos = function(){
                            $http.get('produto/all').
                                success(function(data, status, headers, config) {
                                    $scope.produtos = data;
                                });
                        };

                        $scope.getProdutos();
                        console.log($scope.produto);
                        $scope.save = function() {
                                    $http({
                                       method  : 'POST',
                                       url     : 'produto/store',
                                       data    : $scope.produto,  // pass in data as strings
                                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                                    }).
                                    success(function(response){
                                        console.log(response);
                                       location.reload();
                                    }).
                                    error(function(response){
                                       console.log(response);
                                       alert('Incomplete Form');
                                    });
                                 }
                    }]);
            </script>
        </div>
    </body>
</html>
