<?php
$app->get('produto', [
    'as' => 'produto.index', 'uses' => 'ProdutoController@index'
]);

$app->get('produto/all', [
    'as' => 'produto.all', 'uses' => 'ProdutoController@all'
]);
$app->get('produto/create', [
    'as' => 'produto.create', 'uses' => 'ProdutoController@create'
]);
$app->post('produto', [
    'as' => 'produto.store', 'uses' => 'ProdutoController@store'
]);
$app->get('produto/{id}/edit', [
    'as' => 'produto.edit', 'uses' => 'ProdutoController@edit'
]);
$app->patch('produto/{id}', [
    'as' => 'produto.update', 'uses' => 'ProdutoController@update'
]);
$app->get('produto/{id}/delete', [
    'as' => 'produto.delete', 'uses' => 'ProdutoController@delete'
]);
$app->delete('produto/{id}', [
    'as' => 'produto.destroy', 'uses' => 'ProdutoController@destroy'
]);

?>
