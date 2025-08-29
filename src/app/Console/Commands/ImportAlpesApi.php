<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Car;

class ImportAlpesApi extends Command
{
    protected $signature = 'import:alpes';
    protected $description = 'Importa dados da API da Alpes';

    public function handle()
    {
        $response = Http::get('https://hub.alpes.one/api/v1/integrator/export/1902');

        if ($response->successful()) {
            $cars = $response->json();

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

                // Fotos
                if (!empty($data['fotos'])) {
                    foreach ($data['fotos'] as $url) {
                        $car->photos()->updateOrCreate(['url' => $url]);
                    }
                }
            }

            $this->info('Dados importados com sucesso!');
        } else {
            $this->error('Erro ao acessar a API da Alpes');
        }
    }
}
