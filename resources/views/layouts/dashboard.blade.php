<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Omnis - SISOMNIS | Admin</title>
    <!-- Core CSS - Include with every page -->
    {!! Html::style('/assets/plugins/bootstrap/bootstrap.css') !!}
    {!! Html::style('/assets/font-awesome/css/font-awesome.css') !!}
    {!! Html::style('/assets/plugins/pace/pace-theme-big-counter.css') !!}
    {!! Html::style('/assets/css/style.css') !!}
    {!! Html::style('/assets/css/main-style.css') !!}



</head>

<body>

<!--  wrapper -->
<div id="wrapper">
    <!-- navbar top -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""  >
                <img src="/assets/img/logo.png" alt="" />
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- main dropdown -->





            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>
                </a>
                <!-- dropdown user-->
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{url("/logout")}}"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                        
                    </li>
                </ul>
                <!-- end dropdown-user -->
            </li>
            <!-- end main dropdown -->
        </ul>
        <!-- end navbar-top-links -->

    </nav>
    <!-- end navbar top -->

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
                    <!-- user image section-->
                    <div class="user-section">
                        <div class="user-section-inner">
                            <img src="/assets/img/user.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <div>{{Auth::user()->name}}</div>
                            <div class="user-text-online">

                                <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                            </div>
                        </div>
                    </div>
                    <!--end user image section-->
                </li>

                    <!-- search section
                    <div class="input-group custom-search-form">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!--end search section-->

                <li class="">
                    <a href="{{URL::to('/')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                </li>
                </li>
                <li class="">
                    <a href="/jobs"><i class="fa fa-briefcase fa-fw"></i>Jobs<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/jobs/novo">Novo Job</a>
                        </li>
                        <li>
                            <a href="/jobs">Lista de Jobs</a>
                        </li>


                    </ul>
                </li>
                <li class="">
                    <a href="/jobs"><i class="fa fa-briefcase fa-fw"></i>Cadastros<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/cadastros/candidato">Candidatos</a>
                        </li>
                        <li>
                            <a href="/cadastros/parceiros">Parceiros</a>
                        </li>
                        <li>
                            <a href="/cadastros/pracas">Praças</a>
                        </li>
                        <li>
                            <a href="/cadastros/usuarios">Usuarios</a>
                        </li>
                        <li>
                            <a href="/cadastros/funcoes">Funçoes e Cargos</a>
                        </li>


                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Financeiro<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/faturamento">Faturamento</a>
                        </li>
                        <li>
                            <a href="/reembolso">Reembolsos</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li class="">
                    <a href="http://omnis.tk/info/"><i class="fa fa-info fa-fw"></i>Instruções de uso</a>
                </li>
            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">

            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">@yield('title')</h1>
                <div>@yield('breadcrumbs')</div>
            </div>
            <!--End Page Header -->
        </div>
        <div class="row">
        @yield('content')
        </div>


    </div>
    <!-- end page-wrapper -->

</div>
<!-- end wrapper -->

<!-- Core Scripts - Include with every page -->

{!! Html::script('/assets/plugins/jquery-1.10.2.js') !!}
{!! Html::script('/assets/plugins/bootstrap/bootstrap.min.js') !!}
{!! Html::script('/assets/plugins/metisMenu/jquery.metisMenu.js') !!}

{!! Html::script('/assets/scripts/siminta.js') !!}
{!! Html::script('/assets/plugins/pace/pace.js') !!}

<script type="text/javascript">
    function formModal(tipo,id,nivel) {
        $("#"+nivel+'-'+tipo).html("Carregando...");
        $(document).ready(function () {
            $.ajax({
                url: '{{URL::to('/')}}'+'/'+nivel+'/'+id+"/"+tipo
            }).done(function (html) {

                $("#"+nivel+'-'+tipo).html(html);

            })
            $('#form_add_'+tipo).modal('show');

        });
    }
    function showModal(id) {

            $(id).modal('show');

    }
    function showDiv(div)
    {
        document.getElementById(div).style.display = 'block';
    }
    function calcularImpostos(id1,id2,id3)
    {
        var i = function (id) { return document.getElementById(id); }

        i(id3).value = parseFloat(i(id1).value)*parseFloat(i(id2).value)/100;
        calcLiquido();

    }
    function calcLiquido() {
        var i = function (id) { return document.getElementById(id); }

        i('valorliquido').value = parseFloat(i('valorfaturado').value) - parseFloat(i('iss').value)- parseFloat(i('ir').value)- parseFloat(i('inss').value)- parseFloat(i('csll').value)- parseFloat(i('pis').value)- parseFloat(i('cofins').value);
    }

    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

</script>

@yield('script')

</body>

</html>
