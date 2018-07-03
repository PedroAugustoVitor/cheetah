<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Motorista',
            'email' => 'motorista'.'@gmail.com',
            'password' => bcrypt('123456'),
            'dataNascimento' => date('Y-m-d'),
            'cpf' => '070.969.195-54',
            'cep' => '48790-000',
            'telefone' => '3272-1025',
            'celular' => '99168-8161',
            'role' => 'motorista'
        ]);
        DB::table('users')->insert([
            'name' => 'Passageiro',
            'email' => 'passageiro'.'@gmail.com',
            'password' => bcrypt('123456'),
            'dataNascimento' => date('Y-m-d'),
            'cpf' => '070.969.195-54',
            'cep' => '48790-000',
            'telefone' => '3272-1025',
            'celular' => '99168-8161',
            'role' => 'passageiro'
        ]);
    }
}
