<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Car;

class ImportApiAlpes extends Command
{
    protected $signature = 'import:alpes';
    protected $description = 'Importa os dados da API Alpes';

    public function handle()
    {
        $json = Http::get('https://hub.alpes.one/api/v1/integrator/export/1902')->json();

        foreach ($json as $item) {



            Car::updateOrCreate(
                ['board' => $item['board'] ?? null], // chave única real
                [
                    'type' => $item['type'] ?? null,
                    'brand' => $item['brand'] ?? null,
                    'model' => $item['model'] ?? null,
                    'version' => $item['version'] ?? null,
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
                ]
            );
        }

        $this->info('Importação concluída!');
    }
}
