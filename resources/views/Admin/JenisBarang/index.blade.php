@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Locais</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Estoque</li>
                <li class="breadcrumb-item active" aria-current="page">Local</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Lista de Locais</h3>
                    @if ($hakTambah > 0)
                        <div>
                            <a class="modal-effect btn btn-primary-light"
                                data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Adicionar
                                <i class="fe fe-plus"></i></a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" width="100%"
                            class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <th class="border-bottom-0" width="1%">ID</th>
                                <th class="border-bottom-0">Nome do Local</th>
                                <th class="border-bottom-0">Descrição</th>
                                <th class="border-bottom-0" width="1%">Ação</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    @include('Admin.JenisBarang.tambah')
    @include('Admin.JenisBarang.edit')
    @include('Admin.JenisBarang.hapus')

    <script>
        function update(data) {
            $("input[name='idjenisbarangU']").val(data.jenisbarang_id);
            $("input[name='jenisbarangU']").val(data.jenisbarang_nama.replace(/_/g, ' '));
            $("textarea[name='ketU']").val(data.jenisbarang_ket.replace(/_/g, ' '));
        }

        function hapus(data) {
            $("input[name='idjenisbarang']").val(data.jenisbarang_id);
            $("#vjenisbarang").html("jenis " + "<b>" + data.jenisbarang_nama.replace(/_/g, ' ') + "</b>");
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

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table;
        $(document).ready(function() {
            //datatables
            table = $('#table-1').DataTable({

                "processing": true,
                "serverSide": true,
                "info": true,
                "stateSave":true,
                "order": [],
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "pageLength": 10,

                lengthChange: true,

                "ajax": {
                    "url": "{{ route('jenisbarang.getjenisbarang') }}",
                },

                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'jenisbarang_nama',
                        name: 'jenisbarang_nama',
                    },
                    {
                        data: 'ket',
                        name: 'jenisbarang_ket',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });

        });
    </script>
@endsection
