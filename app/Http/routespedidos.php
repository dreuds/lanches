<?php
$app->get('pedido', [
    'as' => 'pedido.index', 'uses' => 'PedidoController@index'
]);

$app->get('pedido/all', [
    'as' => 'pedido.all', 'uses' => 'PedidoController@all'
]);
$app->get('pedido/create', [
    'as' => 'pedido.create', 'uses' => 'PedidoController@create'
]);
$app->post('pedido', [
    'as' => 'pedido.store', 'uses' => 'PedidoController@store'
]);
$app->get('pedido/{id}/edit', [
    'as' => 'pedido.edit', 'uses' => 'PedidoController@edit'
]);
$app->patch('pedido/{id}', [
    'as' => 'pedido.update', 'uses' => 'PedidoController@update'
]);
$app->get('pedido/{id}/delete', [
    'as' => 'pedido.delete', 'uses' => 'PedidoController@delete'
]);
$app->delete('pedido/{id}', [
    'as' => 'pedido.destroy', 'uses' => 'PedidoController@destroy'
]);

?>
