@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
    <h1>Definições de Empresa : {{$empresa->name}}</h1>
    <hr>
@stop

@section('content')

@if ($message = Session::get('success'))
<script>
    var message = @json($message);
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: message,
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
@if ($message = Session::get('danger'))
<script>
    var message = @json($message);
    Swal.fire({
  position: 'top-end',
  icon: 'warning',
  title: message,
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
Geral
 </h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="/empresa/{{$empresa->id}}" method="POST">
            @csrf
            @method('PUT')
           <div class="mb-4">
             <label for="name" class="form-label">Nome</label>
             <input id="name" name="name" type="text" class="form-control" @if($user->role != 'admin')disabled @endif value="{{$empresa->name}}">
           </div>
           <div class="mb-4">
             <label for="email" class="form-label">email</label>
             <input id="email" name="email" type="text" class="form-control" @if($user->role != 'admin')disabled @endif  value="{{$empresa->email}}">
           </div>
           <div class="mb-4">
             <label for="NIF" class="form-label">NIF</label>
             <input id="NIF" name="NIF" type="text" class="form-control" @if($user->role != 'admin')disabled @endif  value="{{$empresa->NIF}}">
           </div>

         {{--
           <hr>
           <h4>Definições de envio de Mensagens</h4>
           <hr>

           <div>
               <div class="container text-center">
                 <div class="row align-items-start">
                   <div class="col">
                     <label for="MsgAniversario" class="form-label">Mensagem de texto do aniversario</label>
                     <input id="MsgAniversario" name="MsgAniversario" type="text" class="form-control" value="{{$empresa->MsgAniversario}}">
                   </div>
                   <div class="col">
                     <label for="horaMsgAniversario" class="form-label">Horário da Mensagem</label>
                     <input id="horaMsgAniversario" name="horaMsgAniversario" type="time" class="form-control" value="{{$empresa->horaMsgAniversario}}">
                   </div>
                 </div>
               </div>
           </div>

           <hr>
           <div class="ui checkbox">
             <h2>Twilio
                 <input type="checkbox" tabindex="0" class="hidden" id="IsTwilioActive" name="IsTwilioActive" @checked(old('active', $empresa->IsTwilioActive))>
             </h2>
           </div>

           <hr>
           <div class="mb-4">
             <label for="TwilioAccountPhone" class="form-label">Twilio Phone Number</label>
             <input id="TwilioAccountPhone" name="TwilioAccountPhone" type="text" class="form-control" value="{{$empresa->TwilioAccountPhone}}">
           </div>
           <div class="mb-4">
             <label for="TwilioAccountID" class="form-label">Twilio Account ID</label>
             <input id="TwilioAccountID" name="TwilioAccountID" type="text" class="form-control" value="{{$empresa->TwilioAccountID}}">
           </div>
           <div class="mb-4">
             <label for="TwilioAccountSecret" class="form-label">Twilio Account Secret</label>
             <input id="TwilioAccountSecret" name="TwilioAccountSecret" type="password" class="form-control" value="{{$empresa->TwilioAccountSecret}}">
           </div>
           <hr>

           <div class="ui checkbox">
             <h2>Sms Express
                 <input type="checkbox" tabindex="0" class="hidden" id="IsAlticeActive" name="IsAlticeActive" @checked(old('active', $empresa->IsAlticeActive))>
             </h2>
           </div>
           <hr>
           <div class="mb-4">
             <label for="AlticeUrlApi" class="form-label">Altice Api Url</label>
             <input id="AlticeUrlApi" name="AlticeUrlApi" type="text" class="form-control" value="{{$empresa->AlticeUrlApi}}">
           </div>
           <div class="mb-4">
             <label for="AlticeAccountID" class="form-label">Altice Account ID</label>
             <input id="AlticeAccountID" name="AlticeAccountID" type="text" class="form-control" value="{{$empresa->AlticeAccountID}}">
           </div>
           <div class="mb-4">
             <label for="AlticeAccountSecret" class="form-label">Altice Account Secret</label>
             <input id="AlticeAccountSecret" name="AlticeAccountSecret" type="password" class="form-control" value="{{$empresa->AlticeAccountSecret}}">
           </div>
           <hr> --}}
           <div class="right">
             @if($user->role == 'admin')
         <a href="/empresa" class="btn btn-secondary">Cancelar</a>
         <button type="submit" class="btn btn-primary">Guardar</button>
         @endif
           </div>
         </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

