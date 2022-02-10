<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <title>Edit de Produto</title>
</head>
<body>
    <div class="container">
        <form method="post" action="{{route("produto.update", $produto->id)}}">
            @csrf 
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group"> <br>
                <label for="id-input-ID">ID</label>
                <input type="text" class="form-control" id="id-input-ID" disabled value="{{$produto->id}}">
                {{--<small id="id-help-ID" class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>--}}
            </div>
            <div class="form-group">
                <label for="id-input-nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="id-input-nome" placeholder="Digite o nome" value="{{$produto->nome}}">
            </div>
            <div class="form-group">
                <label for="id-input-preco">Preço</label>
                <input type="text" name="preco" class="form-control" id="id-input-nome" placeholder="Digite o preço" value="{{$produto->preco}}">
            </div>
            <div class="form-group">
                <label for="id-input-Tipo_Produtos_id">Tipo</label>
                {{--<input type="text" name="Tipo_Produtos_id" class="form-control" id="id-input-Tipo_Produtos_id" placeholder="Digite o tipo">--}}
                <select class="form-select" name="Tipo_Produtos_id" aria-label="Default select example">
                    {{--<option value=null selected>Selecione um tipo</option>--}}
                    @foreach ($tipoProdutos as $tipoProduto)
                        @if ($tipoProduto->id == $produto->Tipo_Produtos_id)
                            <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>  
                        @else
                            <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>   
                        @endif
                    @endforeach
                  </select>
            </div>
            <div class="form-group my-2">
                <button type="submit" class="btn btn-outline-dark">Salvar</button>
                <a href="{{route("produto.index")}}" class="btn btn-outline-dark">Voltar</a>
            </div>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>