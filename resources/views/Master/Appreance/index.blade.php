@extends('Master.Layouts.app', ['title' => $title])


@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Aparência/Tema</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Configurações</li>
            <li class="breadcrumb-item active" aria-current="page">Aparência/Tema</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Layout Menu</h3>
            </div>
            <form action="{{url('admin/appreance/layout')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="selectgroup selectgroup-pills d-flex justify-content-center">
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="layout" value="sidebar-mini" class="selectgroup-input" {{$data->appreance_layout == 'sidebar-mini' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="layout" value="sidebar-mini" class="selectgroup-input" checked>
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-layout fs-40 d-block my-4"></i>
                                        Layout Vertical
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="layout" value="horizontal" class="selectgroup-input" {{$data->appreance_layout == 'horizontal' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="layout" value="horizontal" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-layout fs-40 d-block my-4"></i>
                                        Layout Horizontal
                                    </div>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Ajustar Aparência</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Tema</h3>
            </div>
            <form action="{{url('admin/appreance/theme')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="selectgroup selectgroup-pills d-flex justify-content-center">
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="theme" value="light-mode" class="selectgroup-input" {{$data->appreance_theme == 'light-mode' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="theme" value="light-mode" class="selectgroup-input" checked>
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-sun fs-40 d-block my-4"></i>
                                        Modo Claro
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="theme" value="dark-mode" class="selectgroup-input" {{$data->appreance_theme == 'dark-mode' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="theme" value="dark-mode" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-moon fs-40 d-block my-4"></i>
                                        Modo Escuro
                                    </div>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Ajustar Visualização</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Cor do Menu</h3>
            </div>
            <form action="{{url('admin/appreance/menu')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="selectgroup selectgroup-pills d-flex justify-content-center">
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="menu" value="light-menu" class="selectgroup-input" {{$data->appreance_menu == 'light-menu' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="menu" value="light-menu" class="selectgroup-input" checked>
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Branco
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="menu" value="color-menu" class="selectgroup-input" {{$data->appreance_menu == 'color-menu' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="menu" value="color-menu" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Verde
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="menu" value="dark-menu" class="selectgroup-input" {{$data->appreance_menu == 'dark-menu' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="menu" value="dark-menu" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Azul Escuro
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="menu" value="gradient-menu" class="selectgroup-input" {{$data->appreance_menu == 'gradient-menu' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="menu" value="gradient-menu" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Gradiente
                                    </div>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Ajustar Aparência</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Cor do Cabeçalho</h3>
            </div>
            <form action="{{url('admin/appreance/header')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="selectgroup selectgroup-pills d-flex justify-content-center">
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="header" value="header-light" class="selectgroup-input" {{$data->appreance_header == 'header-light' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="header" value="header-light" class="selectgroup-input" checked>
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Branco
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="header" value="color-header" class="selectgroup-input" {{$data->appreance_header == 'color-header' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="header" value="color-header" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Verde
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="header" value="dark-header" class="selectgroup-input" {{$data->appreance_header == 'dark-header' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="header" value="dark-header" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Azul Escuro
                                    </div>
                                </span>
                            </label>
                            <label class="selectgroup-item">
                                @if($data != '')
                                <input type="radio" name="header" value="gradient-header" class="selectgroup-input" {{$data->appreance_header == 'gradient-header' ? 'checked' : ''}}>
                                @else
                                <input type="radio" name="header" value="gradient-header" class="selectgroup-input">
                                @endif
                                <span class="selectgroup-button">
                                    <div>
                                        <i class="fe fe-circle fs-40 d-block my-4"></i>
                                        Gradiente
                                    </div>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Ajustar Aparência</button>
                </div>
            </form>
        </div>
    </div>
    @if($data != '')
    <div class="col-md-6 {{$data->appreance_layout == 'sidebar-mini' ? '' : 'd-none'}}">
        @else
        <div class="col-md-6">
            @endif
            <div class="card mb-5">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Estilo do Menu Lateral</h3>
                </div>
                <form action="{{url('admin/appreance/sidestyle')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="selectgroup selectgroup-pills d-flex justify-content-center">
                                <label class="selectgroup-item">
                                    @if($data != '')
                                    <input type="radio" name="sidestyle" value="default-menu" class="selectgroup-input" {{$data->appreance_sidestyle == 'default-menu' ? 'checked' : ''}}>
                                    @else
                                    <input type="radio" name="sidestyle" value="default-menu" class="selectgroup-input" checked>
                                    @endif
                                    <span class="selectgroup-button">
                                        <div>
                                            <i class="fe fe-layout fs-40 d-block my-4"></i>
                                            Menu Padrão
                                        </div>
                                    </span>
                                </label>
                                <label class="selectgroup-item">
                                    @if($data != '')
                                    <input type="radio" name="sidestyle" value="sidenav-toggled" class="selectgroup-input" {{$data->appreance_sidestyle == 'sidenav-toggled' ? 'checked' : ''}}>
                                    @else
                                    <input type="radio" name="sidestyle" value="sidenav-toggled" class="selectgroup-input">
                                    @endif
                                    <span class="selectgroup-button">
                                        <div>
                                            <i class="fe fe-layout fs-40 d-block my-4"></i>
                                            Sobreposição de Ícone
                                        </div>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Ajustar Aparência</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')

    @endsection