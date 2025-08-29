<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarPhoto;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function __invoke()
    {
        $cars = Http::get('https://hub.alpes.one/api/v1/integrator/export/1902')->json();

        foreach ($cars as $data) {
            $car = Car::updateOrCreate(
                ['id' => $data['id']],
                [
                    'type' => $data['type'] ?? null,
                    'brand' => $data['brand'] ?? null,
                    'model' => $data['model'] ?? null,
                    'version' => $data['version'] ?? null,
                    'year_model' => $data['year']['model'] ?? null,
                    'year_build' => $data['year']['build'] ?? null,
                    'doors' => $data['doors'] ?? null,
                    'board' => $data['board'] ?? null,
                    'chassi' => $data['chassi'] ?? null,
                    'transmission' => $data['transmission'] ?? null,
                    'km' => $data['km'] ?? null,
                    'description' => $data['description'] ?? null,
                    'price' => $data['price'] ?? null,
                    'color' => $data['color'] ?? null,
                    'fuel' => $data['fuel'] ?? null,
                    'category' => $data['category'] ?? null,
                    'url_car' => $data['url_car'] ?? null,
                ]
            );

            // Salvar fotos
            if (!empty($data['fotos'])) {
                foreach ($data['fotos'] as $url) {
                    $car->photos()->updateOrCreate(['url' => $url]);
                }
            }
        }

        return response()->json(['message' => 'Dados importados com sucesso']);
    }
}
