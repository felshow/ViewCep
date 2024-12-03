<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function getCepData($cep)
    {
        // Fazendo a requisição para a API ViaCEP
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        // Verificando se a requisição foi bem-sucedida
        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'CEP não encontrado'], 404);
    }
}
