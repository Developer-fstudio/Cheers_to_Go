@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
    <h1>Recibo</h1>
@stop
@section('content')
<div class="invoice p-3 mb-3">

    <div class="row">
    <div class="col-12">
    <h4>
    <i class="fas fa-globe"></i> Cheers To Go
    <small class="float-right">Date: {{$vendas->dataVenda}}</small>
    </h4>
    </div>

    </div>

    <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
    From
    <address>
    <strong>{{$vendas->u_name}}</strong><br>
    {{-- 795 Folsom Ave, Suite 600<br>
    San Francisco, CA 94107<br>
    Phone: (804) 123-5432<br> --}}
    Email: {{$vendas->u_mail}}
    </address>
    </div>

    <div class="col-sm-4 invoice-col">
    To
    <address>
    <strong>{{$vendas->c_name}}</strong><br>
    {{-- 795 Folsom Ave, Suite 600<br>
    San Francisco, CA 94107<br>
    Phone: (555) 539-1037<br> --}}
    Email: {{$vendas->c_mail}}
    </address>
    </div>

    <div class="col-sm-4 invoice-col">
    <b>Venda: #{{$vendas->v_id}}</b><br>
    <b>Jogo:</b> {{$vendas->nome}} <br>
    </div>

    </div>




    </div>




    <div class="row no-print">
    <div class="col-12">
    <button type="button" class="btn btn-info float-right" style="margin-right: 5px;">
    <i class="fas fa-email"></i> Enviar Email
    </button>
    </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://jogo.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
</script>

@stop
