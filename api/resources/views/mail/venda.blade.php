<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<div class="invoice p-3 mb-3">

    <div class="row">
    <div class="col-12">
    <h4>
    <i class="fas fa-globe"></i> Cheers To Go
    <small class="float-right">Date: {{$vendas->venda->created_at}}</small>
    </h4>
    </div>

    </div>

    <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
    From
    <address>
    <strong>{{$vendas->user->name}}</strong><br>
    {{-- 795 Folsom Ave, Suite 600<br>
    San Francisco, CA 94107<br>
    Phone: (804) 123-5432<br> --}}
    Email: {{$vendas->user->email}}
    </address>
    </div>

    <div class="col-sm-4 invoice-col">
    To
    <address>
    <strong>{{$vendas->client->name}}</strong><br>
    {{-- 795 Folsom Ave, Suite 600<br>
    San Francisco, CA 94107<br>
    Phone: (555) 539-1037<br> --}}
    Email: {{$vendas->client->email}}
    </address>
    </div>

    <div class="col-sm-4 invoice-col">
    <b>Venda: #{{$vendas->venda->id}}</b><br>
    <b>Jogo:</b> {{$vendas->jogo->nome}} <br>
    </div>

    </div>




    </div>




    </div>
