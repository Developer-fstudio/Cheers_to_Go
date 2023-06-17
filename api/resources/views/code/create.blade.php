@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
   <h1>Criar Code</h1>
@stop

@section('content')

<form action="/codes" method="POST">
  @csrf
  <div class="mb-6">
    <label for="code" class="form-label">Code</label>
    <input id="code" name="code" type="text" class="form-control" tabindex="1" required>
  </div>
  <div class="mb-3">
    <label for="estado">Tipo</label>
  <select class="form-control" name="estado" id="estado">
    <option id="estado" value="0">Por Usar</option>
    <option id="estado" value="1">Usado</option>
  </select>
</div>
  <a href="/codes" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <hr>
<h2>Selecione o Jogo</h2>
<table id="jogos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col"></th>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jogos as $jogo)
        <tr>
            <td>

    <input id='jogoid' value={{ $jogo->id}} name='jogoid' type="checkbox" class="form-control radio" tabindex="1">
</form>

            </td>
            <td>{{ $jogo->img}}</td>
            <td>{{$jogo->nome}}</td>
            <td>
                <form action="{{ route ('jogos.destroy',$jogo->id)}}" method="POST">
                <a href="/jogos/{{ $jogo->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>

@stop
