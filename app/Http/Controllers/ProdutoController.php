<?php

namespace App\Http\Controllers;


class ProdutoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return 'show';
    }

    /**
     * index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        return view('produto.index');
    }

    public function create()
    {
        return 'create';
    }

    public function store()
    {
        return 'store';
    }
    public function edit()
    {
        return 'edit';
    }

    public function update()
    {
        return 'update';
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy()
    {
        return 'destroy';
    }
}
