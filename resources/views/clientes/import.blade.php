@extends('layouts.admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-file-excel text-success">
                </i>
            </div>
            <div><strong>Importar Planilha</strong>
            </div>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="">
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <em><strong>Formatos válidos: *.xlxs; *.xls<strong></em><br>

                            <input id="planilha" type="file" name="planilha"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <div style="height:30px;">
                            </div>
                            <button type="" class=" mt-2 btn btn-secondary">Cancelar</button>
                            <button type="submit" class=" mt-2 btn btn-primary" name="Submit">Enviar</button>
                        </div>
                        <div class="form-group col-md-12">
                            <strong>Importação de Dados dos Clientes <strong>
                            <h6>
                                <br> Selecione o arquivo Excel com os dados 
                                <br> dos seus clientes e envie para o sistema
                                <br> utilizando a planilha padrão. 
                                <br>Clique no botão abaixo para fazer 
                                <br>o download da planilha.
                                <br>

                                <?php $arquivo = "planilha_padrao_contaut.xlsx";
                                $nome_arquivo = "<strong>Planilha Padrão<strong>";
                                echo "<label style='margin-top:15px;' id=selected><a class='btn btn-success' 
                                href='uploads/" . $arquivo . "' download='$arquivo'>" . $nome_arquivo . "</a></label>";   
                                ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection