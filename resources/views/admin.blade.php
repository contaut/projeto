@extends('layouts.admin')

@section('content')
<link href="{{ asset('assets/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<div class="row home">
    <?php
    use Carbon\Carbon;
    \Carbon\Carbon::setUtf8(true);
    setlocale(LC_TIME, 'pt_BR'); // LC_TIME é formatação de data e hora com strftime()
    $dt = Carbon::now(new DateTimeZone('America/Bahia'));
    $data_atual = $dt->formatLocalized('%A , %d de %B de %Y');
    echo ucfirst(gmstrftime($data_atual));
    ?>
</div>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Orders</div>
                    <div class="widget-subheading">Last year expenses</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Clients</div>
                    <div class="widget-subheading">Total Clients Profit</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>$ 568</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Followers</div>
                    <div class="widget-subheading">People Interested</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>46%</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Search form -->
    <div class="col-md-12">
        <div class="main-card card">
            <div class="card-header">
                <!-- Search form -->
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 amber-border" autofocus type="text" placeholder="Pesquisar"
                        aria-label="Search" id="mySearchText">
                    <div class="input-group-append">
                        <span class="input-group-text amber lighten-3" id="mySearchButton"><i
                                class="fas fa-search text-grey" aria-hidden="true">
                            </i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Search form -->
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Usuários Ativos
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <?php
                            $dt = Carbon::now(new DateTimeZone('America/Bahia'));
                            $lastMonth = $dt->subMonth(1)->formatLocalized('%B');
                            $lastMonth = ucfirst(gmstrftime($lastMonth));
                        ?>
                        <button class="active btn btn-focus">{{ $lastMonth }}</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @if(count($usuarios)>0)
                <table id="cliente" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Plano</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="text-center">
                                {{ $usuario->name }}
                            </td>
                            <td class="text-center">{{ $usuario->email }}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">1 ano</div>
                            </td>
                            <!--<td class="text-center">
                                <button type="button" id="PopoverCustomT-1"
                                    class="btn btn-primary btn-sm">Processar</button>
                            </td>-->
                            <td>
                                <form action="/script" method="post">
                                    <input type="hidden" name="id" value={{ $usuario->id }}>
                                    @csrf
                                    <button type="submit">Run Python</button>
                                </form>
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
<script src="{{ asset('assets/js/home.js') }}"></script>
@endsection