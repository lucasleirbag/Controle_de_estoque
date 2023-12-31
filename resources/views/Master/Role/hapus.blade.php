<!-- MODAL EFFECTS -->
<div class="modal fade" data-bs-backdrop="static" id="Hmodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{url('/admin/role/hapus')}}" name="myFormH" id="myFormH" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center p-4 pb-5">
                    <button type="reset" aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <br>
                    <i class="icon icon-exclamation fs-70 text-warning lh-1 my-5 d-inline-block"></i>
                    <h3 class="mb-5">Tem certeza de que deseja excluir o  <span id="vrole"></span> ?</h3>
                    <input type="hidden" name="idrole" id="idrole">
                    <button class="btn btn-danger-light pd-x-25">Sim</button>
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-default pd-x-25">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>