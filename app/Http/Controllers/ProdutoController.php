<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostra uma lista de todos os Produtos;
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        //
        $produtos = DB::select("SELECT produtos.id, 
                                       produtos.nome,
                                       produtos.preco,
                                       produtos.Tipo_Produtos_id,
                                       tipo_produtos.descricao
                                FROM produtos
                                JOIN tipo_produtos 
                                ON produtos.Tipo_Produtos_id = tipo_produtos.id
                                ORDER BY produtos.id;");
        //print_r($produtos);
        return view("Produto/index")->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select("SELECT * FROM tipo_produtos");
        //print_r($tipoProdutos);
        return view("Produto/create")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->Tipo_Produtos_id != "null")
        {
        $Produto = new Produto();
        $Produto->nome = $request->nome;
        $Produto->preco = $request->preco;
        $Produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $Produto->save();            
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id;
        $produto = Produto::find($id);
        //print_r($produto);
        if( isset($produto))
        {
            $tipoProdutos = TipoProduto::all();
            //$tipoProdutos = DB::select("SELECT * FROM tipo_produtos");  faz a mesma coisa que a linha de cima
            return view("Produto/show")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
        }
        else{
            echo "Produto não encontrado";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo "Método edit de produto chamado com id: $id <br>";
        $produto = Produto::find($id); // Retorna um objeto
        // $produto = Produto::where('Tipo_Produtos_id', 1)->get(); // Retorna um array
        // $produto = DB::select("SELECT * FROM PRODUTOS WHERE id = ?", [$id])[0]; // Retorna um objeto (por causa do [0])
        // $produtos = DB::select("SELECT * FROM PRODUTOS WHERE preco = ?", [8]); // Retorna um array
        // foreach($produtos as $produto) {
        // print_r($produto);
        // echo '<br><br>';
        // }
        //print_r($produto);
        if( isset($produto) ){
            $tipoProdutos = TipoProduto::all();
            return view("Produto/edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
        }
        else {
            return "Produto não encontrado";
        }
    }

    /**
     * Update the specified resource in storage.
     * Atualiza 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        //$produto = DB::select('select * from produtos where id = ?', [$id]);
        //print_r($produto);
        //$produto->update();
        if(isset($produto)){
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->update();
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Método destreoy chamado <br>";
        $produto = Produto::find($id);
        if( isset($produto)){
            $produto->delete();
        }
        return $this->index();
    }
}
