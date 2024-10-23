<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Jorge Augusto';
        $fornecedor->site = 'ja.com.br';
        $fornecedor->uf = 'SC';
        $fornecedor->email = 'jorginho@gmail.com';
        $fornecedor->save();

        //metodo create(a classe no Model, tem q ter o atributo fillable)
        Fornecedor::create([
            'nome' => 'Paulo Miguel',
            'site' => 'miguelito.com.br',
            'uf' => 'RS',
            'email' => 'miguelzin@gmail.com'
        ]);

        //insert
        DB::table('fornecedors')->insert([
            'nome' => 'Jose Paulo',
            'site' => 'zezinho.com.br',
            'uf' => 'RS',
            'email' => 'zepaulo@gmail.com'
        ]);
    }
}
