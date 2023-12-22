@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Unidade do Produto</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Estoque</li>
                <li class="breadcrumb-item active" aria-current="page">Unidade do Produto</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Lista de Unidades</h3>
                    @if ($hakTambah > 0)
                        <div>
                            <a class="modal-effect btn btn-primary-light" data-bs-effect="effect-super-scaled"
                                data-bs-toggle="modal" href="#modaldemo8">Adicionar
                                <i class="fe fe-plus"></i></a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" width="100%"
                            class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <th class="border-bottom-0" width="1%">No</th>
                                <th class="border-bottom-0">Unidade</th>
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

    @include('Admin.Satuan.tambah')
    @include('Admin.Satuan.edit')
    @include('Admin.Satuan.hapus')

    <script>
        function update(data) {
            $("input[name='idsatuanU']").val(data.satuan_id);
            $("input[name='satuanU']").val(data.satuan_nama.replace(/_/g, ' '));
            $("textarea[name='ketU']").val(data.satuan_keterangan.replace(/_/g, ' '));
        }

        function hapus(data) {
            $("input[name='idsatuan']").val(data.satuan_id);
            $("#vsatuan").html("satuan " + "<b>" + data.satuan_nama.replace(/_/g, ' ') + "</b>");
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
                "order": [],
                "stateSave": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "pageLength": 10,

                lengthChange: true,

                "ajax": {
                    "url": "{{ route('satuan.getsatuan') }}",
                },

                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'satuan_nama',
                        name: 'satuan_nama',
                    },
                    {
                        data: 'ket',
                        name: 'satuan_keterangan',
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
