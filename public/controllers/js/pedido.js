
    app.controller('PedidoController', ['$scope', '$http', function ($scope, $http) {
        $scope.pedido = {};
        $scope.btnSalvar = 'save';
        $scope.getPedidos = function(){
            $http.get('pedido/all').
                success(function(data, status, headers, config) {
                    $scope.pedidos = data;
                });
        };

        $scope.getPedidos();
        console.log($scope.pedido);
        console.log($);
        console.log($.param($scope.pedido));
        $scope.save = function() {
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'pedido' : 'pedido/'+ $scope.pedido.id,
                       data    : jQuery.param($scope.pedido) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        console.log(response);
                        $scope.pedido = {};
                        location.reload();
                    }).
                    error(function(response){
                       console.log(response);
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.pedido = $scope.pedidos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('pedido/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              console.log(data);
                              alert('Unable to delete');
                           });
                }
    }]);
