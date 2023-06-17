@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
@stop

@section('content')
<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">
Criar Novo Jogo
 </h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">

        <form action="/jogos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col">
            <div class="mb-4">
              <label for="nome" class="form-label">Nome</label>
              <input id="nome" name="nome" type="text" class="form-control"  required>
            </div>
              </div>
              <div class="col">

            <div class="mb-4">
              <label class="form-label" for="inputFile">Imagem:</label>
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
              <input type='utilizador' name="utilizador" class="form-control" id='utilizador'  required>
            </div>
              </div>
                  <div class="col">
            <div class="mb-4">
              <label for="codigo" class="form-label">Codigo</label>
              <input type='codigo' name="codigo" class="form-control" id='NIF' required>
            </div>
            </div>
            </div>
            <div class="mb-3">
                <label for="gernder">Tipo</label>
              <select class="form-control" name="online" id="online">
                <option id="online" value="0">Fisico</option>
                <option id="online" value="1">Online</option>
              </select>
            </div>
            <a href="/jogos" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
          </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- maneira de tirar o Please fill out this field -->
    <script>
      $(document).ready(function () {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                switch (e.srcElement.id) {
                    case "nome":
                        e.target.setCustomValidity("Prencha o nome do jogo");
                        break;
                    case "image":
                        e.target.setCustomValidity("Prencha o imagem do jogo");
                        break;
                }
            }
        };
        elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
        };
    }
})
    </script>
@stop
