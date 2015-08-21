<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PedidoController extends Controller
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
        $pedidos = Pedido::all();
        return view('pedido.index');
    }

    public function all()
    {
        $pedidos = Pedido::all();
        return response()->json($pedidos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->nome = $request->input('nome');
        $pedido->descricao = $request->input('descricao');
        $pedido->valor = $request->input('valor');

        $pedido->save();

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
        $pedido    = Pedido::find($id);

        $pedido->nome = $request->input('nome');
        $pedido->descricao = $request->input('descricao');
        $pedido->valor = $request->input('valor');

        $pedido->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
    }
}
