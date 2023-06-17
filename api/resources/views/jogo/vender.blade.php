@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
   <h1>Vender Jogo</h1>
@stop

@section('content')

<form action="" method="POST">
  @csrf
</div>
  <a href="/jogos" class="btn btn-secondary" tabindex="1">Cancelar</a>
  <button type="submit" class="btn btn-success" tabindex="2">Vender</button>
  <hr>
<div class="card card-yellow">
    <div class="card-header">
    <h3 class="card-title">Selecione o Cliente</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>

<button type="button" class="btn btn-tool">
    <a href="/clients/create"><i class="fas fa-user-plus"></i></a>
    </button>

    </div>
    </div>
    <div class="card-body">


<div class="card-body table-responsive p-0" style="height: 300px;">
    <table id="clients" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-yellow text-white">
            <tr>
                <th scope="col">Selecionar</th>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Telemovel</th>
                <th scope="col">Género</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>

        <input id='client' value={{ $client->id }} name='client' type="radio" class="form-control">


                </td>
                <td>{{ $client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->gener}}</td>
                <td>
                    <a href="/clients/{{ $client->id}}/edit" class="btn btn-info">Editar</a>

                </td>
            </tr>
            @endforeach
        </form>
        </tbody>
    </table>
</div>

</div>

</div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>

@stop
