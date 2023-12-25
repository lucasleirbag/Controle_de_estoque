<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Adicionar Tipo</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="jenisbarang" class="form-label">Tipo <span class="text-danger">*</span></label>
                    <input type="text" name="jenisbarang" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="ket" class="form-label">Descrição</label>
                    <textarea name="ket" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Carregando...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSalvar" class="btn btn-primary">Salvar <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Cancelar <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formTambahJS')
<script>
    function checkForm() {
        const jenis = $("input[name='jenisbarang']").val();
        setLoading(true);
        resetValid();

        if (jenis == "") {
            validasi('O Tipo do Produto deve ser preenchido!', 'warning');
            $("input[name='jenisbarang']").addClass('is-invalid');
            setLoading(false);
            return false;
        } else {
            submitForm();
        }
    }

    function submitForm() {
        const jenis = $("input[name='jenisbarang']").val();
        const ket = $("textarea[name='ket']").val();

        $.ajax({
            type: 'POST',
            url: "{{route('jenisbarang.store')}}",
            enctype: 'multipart/form-data',
            data: {
                jenisbarang: jenis,
                ket: ket
            },
            success: function(data) {
                $('#modaldemo8').modal('toggle');
                swal({
                    title: "Adicionado com sucesso!",
                    type: "success"
                });
                table.ajax.reload(null, false);
                reset();
                
            }
        });
    }

    function resetValid() {
        $("input[name='jenisbarang']").removeClass('is-invalid');
        $("textarea[name='ket']").removeClass('is-invalid');
    };

    function reset() {
        resetValid();
        $("input[name='jenisbarang']").val('');
        $("textarea[name='ket']").val('');
        setLoading(false);
    }

    function setLoading(bool) {
        if (bool == true) {
            $('#btnLoader').removeClass('d-none');
            $('#btnSalvar').addClass('d-none');
        } else {
            $('#btnSalvar').removeClass('d-none');
            $('#btnLoader').addClass('d-none');
        }
    }
</script>
@endsection