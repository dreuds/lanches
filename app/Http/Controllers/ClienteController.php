<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        return view('cliente.index');
    }

    public function all()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->senha = $request->input('senha');

        $cliente->save();

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
        $cliente    = Cliente::find($id);

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->senha = $request->input('senha');

        $cliente->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
    }
}
