<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostra uma lista de todos os Tipos de Produtos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProdutos = DB::select("SELECT * FROM tipo_produtos");
        //print_r($tipoProdutos);
        return view("tipoproduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar o formulário para a criação de um novo Tipo de Produto.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um novo Tipo de Produto no banco de dados.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "Método Store de Tipo Produto foi chamado <br>";
        //echo "$request->_token <br>";
        //echo "$request->descricao <br>";

        $tipoProduto = new TipoProduto();
        $tipoProduto->descricao = $request->descricao;
        $tipoProduto->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     * Mostra um Tipo de Produto com base em um ID específico. 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id;
        $tipoProduto = TipoProduto::find($id);
        //print_r($produto);
        if( isset($tipoProduto))
        {
            $tipoProdutos = TipoProduto::all();
            //$tipoProdutos = DB::select("SELECT * FROM tipo_produtos");  faz a mesma coisa que a linha de cima
            return view("tipoProduto/show")->with("tipoProduto", $tipoProduto)->with("tipoProdutos", $tipoProdutos);
        }
        else{
            echo "Produto não encontrado";
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Mostra o formulário para edição de um Tipo de Produto específico.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoProduto = TipoProduto::find($id); // Retorna um objeto
        if( isset($tipoProduto) ){
            $tipoProdutos = TipoProduto::all();
            return view("tipoProduto/edit")->with("tipoProduto", $tipoProduto)->with("tipoProdutos", $tipoProdutos);
        }
        else {
            return "Produto não encontrado";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoProduto = TipoProduto::find($id);
        //$produto = DB::select('select * from produtos where id = ?', [$id]);
        //print_r($produto);
        //$produto->update();
        if(isset($tipoProduto)){
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     * Remove um tipo de produto do banco de dados.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoProduto = TipoProduto::find($id);
        if( isset($tipoProduto)){
            $tipoProduto->delete();
        }
        return $this->index();
    }
}
