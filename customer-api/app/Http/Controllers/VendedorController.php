<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = VendedorController::all();
        return response()->json([
            'status' => true,
            'message' => 'Vendedor recuperados com sucesso',
            'data' => $vendedores
        ], 200);
    }

    public function show($id)
    {
        $vendedores = VendedorController::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vendedor recuperados com sucesso',
            'data' => $vendedores
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ //VALIDATOR: UTILIZAR O COMANDO CTRL + Espaço e selecionar FACADE

            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano_de_nascimento' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $vendedores = VendedorController::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vendedor criado com sucesso',
            'data' => $vendedores
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano_de_nascimento' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $vendedores = VendedorController::findOrFail($id);
        $vendedores->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vendedor atualizado com sucesso',
            'data' => $vendedores
        ], 200);
    }

    public function destroy($id)
    {
        $vendedores = VendedorController::findOrFail($id);
        $vendedores->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Vendedor deletado com sucesso'
        ], 204);
    }
}


