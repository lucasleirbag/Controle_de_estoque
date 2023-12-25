@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Relatório Saída de Produtos</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Relatório</li>
            <li class="breadcrumb-item active" aria-current="page">Saída de Produtos</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Lista de Saídas</h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="" class="fw-bold">Filtrar por Data</label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="tglawal" class="form-control datepicker-date" placeholder="Data Inicial">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="tglakhir" class="form-control datepicker-date" placeholder="Data Final">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success-light" onclick="filter()"><i class="fe fe-filter"></i> Filtro</button>
                        <button class="btn btn-secondary-light" onclick="reset()"><i class="fe fe-refresh-ccw"></i> Atualizar</button>
                        <button class="btn btn-primary-light" onclick="print()"><i class="fe fe-printer"></i> Imprimir</button>
                        <button class="btn btn-danger-light" onclick="pdf()"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-1" class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <th class="border-bottom-0" width="1%">No</th>
                            <th class="border-bottom-0">Data de Saída</th>
                            <th class="border-bottom-0">Código Saída de Produtos</th>
                            <th class="border-bottom-0">Número do Pedido</th>
                            <th class="border-bottom-0">Produto</th>
                            <th class="border-bottom-0">Quantidade</th>
                            <th class="border-bottom-0">Destino</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        getData();
    });

    function getData() {
        //datatables
        table = $('#table-1').DataTable({

            "processing": true,
            "serverSide": true,
            "info": true,
            "order": [],
            "scrollX": true,
            "stateSave": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'Semua']
            ],
            "pageLength": 10,

            lengthChange: true,

            "ajax": {
                "url": "{{ route('lap-bk.getlap-bk') }}",
                "data": function(d) {
                    d.tglawal = $('input[name="tglawal"]').val();
                    d.tglakhir = $('input[name="tglakhir"]').val();
                }
            },

            "columns": [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'tgl',
                    name: 'bk_tanggal',
                },
                {
                    data: 'bk_kode',
                    name: 'bk_kode',
                },
                {
                    data: 'barang_kode',
                    name: 'barang_kode',
                },
                {
                    data: 'barang',
                    name: 'barang_nama',
                },
                {
                    data: 'bk_jumlah',
                    name: 'bk_jumlah',
                },
                {
                    data: 'tujuan',
                    name: 'bk_tujuan',
                },
            ],

        });
    }

    function filter() {
        var tglawal = $('input[name="tglawal"]').val();
        var tglakhir = $('input[name="tglakhir"]').val();
        if (tglawal != '' && tglakhir != '') {
            table.ajax.reload(null, false);
        } else {
            validasi("Preencha primeiro o formulário de filtro de datas!", 'warning');
        }

    }

    function reset() {
        $('input[name="tglawal"]').val('');
        $('input[name="tglakhir"]').val('');
        table.ajax.reload(null, false);
    }

    function print() {
        var tglawal = $('input[name="tglawal"]').val();
        var tglakhir = $('input[name="tglakhir"]').val();
        if (tglawal != '' && tglakhir != '') {
            window.open(
                "{{route('lap-bk.print')}}?tglawal=" + tglawal + "&tglakhir=" + tglakhir,
                '_blank'
            );
        } else {
            swal({
                title: "Tem certeza que quer imprimir todos os dados?",
                type: "warning",
                buttons: true,
                dangerMode: true,
                confirmButtonText: "Sim",
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showConfirmButton: true,
                closeOnConfirm: false,
                confirmButtonColor: '#09ad95',
            }, function(value) {
                if (value == true) {
                    window.open(
                        "{{route('lap-bk.print')}}",
                        '_blank'
                    );
                    swal.close();
                }
            });

        }

    }

    function pdf() {
        var tglawal = $('input[name="tglawal"]').val();
        var tglakhir = $('input[name="tglakhir"]').val();
        if (tglawal != '' && tglakhir != '') {
            window.open(
                "{{route('lap-bk.pdf')}}?tglawal=" + tglawal + "&tglakhir=" + tglakhir,
                '_blank'
            );
        } else {
            swal({
                title: "Tem certeza que quer exportar todos os dados para PDF?",
                type: "warning",
                buttons: true,
                dangerMode: true,
                confirmButtonText: "Sim",
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showConfirmButton: true,
                closeOnConfirm: false,
                confirmButtonColor: '#09ad95',
            }, function(value) {
                if (value == true) {
                    window.open(
                        "{{route('lap-bk.pdf')}}",
                        '_blank'
                    );
                    swal.close();
                }
            });

        }

    }

    function validasi(judul, status) {
        swal({
            title: judul,
            type: status,
            confirmButtonText: "Sim."
        });
    }
</script>
@endsection