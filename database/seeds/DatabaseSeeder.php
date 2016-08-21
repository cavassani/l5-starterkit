<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        // Cidades
        $this->call(StatesTableSeeder::class);

        // Cidades
        $this->call('CitiesAcreSeeder');
        $this->call('CitiesAlagoasSeeder');
        $this->call('CitiesAmapaSeeder');
        $this->call('CitiesAmazonasSeeder');
        $this->call('CitiesBahiaSeeder');
        $this->call('CitiesCearaSeeder');
        $this->call('CitiesDistritoFederalSeeder');
        $this->call('CitiesEspiritoSantoSeeder');
        $this->call('CitiesGoiasSeeder');
        $this->call('CitiesMaranhaoSeeder');
        $this->call('CitiesMatoGrossoSeeder');
        $this->call('CitiesMatoGrossoDoSulSeeder');
        $this->call('CitiesMinasGeraisSeeder');
        $this->call('CitiesParaSeeder');
        $this->call('CitiesParaibaSeeder');
        $this->call('CitiesParanaSeeder');
        $this->call('CitiesPernambucoSeeder');
        $this->call('CitiesPiauiSeeder');
        $this->call('CitiesRioDeJaneiroSeeder');
        $this->call('CitiesRioGrandeDoNorteSeeder');
        $this->call('CitiesRioGrandeDoSulSeeder');
        $this->call('CitiesRondoniaSeeder');
        $this->call('CitiesRoraimaSeeder');
        $this->call('CitiesSantaCatarinaSeeder');
        $this->call('CitiesSaoPauloSeeder');
        $this->call('CitiesSergipeSeeder');
        $this->call('CitiesTocantinsSeeder');

        Model::reguard();
    }
}
