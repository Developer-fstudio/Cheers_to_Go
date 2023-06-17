@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
@if($edit == 1)<h1>Editar Code</h1>@else <h1>Ver Code</h1> @endif
@stop

@section('content')

<form action="/codes/{{ $code->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-6">
    <label for="code" class="form-label">Code</label>
    <input id="code" name="code" type="text" value="{{$code->code}}" class="form-control" tabindex="1" @if($edit == 0)disabled @endif required>
  </div>
  <div class="mb-3">
    <label for="estado">Tipo</label>
  <select class="form-control" name="estado" @if($edit == 0)disabled @endif id="estado">
    @if ($code->estado === 0)
    <option id="estado" value="0">Por Usar</option>
    <option id="estado" value="1">Usado</option>
      @else
    <option id="estado" value="1">Usado</option>
      <option id="estado" value="0">Por Usar</option>
      @endif

  </select>
</div>
@if($edit == 1)
<a href="/codes" class="btn btn-secondary">Cancelar</a>
<button type="submit" class="btn btn-primary">Guardar</button>
@endif
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

    <input id='jogoid' @if($edit == 0)disabled @endif value={{ $jogo->id}} @if($jogo->id == $code->jogo_id) checked @endif name='jogoid' type="checkbox" class="form-control radio" tabindex="1">
</form>

            </td>
            <td>{{ $jogo->img}}</td>
            <td>{{$jogo->nome}}</td>
            <td>
                @if (!$user)
<script>
    var message = 'sem sessao ativa';
    Swal.fire({
  position: 'top-end',
  icon: 'warning',
  title: message,
  showConfirmButton: false,
  timer: 1500
})
</script>
@elseif ( $user->role == 'admin')
                <a href="/jogos/{{ $jogo->id}}/edit" class="btn btn-info">Editar</a>

                <form action="{{ route ('jogos.destroy',$jogo->id)}}" method="POST">
                     @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                @else
                <a href="/jogos/{{ $jogo->id}}/edit" class="btn btn-warning">Ver</a>
                @endif
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
