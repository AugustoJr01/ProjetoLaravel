<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \App\Models\TipoProduto;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('mensagem', function () {
    error_log('teste');
});

Artisan::command('cria_tipo_produto_porcao', function () {
    $tipoProduto = new TipoProduto();
    $tipoProduto->descricao = "Porção";
    $tipoProduto->save();
});

Artisan::command('mostra_todos_tipo_produtos', function () {
    print(TipoProduto::all());
});