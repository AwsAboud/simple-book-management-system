<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://restcountries.com/v2/all');

        if($response->failed()){
            $this->command->error('Failed to fetch countries from API.');
            return ;
        }

        $countries =  $response->json();
        $totalCountries = count($countries);

        // Initialize progress bar
        $progressBar = $this->command->getOutput()->createProgressBar($totalCountries);
        $progressBar->setMessage('Seeding countries...');
        $progressBar->start();

        foreach($countries as $country){
            Country::create([
                'country_name' => $country['name'],
                'nationality' => $country['demonym'],
                'alpha2_code' => $country['alpha2Code'],
                'alpha3_code' => $country['alpha3Code'],
            ]);
            // Advance progress bar
            $progressBar->advance();
        }

        // Finish progress bar
        $progressBar->finish();
        // Add a new line after progress bar
        $this->command->newLine();  
        $this->command->info("\nCountries table seeded successfully.");
    }
}
