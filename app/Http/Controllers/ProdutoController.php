<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

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
        $produtos = Produto::all();
        return view('produto.index');
    }

    public function all()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->valor = $request->input('valor');

        $produto->save();

        return response()->json(array(
                'error' => false,
                'urls' => ['teste'=>1000],
                200
            ));
    }
    public function edit()
    {
        return 'edit';
    }

    public function update(Request $request, $id)
    {
        $produto    = Produto::find($id);

        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->valor = $request->input('valor');

        $produto->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
    }
}
