<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // O que é uma view?
    // A view é uma página na internet. 
    //View é tudo aquilo que o usuário vê.
    return view('bemvindo');
});

Route::get('teste', function () {
    echo '<html>';
    echo '<h1>teste</h1>';
    echo '</html>';
})->name("rotadeteste");

Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome.";
});

Route::get('ola/{nome?}', function ($nome=null) {
    if( isset($nome) )
        echo "(Parâmetro opcional) Olá! Seja bem vindo $nome.";
        else
        echo "(Parâmetro opcional) Olá! Seja bem vindo Anônimo.";
});

Route::get('rotacomregra/{nome}/{n}', function ($nome, $n) {
    // As partes são separadas por ";"
    // 1ª parte é o campo de inicialização
    // 2ª parte é o campo de teste
    // 3ª parte é o campo de incremento

    // Supondo que o meu n = 3
    for($i=0; $i<$n; $i++) {
        echo "$i - Olá! Seja bem vindo $nome. <br>";
    }
});

Route::prefix('app')->group(function (){
    Route::get('/', function() {
        echo 'Página raiz do app';
    });

    Route::get('users', function() {
        echo 'Página dos users do app';
    });

    Route::get('admin', function() {
        echo 'Página de admins do app';
    });
});

// Rota para adicionar produtos dentro do banco de dados, utilizando parâmetros em rotas
Route::get("produto/add/{nome}/{preco}/{tipo}", function($nome, $preco, $tipo){
    echo "Inserir no banco de dados: $nome - $preco - $tipo";
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->Tipo_Produtos_id = $tipo;
        $produto->save();
});

//Route::get('tipoproduto', "App\Http\Controllers\TipoProdutoController@index");
//Route::get('tipoproduto/create', "App\Http\Controllers\TipoProdutoController@create");
//Route::get('tipoproduto/{id}/edit', "App\Http\Controllers\TipoProdutoController@edit");

Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");
Route::resource('produto', "App\Http\Controllers\ProdutoController");