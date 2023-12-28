<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Editar Local</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idcustomerU">
                <div class="form-group">
                    <label for="customerU" class="form-label">Local<span class="text-danger">*</span></label>
                    <input type="text" name="customerU" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="alamatU" class="form-label">Endereço</label>
                    <textarea name="alamatU" class="form-control" rows="4"></textarea>
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
        const customer = $("input[name='customerU']").val();
        setLoadingU(true);
        resetValidU();

        if (customer == "") {
            validasi('O nome do local deve ser preenchido!', 'warning');
            $("input[name='customerU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        } else {
            submitFormU();
        }
    }

    function submitFormU() {
        const id = $("input[name='idcustomerU']").val();
        const customer = $("input[name='customerU']").val();
        const alamat = $("textarea[name='alamatU']").val();

        $.ajax({
            type: 'POST',
            url: "{{url('admin/customer/proses_ubah')}}/" + id,
            enctype: 'multipart/form-data',
            data: {
                customer: customer,
                alamat: alamat
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
        $("input[name='customerU']").removeClass('is-invalid');
        $("textarea[name='alamatU']").removeClass('is-invalid');
    };

    function resetU() {
        resetValidU();
        $("input[name='idcustomerU']").val('');
        $("input[name='customerU']").val('');
        $("textarea[name='alamatU']").val('');
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