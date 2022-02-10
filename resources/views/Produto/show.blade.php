<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <title>Show de Produtos</title>
</head>
<body>
    <div class="container">
        <form method="post" action="{{route("produto.store")}}">
            @csrf
            <div class="form-group"> <br>
                <label for="id-input-ID">ID</label>
                <input type="email" class="form-control" id="id-input-ID" placeholder="#" value="{{$produto->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="id-input-nome" placeholder="Digite o nome" value="{{$produto->nome}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-preco">Preço</label>
                <input type="text" name="preco" class="form-control" id="id-input-nome" placeholder="Digite o preço" value="{{$produto->preco}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-Tipo_Produtos_id">Tipo</label>
                {{--<input type="text" name="Tipo_Produtos_id" class="form-control" id="id-input-Tipo_Produtos_id" placeholder="Digite o tipo">--}}
                <select class="form-select" name="Tipo_Produtos_id" aria-label="Default select example" disabled>
                    {{--<option value=null selected>Selecione um tipo</option>--}}
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Antes de adicionar cada um dos option do select, é perguntado se $produto->Tipo_Produtos_id == $tipoProduto->id --}}
                        {{-- Ou seja, é verificado se o option que estamos adicionando possui ID igual ao Tipo_Produtos_id do objeto que estamos exibindo --}}
                        @if ($produto->Tipo_Produtos_id == $tipoProduto->id)
                            <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                        @endif 
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id-input-updated_at">Última atualização</label>
                <input type="text" name="updated_at" class="form-control" id="id-input-updated_at" value="{{$produto->updated_at}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-created_at">Data de criação</label>
                <input type="text" name="created_at" class="form-control" id="id-input-created_at" value="{{$produto->created_at}}" disabled>
            </div>
            <div class="form-group my-2">
                <a href="{{route("produto.index")}}" class="btn btn-outline-dark">Voltar</a>
            </div>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>