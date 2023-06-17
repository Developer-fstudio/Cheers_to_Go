@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
@stop

@section('content')


<div class="card card-yellow">
    <div class="card-header">
        <h3 class="card-title">
Criar Novo Cliente
 </h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">


<form action="/clients" method="POST">
    @csrf
    <div class="row">
      <div class="col">
    <div class="mb-4">
      <label for="name" class="form-label">Nome</label>
      <input id="name" name="name" type="text" class="form-control"  required>
    </div>
      </div>
      <div class="col">

    <div class="mb-4">
      <label for="phone" class="form-label">Telefone</label>
      <input id="phone" name="phone" type="text" class="form-control" required>
    </div>
     </div>
  </div>
    <div class="row">
      <div class="col">
      <div class="mb-4">
      <label for="email" class="form-label">Email</label>
      <input type='email' name="email" class="form-control" id='email'  required>
    </div>
      </div>
          <div class="col">
    <div class="mb-4">
      <label for="NIF" class="form-label">NIF</label>
      <input type='number' name="NIF" class="form-control" id='NIF' required>
    </div>
          </div>
    </div>
    <div class="row">
      <div class="col">
          <div class="mb-3">
              <label for="gernder">Género</label>
            <select class="form-control" name="gender" id="gender">
              <option id="gender" value="0">Feminino</option>
              <option id="gender" value="1">Masculino</option>
            </select>
          </div>
      </div>
      <div class="col">
    <div class="mb-4">
      <label for="dataNascimento" class="form-label">Data de Nascimento</label>
      <input type='date' name="dataNascimento" class="form-control" id='dataNascimento' required>
    </div>
      </div>
    </div>

    <a href="/clients" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
                    case "name":
                        e.target.setCustomValidity("Prencha o Nome do cliente");
                        break;
                    case "phone":
                        e.target.setCustomValidity("Prencha o Telemovel do cliente");
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
