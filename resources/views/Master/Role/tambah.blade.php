<!-- MODAL EFFECTS -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Adicionar Função</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('role.store') }}" name="myForm" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Usuário</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="form-label">Descrição</label>
                        <textarea name="desc" id="desc" rows="4" class="form-control" placeholder="Descrição.."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar <i class="fe fe-check"></i></button>
                    <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cancelar <i class="fe fe-x"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        const title = document.forms["myForm"]["title"].value;

        if (title == '') {
            validasi('Usuário deve ser preenchido!', 'warning');
            $("input[name='title']").addClass('is-invalid');
            return false;
        }

    }
</script>