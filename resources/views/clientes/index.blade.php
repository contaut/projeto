@extends('layouts.admin')
@section('content')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">


<!--<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">-->
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
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Lista de Clientes</h5>
        <table id="cliente" class="mb-0 table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CNPJ</th>
              <th>CJA</th>
              <th>U.Prof</th>
              <th>Qtd Sócios</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>xx</td>
              <td>xx</td>
              <td>xx</td>
              <td>Sim</td>
              <td>4</td>
              <td>
                <div>
                  <div>
                    <a class="btn btn-sm btn-warning" style="float: left;" href="(LINK)">Editar <span
                        class="btn-icon-right"><i class="fa fa-edit"></i></span></a>
                  </div>
                  <div>
                    <form action="#" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" style="margin-left:5px; float: left;">Apagar
                        <span class="btn-icon-right"><i class="fa fa-trash"></i></span></a>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>xx</td>
              <td>xx</td>
              <td>xx</td>
              <td>Sim</td>
              <td>4</td>
              <td>
                <div>
                  <div>
                    <a class="btn btn-sm btn-warning" style="float: left;" href="(LINK)">Editar <span
                        class="btn-icon-right"><i class="fa fa-edit"></i></span></a>
                  </div>
                  <div>
                    <form action="#" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" style="margin-left:5px; float: left;">Apagar
                        <span class="btn-icon-right"><i class="fa fa-trash"></i></span></a>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>xx</td>
              <td>xx</td>
              <td>xx</td>
              <td>Sim</td>
              <td>4</td>
              <td>
                <div>
                  <div>
                    <a class="btn btn-sm btn-warning" style="float: left;" href="(LINK)">Editar <span
                        class="btn-icon-right"><i class="fa fa-edit"></i></span></a>
                  </div>
                  <div>
                    <form action="#" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" style="margin-left:5px; float: left;">Apagar
                        <span class="btn-icon-right"><i class="fa fa-trash"></i></span></a>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(function () {
$('#cliente').DataTable({
  "paging": true,
  "ordering": false,
  "info": true,
  buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "aoColumnDefs": [
      { "sWidth": "150px", "aTargets": [0],
      "sWidth": "100px", "aTargets": [1],
      "sWidth": "60px", "aTargets": [2],
      "sWidth": "30px", "aTargets": [3],
      } 
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
      "sNext":     "Seguinte",
      "sLast":     "Último"
  },
  "oAria": {
      "sSortAscending":  ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
  }

    },
});
});
</script>
@endsection