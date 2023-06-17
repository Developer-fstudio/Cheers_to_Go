@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
    <h1>Sem Permissão</h1>
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
$(document).ready(function() {
    $('#clients').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-PT.json'
        },
        "lengthMenu": [[5,10, 50,100,200,300,400,500, -1], [5, 10, 50,100,200,300,400,500, "Todos"]]
    });
} );
</script>

@stop
