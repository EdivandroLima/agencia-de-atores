<h1>Dados do(s) artista(s)</h1>
@foreach ($atores as $item)
    <img src="{{ asset($item->manequim) }}" alt="{{ $item->nome }}" width="400"><br>
    Nome: <strong>{{ $item->nome }}</strong> <br>
    Idade: <strong>{{ $item->idade }}</strong> <br>
    Altura: <strong>{{ $item->altura }}</strong> <br>
    Peso: <strong>{{ $item->peso }}</strong> <br>
    Link do video: <strong><a href="{{ $item->video }}">{{ $item->video }}</a></strong>
    <br>
    <br>
    <hr>
    <br>
@endforeach
