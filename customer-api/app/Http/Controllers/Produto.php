<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Produto extends Controller
{
        public function index()
        {
            $produtos = Produto::all();
            return response()->json([
                'status' => true,
                'message' => 'Produtos retrieved successfully',
                'data' => $produtos
            ], 200);
        }
    
        public function show($id)
        {
            $produtos = Produto::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Produtos found successfully',
                'data' => $produtos
            ], 200);
        }
    
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [ //VALIDATOR: UTILIZAR O COMANDO CTRL + Espaço e selecionar FACADE
    
                'nome' => 'required|string|max:200',
                'preço' => 'required|numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            $produtos = Produto::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Produtos created successfully',
                'data' => $produtos
            ], 201);
        }
    
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:200',
                'preço' => 'required|numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            $produtos = Produto::findOrFail($id);
            $produtos->update($request->all());
    
            return response()->json([
                'status' => true,
                'message' => 'Produtos updated successfully',
                'data' => $produtos
            ], 200);
        }
    
        public function destroy($id)
        {
            $produtos = Produto::findOrFail($id);
            $produtos->delete();
            
            return response()->json([
                'status' => true,
                'message' => 'Produtos deleted successfully'
            ], 204);
        }
}
    
