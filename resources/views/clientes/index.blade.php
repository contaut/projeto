@extends('layouts.admin')
@section('content')
<!--<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">-->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-happy-itmeo">
        </i>
      </div>
      <div><strong>Clientes</strong>
      </div>
    </div>
  </div>
</div>
@if(session('mensagem'))
<div class="alert alert-success"><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Sucesso!</strong>
  <p>{{session('mensagem')}}</p>
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Lista de Clientes</h5>
        @if(count($clientes)>0)
        <table id="cliente" class="mb-0 table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CNPJ</th>
              <th>CGA</th>
              <th>Uniprofissional</th>
              <th>Qtd Sócios</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente)
            <tr>
              <td> {{ $cliente->nome }} </td>
              <td> {{ $cliente->cnpj }} </td>
              <td> {{ $cliente->cga }} </td>
              <td> {{ $cliente->uniprofissional === "N" ? "Não" : "Sim" }} </td>
              <td> {{ $cliente->qtd_socios > 0 ? $cliente->qtd_socios : "-" }} </td>
              <td>
                <a href="{{ route ('clientes.edit', $cliente['id'] ) }}" title="Editar"><i class="fas fa-edit"></i></a>
                <a href="/cliente/delete/{{$cliente->id}}" title="Apagar" class="delete-confirm required_input"><i
                    class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Você tem certeza?',
        text: 'Esse registro será apagado permanentemente!',
        icon: 'warning',
        buttons: ["Cancelar", "Sim"],
        closeOnClickOutside: false,
        dangerMode: true,
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
  $(function () {
$('#cliente').DataTable({
  dom: 'Bfrtip',
  "paging": true,
  "ordering": true,
  "info": true,
 // "autoWidth": false,
  'columnDefs': [
  {
        "targets": 2, // your case first column
        "className": "text-center",
  },
  {
        "targets": 3,
        "className": "text-center",
  },
  {
        "targets": 4,
        "className": "text-center",
  },
  { "orderable": false, 
  "targets": 5 
  }],
  buttons: [
            'excelHtml5',
            'csvHtml5'
        ],
  "language": {
  "sEmptyTable":   "Não foi encontrado nenhum registo",
  "sLoadingRecords": "A carregar...",
  "sProcessing":   "A processar...",
  "sLengthMenu":   "Mostrar _MENU_ registos",
  "sZeroRecords":  "Não foram encontrados resultados",
  "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
  "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
  "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
  "sInfoPostFix":  "",
  "sSearch":       "Procurar:",
  "sUrl":          "",
  "oPaginate": {
      "sFirst":    "Primeiro",
      "sPrevious": "Anterior",
      "sNext":     "Próximo",
      "sLast":     "Último"
  },
  "oAria": {
      "sSortAscending":  ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
  }

    },
});
$('div.dataTables_filter input').focus()
});
</script>
@endsection