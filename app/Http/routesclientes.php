<?php
$app->get('cliente', [
    'as' => 'cliente.index', 'uses' => 'ClienteController@index'
]);

$app->get('cliente/all', [
    'as' => 'cliente.all', 'uses' => 'ClienteController@all'
]);
$app->get('cliente/create', [
    'as' => 'cliente.create', 'uses' => 'ClienteController@create'
]);
$app->post('cliente', [
    'as' => 'cliente.store', 'uses' => 'ClienteController@store'
]);
$app->get('cliente/{id}/edit', [
    'as' => 'cliente.edit', 'uses' => 'ClienteController@edit'
]);
$app->patch('cliente/{id}', [
    'as' => 'cliente.update', 'uses' => 'ClienteController@update'
]);
$app->get('cliente/{id}/delete', [
    'as' => 'cliente.delete', 'uses' => 'ClienteController@delete'
]);
$app->delete('cliente/{id}', [
    'as' => 'cliente.destroy', 'uses' => 'ClienteController@destroy'
]);

?>
