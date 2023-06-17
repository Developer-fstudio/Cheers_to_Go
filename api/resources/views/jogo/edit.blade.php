@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
@stop

@section('content')

<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">
@if($edit == 1)Editar Jogo : @else Ver Jogo : @endif {{$jogo->nome}}
 </h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">

    <form action="/jogos/{{$jogo->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
         <div class="col">
       <div class="mb-4">
         <label for="nome" class="form-label">Nome</label>
         <input id="nome" name="nome" type="text" value="{{$jogo->nome}}" class="form-control" @if($edit == 0)disabled @endif  required>
       </div>
         </div>
         <div class="col">

       <div class="mb-4">
         <label for="imagem" class="form-label">Imagem</label>
         <img style="
         width: 100px;
         height: 100px;
     " src={{ $jogo->img ?? '/uploads/0.png'}} >
         <label class="form-label" for="inputFile"></label>
         <input
             type="file"
             name="file"
             id="inputFile"
             class="form-control @error('file') is-invalid @enderror">

         @error('file')
             <span class="text-danger">{{ $message }}</span>
         @enderror
        </div>
        </div>
     </div>
       <div class="row">
         <div class="col">
         <div class="mb-4">
         <label for="utilizador" class="form-label">Utilizador</label>
         <input type='utilizador' name="utilizador" value="{{$jogo->utilizador}}" class="form-control" id='utilizador' @if($edit == 0)disabled @endif>
       </div>
         </div>
             <div class="col">
       <div class="mb-4">
         <label for="codigo" class="form-label">Codigo</label>
         <input type='codigo' name="codigo" class="form-control" value="{{$jogo->codigo}}"" id='codigo' @if($edit == 0)disabled @endif>
       </div>
       </div>
       </div>
       <div class="mb-3">
           <label for="gernder">Tipo</label>
         <select class="form-control" name="online" @if($edit == 0)disabled @endif id="online">
             @if ($jogo->online === 0)
             <option id="online" value="0">Fisico</option>
           <option id="online" value="1">Online</option>
           @else
           <option id="online" value="1">Online</option>
           <option id="online" value="0">Fisico</option>
           @endif

         </select>
       </div>
       @if($edit == 1)
       <a href="/jogos" class="btn btn-secondary">Cancelar</a>
       <button type="submit" class="btn btn-primary">Guardar</button>
       @endif
     </form>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
