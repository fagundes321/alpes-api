<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function __invoke()
    {
        // Pega os dados da API
        $json = Http::get('https://hub.alpes.one/api/v1/integrator/export/1902')->json();

        $dadosOrganizados = [];

        // Percorre cada item e agrupa por categoria
        foreach ($json as $item) {
            $categoria = $item['categoria'] ?? 'Sem Categoria';

            $dadosOrganizados[$categoria][] = [
                'type' => $item['type'],
                'brand' => $item['brand'],
                'model' => $item['model'],
                'version' => $item['version'],
                'year_model' => $item['year']['model'] ?? null,
                'year_build' => $item['year']['build'] ?? null,
                'optionals' => json_encode($item['optionals'] ?? []),
                'doors' => $item['doors'] ?? null,
                'board' => $item['board'] ?? null,
                'chassi' => $item['chassi'] ?? null,
                'transmission' => $item['transmission'] ?? null,
                'km' => $item['km'] ?? null,
                'description' => $item['description'] ?? null,
                'created_api' => $item['created'] ?? null,
                'updated_api' => $item['updated'] ?? null,
                'sold' => $item['sold'] ?? false,
                'category' => $item['category'] ?? null,
                'url_car' => $item['url_car'] ?? null,
                'old_price' => $item['old_price'] ?? null,
                'price' => $item['price'] ?? null,
                'color' => $item['color'] ?? null,
                'fuel' => $item['fuel'] ?? null,
                'fotos' => json_encode($item['fotos'] ?? []),
                // outros campos que desejar
            ];
        }

        // Retorna os dados organizados como JSON
        return response()->json($dadosOrganizados);
    }
}
