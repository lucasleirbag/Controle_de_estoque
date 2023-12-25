<!-- MODAL EFFECTS -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Alterar Função</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" name="myFormU" id="myFormU" enctype="multipart/form-data" onsubmit="return validateFormUpdate()">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="utitle" class="form-label">Usuário</label>
                        <input type="text" id="utitle" name="utitle" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="udesc" class="form-label">Descrição</label>
                        <textarea name="udesc" id="udesc" rows="4" class="form-control" placeholder="Descrição.."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar <i class="fe fe-check"></i></button>
                    <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cancelar <i class="fe fe-x"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateFormUpdate() {
        const title = document.forms["myForm"]["utitle"].value;

        if (title == '') {
            validasi('Usuário deve ser preenchido!', 'warning');
            $("input[name='utitle']").addClass('is-invalid');
            return false;
        }

    }
</script>