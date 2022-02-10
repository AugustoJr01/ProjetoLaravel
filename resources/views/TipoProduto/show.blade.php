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
        <form method="post" action="{{route("tipoproduto.store")}}">
            @csrf
            <div class="form-group"> <br>
                <label for="id-input-ID">ID</label>
                <input type="email" class="form-control" id="id-input-ID" placeholder="#" value="{{$tipoProduto->id}}" disabled>
                {{--<small id="id-help-ID" class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>--}}
            </div>
            <div class="form-group">
                <label for="id-input-nome">Descrição</label>
                <input type="text" name="nome" class="form-control" id="id-input-nome" placeholder="Digite o nome" value="{{$tipoProduto->descricao}}" disabled>
            </div>
            <div class="form-group">
                    {{--<option value=null selected>Selecione um tipo</option>--}}
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Antes de adicionar cada um dos option do select, é perguntado se $produto->Tipo_Produtos_id == $tipoProduto->id --}}
                        {{-- Ou seja, é verificado se o option que estamos adicionando possui ID igual ao Tipo_Produtos_id do objeto que estamos exibindo --}}
                        @if ($tipoProduto->Tipo_Produtos_id == $tipoProduto->id)
                            <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                        @endif 
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="id-input-updated_at">Última atualização</label>
                <input type="text" name="updated_at" class="form-control" id="id-input-updated_at" value="{{$tipoProduto->updated_at}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-created_at">Data de criação</label>
                <input type="text" name="created_at" class="form-control" id="id-input-created_at" value="{{$tipoProduto->created_at}}" disabled>
            </div>
            <div class="form-group my-2">
                <a href="{{route("tipoproduto.index")}}" class="btn btn-outline-dark">Voltar</a>
            </div>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>