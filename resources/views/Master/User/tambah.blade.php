<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Adicionar Usuário</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('user.store') }}" name="myForm" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="nmlengkap" class="form-label">Nome</label>
                                <input type="text" name="nmlengkap" class="form-control" placeholder="Nome..">
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Usuário</label>
                                <input type="text" name="username" class="form-control" placeholder="Usuário..">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email@mail.com..">
                            </div>
                            <div class="form-group">
                                <label for="role" class="form-label">Função</label>
                                <select name="role" class="form-control">
                                    <option value="">-- Escolha --</option>
                                    @foreach($role as $r)
                                    <option value="{{$r->role_id}}">{{$r->role_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="form-label">Senha</label>
                                <input type="password" name="pwd" class="form-control" placeholder="Senha..">
                            </div>
                            <div class="form-group">
                                <label for="pwdU" class="form-label">Repetir Senha</label>
                                <input type="password" name="pwdU" class="form-control" placeholder="Senha..">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="title" class="form-label">Foto</label>
                                <center>
                                    <img src="{{url('/assets/default/users/undraw_profile.svg')}}" width="80%" alt="profile-user" id="outputImg" class="brround">
                                </center>
                                <input class="form-control mt-5" id="GetFile" name="photo" type="file" onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg,.svg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar <i class="fe fe-check"></i></button>
                    <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Cancelar <i class="fe fe-x"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        const namaL = document.forms["myForm"]["nmlengkap"].value;
        const user = document.forms["myForm"]["username"].value;
        const email = document.forms["myForm"]["email"].value;
        const role = document.forms["myForm"]["role"].value;
        const pwd = document.forms["myForm"]["pwd"].value;
        const kpwd = document.forms["myForm"]["pwdU"].value;

        resetValid();

        if (namaL == "") {
            validasi('Nome deve ser preenchido!', 'warning');
            $("input[name='nmlengkap']").addClass('is-invalid');
            return false;
        } else if (user == '') {
            validasi('Nome de usuário deve ser preenchido!', 'warning');
            $("input[name='username']").addClass('is-invalid');
            return false;
        } else if (email == '') {
            validasi('E-mail deve ser preenchido!', 'warning');
            $("input[name='email']").addClass('is-invalid');
            return false;
        } else if (role == '') {
            validasi('Função deve ser preenchida!', 'warning');
            $("select[name='role']").addClass('is-invalid');
            return false;
        } else if (pwd == '') {
            validasi('Senha deve ser preenchida!', 'warning');
            $("input[name='pwd']").addClass('is-invalid');
            $("input[name='pwdU']").addClass('is-invalid');
            return false;
        } else if (pwd !== '' || kpwd !== '') {

            if (pwd.length < 6) {
                validasi('A senha deve ter no mínimo 6 caracteres!', 'warning');
                $("input[name='pwd']").addClass('is-invalid');
                $("input[name='pwdU']").addClass('is-invalid');
                return false;
            } else if (pwd !== kpwd) {
                validasi('Confirmação de senha incorreta!', 'warning');
                $("input[name='pwd']").addClass('is-invalid');
                $("input[name='pwdU']").addClass('is-invalid');
                return false;
            }

        }

    }

    function resetValid() {
        $("input[name='nmlengkap']").removeClass('is-invalid');
        $("input[name='username']").removeClass('is-invalid');
        $("input[name='email']").removeClass('is-invalid');
        $("input[name='role']").removeClass('is-invalid');
        $("input[name='pwd']").removeClass('is-invalid');
        $("input[name='pwdU']").removeClass('is-invalid');
    };

    function reset() {
        resetValid();
        $("input[name='nmlengkap']").val('');
        $("input[name='username']").val('');
        $("input[name='email']").val('');
        $("input[name='role']").val('');
        $("input[name='pwd']").val('');
        $("input[name='pwdU']").val('');
        $("#outputImg").attr("src", "{{url('/assets/default/users/undraw_profile.svg')}}");
        $("#GetFile").val('');
    }

    function fileIsValid(fileName) {
        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        var isValid = true;
        switch (ext) {
            case 'png':
            case 'jpeg':
            case 'jpg':
            case 'svg':

                break;
            default:
                this.value = '';
                isValid = false;
        }
        return isValid;
    }

    function VerifyFileNameAndFileSize() {
        var file = document.getElementById('GetFile').files[0];


        if (file != null) {
            var fileName = file.name;
            if (fileIsValid(fileName) == false) {
                validasi('Format bukan gambar!', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var content;
            var size = file.size;
            if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                validasi('Ukuran maximum 1024px', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }

            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            // $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
            return true;

        } else
            return false;
    }
</script>