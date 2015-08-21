
    app.controller('ClienteController', ['$scope', '$http', function ($scope, $http) {
        $scope.cliente = {};
        $scope.btnSalvar = 'save';
        $scope.getClientes = function(){
            $http.get('cliente/all').
                success(function(data, status, headers, config) {
                    $scope.clientes = data;
                });
        };

        $scope.getClientes();
        console.log($scope.cliente);
        console.log($);
        console.log($.param($scope.cliente));
        $scope.save = function() {
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'cliente' : 'cliente/'+ $scope.cliente.id,
                       data    : jQuery.param($scope.cliente) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        console.log(response);
                        $scope.cliente = {};
                        location.reload();
                    }).
                    error(function(response){
                       console.log(response);
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.cliente = $scope.clientes[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('cliente/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              console.log(data);
                              alert('Unable to delete');
                           });
                }
    }]);
