@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
@stop

@section('content')

<div class="card card-yellow">
    <div class="card-header">
        <h3 class="card-title">
Editar Cliente : {{$client->name}}
 </h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="/clients/{{$client->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
             <div class="col">
           <div class="mb-4">
             <label for="name" class="form-label">Nome</label>
             <input id="name" name="name" type="text" class="form-control" value="{{$client->name}}" required>
           </div>
             </div>
             <div class="col">

           <div class="mb-4">
             <label for="phone" class="form-label">Telefone</label>
             <input id="phone" name="phone" type="text" class="form-control" value="{{$client->phone}}" required>
           </div>
            </div>
         </div>
           <div class="row">
             <div class="col">
             <div class="mb-4">
             <label for="email" class="form-label">Email</label>
             <input type='email' name="email" class="form-control" id='email' value="{{$client->email}}" required>
           </div>
             </div>
                 <div class="col">
           <div class="mb-4">
             <label for="NIF" class="form-label">NIF</label>
             <input type='number' name="NIF" class="form-control" id='NIF' value="{{$client->NIF}}" required>
           </div>
                 </div>
           </div>
           <div class="row">
             <div class="col">
                 <div class="mb-4">
                     <label for="gernder">Género</label>
                   <select class="form-control" name="gender" id="gender">
                       @if ($client->gender === 0)
                         <option id="gender" value="0">Feminino</option>
                         <option id="gender" value="1">Masculino</option>
                       @else
                       <option id="gender" value="1">Masculino</option>
                       <option id="gender" value="0">Feminino</option>
                       @endif
                   </select>
                 </div>
             </div>
             <div class="col">
           <div class="mb-4">
             <label for="dataNascimento" class="form-label">Data de Nascimento</label>
             <input type='date' name="dataNascimento" class="form-control" id='dataNascimento' value="{{$client->dataNascimento}}" required>
           </div>
             </div>
           </div>

           <a href="/clients" class="btn btn-secondary">Cancelar</a>
           <button type="submit" class="btn btn-primary">Guardar</button>
         </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
