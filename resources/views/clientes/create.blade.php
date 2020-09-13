@extends('layouts.admin')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user text-info">
                </i>
            </div>
            <div><strong>Cadastrar Cliente</strong>
            </div>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="nome" class="">Nome/Razão
                                    Social</label><input name="nome" id="nome" placeholder="Digite aqui o nome" type="text"
                                    class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="cnpj" class="">CNPJ</label><input
                                    name="cnpj" id="cnpj" placeholder="Digite aqui o CNPJ" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="senha" class="">Senha</label><input
                                    name="senha" id="senha" placeholder="Digite aqui a senha" type="password"
                                    class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="cga" class="">CGA/Inscrição
                                    Municipal</label><input name="cga" id="Digite aqui o CGA" placeholder="Informe o CGA" type="text"
                                    class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="uniprofissional"
                                    class="">Uniprofissional?</label><select class="form-control" id="uniprofissional"
                                    name="uniprofissional">

                                    <option value="0">Não</option>

                                    <option value="1">Sim</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="qtd_socios" class="">Quantidade de
                                    sócios</label><input name="qtd_socios" id="qtd_socios" type="number"
                                    class="form-control" placeholder="Digite aqui a quantidade de sócios"></div>
                        </div>
                    </div>
                    <button type="" class="mt-2 btn btn-secondary">Cancelar</button>
                    <button class="mt-2 btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection