@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
    <h1>Editar Utilizador {{$user->name}}</h1>
    <hr>
    <div class="d-flex justify-content-center">
        <div style="width: 50%" class="card card-outline card-primary">
        <div class="card-header text-center">
        </div>
        <div class="card-body col-md-auto">
        <form action="/user/{{$user->id}}/edit" method="post">
            @csrf
        <div class="input-group mb-3">
        <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="Nome" required>
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-user"></span>
        </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input id="email" name="email" type="email" value="{{$user->email}}" class="form-control" placeholder="Email" required>
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-envelope"></span>
        </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" name="password" type="password" class="form-control" placeholder="Senha">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input id="rePassword" name="rePassword" type="password" class="form-control" placeholder="Senha">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
        </div>
        </div>
        <div class="input-group mb-3 d-flex justify-content-center">
            <div class="mb-6">
                <label for="role">Role</label>
              <select class="form-control" name="role" id="role">
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
                <option id="role" value="1">Admin</option>
                <option id="role" value="0">Parceiro</option>
                @else
                <option id="role" value="0">Parceiro</option>
                <option id="role" value="1">Admin</option>
                @endif
              </select>
            </div>
            </div>


        <div style="align-items: center" class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Editar</button>
        </div>

        </div>
        </form>

        </div>
        </div>
@stop

@section('content')

  <div class="row">

  </div>
<hr>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
 $(document).ready(function () {
 var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                switch (e.srcElement.id) {
                    case "name":
                        e.target.setCustomValidity("Prencha o Nome do Utilizador");
                        break;
                    case "email":
                        e.target.setCustomValidity("Prencha o email do Utilizador, tem de conter @");
                        break;

            }
        };
        elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
        };
    }
})


    var password = document.getElementById("password")
  , confirm_password = document.getElementById("rePassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("As Senhas não são iguais");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
@stop

