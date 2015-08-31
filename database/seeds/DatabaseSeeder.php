<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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

        // $this->call(UserTableSeeder::class);

        Model::reguard();

        $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder 
{

  public function run()
  {
    DB::insert('insert into produtos(nome, quantidade, valor, descricao)
        values(?, ?, ?, ?)', 
        array('Geladeira', 2, 5900.00, 'Side by Side com gelo na porta'));

    DB::insert('insert into produtos(nome, quantidade, valor, descricao)
        values(?, ?, ?, ?)', 
        array('Fogao', 5, 950.00, 'Painel automatico e forno eletrico'));

    DB::insert('insert into produtos(nome, quantidade, valor, descricao)
        values(?, ?, ?, ?)', 
        array('Microondas', 1, 1520.00, 'Manda sms quando termina de esquentar'));

}
}
