@extends('adminlte::page')

@section('title', 'Cheers To Go')

@section('content_header')
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
<div class="row">
    <div class="col-12">

<div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">Tickets</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>


    </div>
    </div>
    <div class="card-body">


<div class="card-body table-responsive p-0" style="height: 300px;">
    <table id="codes" class="table table-bordered table-hover dataTable dtr-inline collapsed" style="width:100%">
        <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">Ticket</th>
                <th scope="col">Game Id</th>
                <th scope="col">validUntil</th>
                <th scope="col">password</th>
                <th scope="col">username</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket['id']}}</td>
                <td>{{ $ticket['gameId']}}></td>
                <td>{{ $ticket['updated']['at']}}</td>
                <td>{{ $ticket['password']}}</td>
                <td>{{ $ticket['username']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

    </div>

    </div>





@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#codes').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-PT.json'
        },
        "lengthMenu": [[5,10, 50,100,200,300,400,500, -1], [5, 10, 50,100,200,300,400,500, "Todos"]]
    });
} );
</script>

@stop
