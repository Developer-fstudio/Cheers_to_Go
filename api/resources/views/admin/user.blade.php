@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')

@stop

@section('content')
<div anchor="users" class="card card-indigo">
    <div class="card-header">
    <h3 class="card-title">Criar Utilizador</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">


<div class="card-body table-responsive p-0" style="height: 400px;">
    <form action="/create/user" method="post">
        @csrf
    <div class="input-group mb-3">
    <input id="name" name="name" type="text" class="form-control" placeholder="Nome" required>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-user"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input id="password" name="password" type="password" class="form-control" placeholder="Senha" required>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input id="rePassword" name="rePassword" type="password" class="form-control" placeholder="Senha" required>
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
            <option id="role" value="0">Parceiro</option>
            <option id="role" value="1">Admin</option>
          </select>
        </div>
        </div>

        <div class="row align-items-center">
            <div class="col-3 mx-auto">
                <button type="submit" class="btn btn-primary btn-block">Criar</button>
            </div>
        </div>
    </div>
</div>

    </div>
    </form>
</div>

</div>

</div>
</div>
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
                    case "password":
                        e.target.setCustomValidity("Prencha a senha do Utilizador");
                        break;

                    case "rePassword":
                        e.target.setCustomValidity("Prencha a cofirmação da senha do Utilizador");
                        break;
                }
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

