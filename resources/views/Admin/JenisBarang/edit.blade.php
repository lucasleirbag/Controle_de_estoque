<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Editar Local</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idjenisbarangU">
                <div class="form-group">
                    <label for="jenisbarangU" class="form-label">Nome do Local <span class="text-danger">*</span></label>
                    <input type="text" name="jenisbarangU" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="ketU" class="form-label">Descrição</label>
                    <textarea name="ketU" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSalvarU" class="btn btn-success">Salvar Alterações <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Cancelar <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
<script>
    function checkFormU() {
        const jenis = $("input[name='jenisbarangU']").val();
        setLoadingU(true);
        resetValidU();

        if (jenis == "") {
            validasi('Jenis Barang wajib di isi!', 'warning');
            $("input[name='jenisbarangU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        } else {
            submitFormU();
        }
    }

    function submitFormU() {
        const id = $("input[name='idjenisbarangU']").val();
        const jenis = $("input[name='jenisbarangU']").val();
        const ket = $("textarea[name='ketU']").val();

        $.ajax({
            type: 'POST',
            url: "{{url('admin/jenisbarang/proses_ubah')}}/" + id,
            enctype: 'multipart/form-data',
            data: {
                jenisbarang: jenis,
                ket: ket
            },
            success: function(data) {
                swal({
                    title: "Alterado com sucesso!",
                    type: "success"
                });
                $('#Umodaldemo8').modal('toggle');
                table.ajax.reload(null, false);
                resetU();
            }
        });
    }

    function resetValidU() {
        $("input[name='jenisbarangU']").removeClass('is-invalid');
        $("textarea[name='ketU']").removeClass('is-invalid');
    };

    function resetU() {
        resetValidU();
        $("input[name='idjenisbarangU']").val('');
        $("input[name='jenisbarangU']").val('');
        $("textarea[name='ketU']").val('');
        setLoadingU(false);
    }

    function setLoadingU(bool) {
        if (bool == true) {
            $('#btnLoaderU').removeClass('d-none');
            $('#btnSalvarU').addClass('d-none');
        } else {
            $('#btnSalvarU').removeClass('d-none');
            $('#btnLoaderU').addClass('d-none');
        }
    }
</script>
@endsection