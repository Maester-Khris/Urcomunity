@extends('layouts.app',['title'=>'Administrer le Site'])
@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/preview.css')}}">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style media="screen">
    td.job-dt {
        padding: 12px 3px;
    }
    .job-dt li {
        margin-right: 8px;
    }
    .dataTables_length, .dataTables_filter {
        display: none;
    }
    .dataTables_filter{
        /* margin-bottom: 5px; */
        transform: translateY(-40px);
    }
    td,th {
        text-align: center;
    }
    .role_action {
        text-align: left;
    }
    .table_action {
        display: inline-block
    }
    .validate_icon {
        font-size: 16px;
        margin-left: 5px;
    }
    .validate_btn {
        /* color:wheat; */
        font-size: 16px;
        height: 30px;
        width: auto;
        padding: 0 20px;
        font-weight: 600;
        background: gainsboro;
    }
    .noty-user-img img {
        height: 30px;
        width: 30px;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('/js/preview.js') }}"></script>
<script src="{{ asset('/js/postevent.js') }}"></script>
<script src="{{ asset('/js/validator.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> 
<script src="src/datatable-setting.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        let tablemem = $(".member-table").prev().show();
        let table = $(".data-table.participation").DataTable();
        table.page.len(7);
        table.draw();
        let table2 = $(".data-table.table_zone").DataTable();
        table2.page.len(4);
        table2.draw();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $("#reset_step1").click(function(e){
            e.preventDefault();
            let old_mat = $("#mem_old_matricule").val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            let data = {
                membre_matricule: old_mat,
                _token: _token
            };
            $.ajax({
                url: "/last-compte-infos",
                type:"POST",
                data:data,
                success:function(response){
                    if(response) {
                        console.log(response.last_infos)
                        $("input#nom").val(response.last_infos.nom);
                        $("input#telephone").val(response.last_infos.telephone);
                        $("input#cni").val(response.last_infos.numero_cni);
                        $("div.step_1").hide();
                        $("div.step_2").show();
                    }
                },
                error: function(error) {
                    $("div.step_1 div.alert").show();
                    // console.log(error);
                }
            });
        });
        $("#reset_step2").click(function(e){
            $("div.step_1").show();
            $("div.step_2").hide();
        });
        $("#error_message i").effect( "shake", {distance:5}, {times:4}, 1000 );
        $("button.close").click(function(e){
            $("div#error_container").hide();
        });
        $(".role_link").click(function(e){
            e.preventDefault();
            let role= $(this).find("a span").text();
            if(role.substr(-1) == "."){
                role = role.split(".");
            }
            let mat = $(this).closest("tr").find('th[scope="row"]').text();
            let data = {
                matricule: mat,
                role: role[0],
                _token: _token
            };
            $.ajax({
                url: "/remove-role",
                type:"POST",
                data:data,
                success:function(response){
                    if(response) {
                        console.log(response)
                    }
                }
            });
        });
        $(".activate_link").click(function(e){
            e.preventDefault();
            let mat = $(this).closest("tr").find('th[scope="row"]').text();
            let data = {
                matricule: mat,
                _token: _token
            };
            $.ajax({
                url: "/toggle-activate",
                type:"POST",
                data:data,
                success:function(response){
                    if(response) {
                        console.log(response)
                    }
                }
            });
        });
    });

</script>
<script>
    $('#nav-security-login-tab').click(function () {
        $('.tab-pane').removeClass('show active');
    });

</script>
<script type="text/javascript">
    $('.fund-item').hide();
    $('.fund-op1').click(function () {
        $('.fund-item').hide();
        $('.fund-item.op1').show();
    });
    $('.fund-op2').click(function () {
        $('.fund-item').hide();
        $('.fund-item.op2').show();
    });
    $('.fund-op3').click(function () {
        $('.fund-item').hide();
        $('.fund-item.op3').show();
    });
    $('.fund-op4').click(function () {
        $('.profile-bx-details').hide();
        $('.fund-item').hide();
        $('.fund-item.op4').show();
        $('.fund-item.op4 .row').show();
    })
    $('.fund-op5').click(function () {
        $('.profile-bx-details').hide();
        $('.fund-item').hide();
        $('.fund-item.op5').show();
        $('.fund-item.op5 .row').show();
    })
    $('h4 i').click(function () {
        $(this).closest('.row').hide();
        $(this).closest('.profile-bx-details').hide();
        $('.profile-bx-details').show();
    })

</script>
@endpush


@section('content')
<section class="profile-account-setting">
    @if(Session::has('error_menu'))
    <div id="error_container" class="container" style="max-width: 1270px;margin-left:30px;margin-bottom:25px;">
        <div id="error_message" class="alert alert-danger alert-dismissible fade show" role="alert" style="position:absolute;top:5px;height:45px;right:79px;z-index:900;">
            <i class="fa fa-exclamation" aria-hidden="true" style="color:#df4759;margin-right:10px;font-size:20px;float:left;"></i>
            <strong>Alerte: </strong> 
            <span id="notif_body">
                {{Session::get('error_menu') }}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="container" style="max-width: 1270px;margin-left:30px;">
        <div class="account-tabs-setting" style="padding-top: 30px;">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc"
                                role="tab" aria-controls="nav-acc" aria-selected="true"><i
                                    class="fa fa-map-marker"></i>Ajouter Zone</a>
                            <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status"
                                role="tab" aria-controls="nav-status" aria-selected="false"><i
                                    class="fa fa-address-book"></i>Ajouter Membre</a>
                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password"
                                role="tab" aria-controls="nav-password" aria-selected="false"><i
                                    class="fa fa-user-circle-o"></i>Ajouter Admin</a>
                            <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                href="#nav-notification" role="tab" aria-controls="nav-notification"
                                aria-selected="false"><i class="fa fa-refresh"></i>Reinitialiser Compte</a>
                            <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests"
                                role="tab" aria-controls="nav-requests" aria-selected="false"><i
                                    class="fa fa-group"></i>Gestion des comptes</a>
                            <a class="nav-item nav-link" id="nav-security-login-tab" data-toggle="tab"
                                href="#nav-security-login" role="tab" aria-controls="nav-security-login"
                                aria-selected="false"><i class="fa fa-bullhorn"></i>Poster un evenement</a>
                            <a class="nav-item nav-link" id="nav-privacy-tab" data-toggle="tab" href="#nav-privacy"
                                role="tab" aria-controls="nav-privacy" aria-selected="false"><i
                                    class="fa fa-check-circle"></i>Valider un evenement</a>
                            <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab"
                                href="#nav-deactivate" role="tab" aria-controls="nav-deactivate"
                                aria-selected="false"><i class="fa fa-heart"></i>Collecte de fond</a>
                            <a class="nav-item nav-link" id="nav-blockking-tab" data-toggle="tab" href="#nav-blockking"
                                role="tab" aria-controls="nav-blockking" aria-selected="false"><i
                                    class="fa fa-balance-scale"></i>Regle du groupe</a>

                        </div>
                    </div>
                    <!--acc-leftbar end-->
                </div>

                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">

                        {{-- ok --}}
                        <div class="tab-pane fade active show" id="nav-acc" role="tabpanel"
                            aria-labelledby="nav-acc-tab">
                            <div class="acc-setting" style="min-height:503px;">
                                <h3>Ajouter Zones</h3>
                                <form class="needs-validation" action="{{url('ajouter-zone')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 cp-field" style="margin-top:20px;">
                                            <h5>Nom de la zone</h5>
                                            <div class="cpp-fiel">
                                                <input class="form-control" type="text" name="localisation" placeholder="Nom complet" required>
                                                <i class="fa fa-map-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4 cp-field" style="margin-top:20px;">
                                            <h5>Identifiant de la zone</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" class="form-control" name="identifiant" placeholder="Identifiant (03 lettres)" maxlength="3" required>
                                                <i class="fa fa-map-pin"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4 save-stngs pd2" style="margin-top:20px;">
                                            <ul>
                                                <li><button type="submit">Ajouter</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>

                                <div class="pro-work-status" style="padding-left: 0;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="data-table table_zone table stripe hover nowrap table_nosearch"
                                                style="overflow-x: hidden;">
                                                <thead>
                                                    <tr>
                                                        <th class="table-plus datatable-nosort" scope="col"
                                                            style="width:25%">Identifiant</th>
                                                        <th scope="col" style="width: 25%">Localisation</th>
                                                        <th scope="col" style="width: 25%">Nombre de membre</th>
                                                        <th scope="col" style="width: 25%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($zones as $zone)
                                                    <tr>
                                                        <th scope="row">{{$zone->identifiant}}</th>
                                                        <td>{{$zone->localisation}}</td>
                                                        <td>{{$zone->membres_count}}</td>
                                                        <td class="job-dt">
                                                            <li>
                                                                <a href="#" title=""
                                                                    style="background:grey;">supprimer</a>
                                                            </li>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end table end-->
                                </div>
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                            <div class="acc-setting" style="height:503px;overflow-y:scroll;">
                                <h3>Ajouter Membres</h3>
                                <form action="{{url('ajouter-membre')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Nom du Membre</h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="name" placeholder="Nom du nouveau membre" required>
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Numero de telephone</h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="telephone" placeholder="Num telephone: 6xxxxxxxx" minlength="9" maxlength="9" required>
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Numero de CNI</h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="cni" placeholder="Num de la carte d'identité" required>
                                            <i class="fa fa-address-card"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Date d'inscription effective <small>(après payement des frais
                                                d'inscription)</small></h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="date" name="registered_date" required>
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Selectionner la zone où le membre reside</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="zone" required>
                                                <option selected>Choose...</option>
                                                @foreach($zones as $zone)
                                                <option value="{{$zone->localisation}}"> {{ $zone->localisation }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Selectionner le village où le membre est attaché</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="village" required>
                                                <option selected>Choose...</option>
                                                @foreach($villages as $village)
                                                <option value="{{$village->nom}}"> {{ $village->nom }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Ajouter la photo du membre</h5>
                                        <div class="form-group">
                                            <div class="input-group col-md-12">
                                                <input style="height:38px;width:140px;border-radius:7px 0 0 7px;"
                                                    id="fakeUploadLogo" class="form-control fake-shadow"
                                                    placeholder="Selectionner le fichier" disabled="disabled">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-danger fake-shadow"
                                                        style="border-radius:0 7px 7px 0!important;">
                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload
                                                            image</span>
                                                        <input class="attachment_upload logo-id" name="filename"
                                                            type="file" accept="image/png, image/jpeg, image/jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="help-block" style="margin-top:10px;">* Uploader l'image
                                            </p>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Est-il delegué de sa zone ?</h5>
                                        <div class="checky-sec">
                                            <div class="fgt-sec" style="margin-right:15px;">
                                                <input class="form-control" type="radio" name="deleguate" id="c1" value="1">
                                                <label for="c1">
                                                    <span></span>
                                                </label>
                                                <small>Oui</small>
                                            </div>
                                            <div class="fgt-sec">
                                                <input class="form-control" type="radio" name="deleguate" id="c2" value="0">
                                                <label for="c2">
                                                    <span></span>
                                                </label>
                                                <small>Non</small>
                                            </div>
                                            <!--fgt-sec end-->
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Ajouter </button></li>
                                            <li><button type="submit">Annuler</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                                @if(Session::has('error_menu2'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:absolute;top:5px;height:45px;left:39%;z-index:900;">
                                    <strong>Alerte !</strong> 
                                    <span id="notif_body">{{Session::get('error_menu2') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <div class="acc-setting" style="min-height:503px;">
                                <h3>Ajouter un compte Administrateur</h3>
                                <form action="{{url('definir-role')}}" method="POST">
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Entrer le nom de l'utilisateur</h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="nom_membre" placeholder="Nom du membre" required>
                                            <i class="fa fa-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Selectionner le role</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="role_membre" required>
                                                <option selected>Choisir...</option>
                                                <optgroup label="Zone">
                                                    <option value="Delege">Delegé de Zone</option>
                                                </optgroup>
                                                <optgroup label="Bureau Executif">
                                                    @foreach ($bureaux as $bureau)
                                                    <option value="{{$bureau->name}}">
                                                        Bureux Exe. - {{explode('_',$bureau->name)[1]}}
                                                    </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Conseil des Sages">
                                                    @foreach ($sages as $sage)
                                                    <option value="{{$sage->name}}">
                                                        Conseil S. - {{explode('_',$sage->name)[1]}}
                                                    </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2" style="margin-top:50px;">
                                        <ul>
                                            <li><button type="submit">Enregister</button></li>
                                            <li><button type="submit">Annuler les changements</button></li>
                                        </ul>
                                    </div>
                                    @if(Session::has('error_menu3'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:absolute;top:5px;height:45px;left:39%;z-index:900;">
                                        <strong>Alerte !</strong> 
                                        <span id="notif_body">{{Session::get('error_menu3') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <!--save-stngs end-->
                                </form>
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                            aria-labelledby="nav-notification-tab">
                            <div class="acc-setting" style="height:503px;overflow-y:scroll;">
                                <h3>Reinitialiser un compte</h3>
                                <form action="{{url('reset-compte')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="step_1">
                                        <div class="cp-field">
                                            <h5>Matricule du compte</h5>
                                            <div class="cpp-fiel">
                                                <input class="form-control" id="mem_old_matricule" type="text" name="matricule" placeholder="entrer le matricule" required>
                                                <i class="fa fa-id-badge"></i>
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button id="reset_step1">
                                                    Continuer
                                                    <i class="fa fa-arrow-right" aria-hidden="true" style="margin-left: 8px;"></i>
                                                </button></li>
                                            </ul>
                                        </div>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none;position:absolute;top:170px;height:45px;left:200px;z-index:900;">
                                            <strong>Alerte !</strong> 
                                            <span id="notif_body">Membre non reconnu, verifier le matricule</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="step_2" style="display: none;">
                                        <div class="cp-field">
                                            <h5>Nom et Prenom</h5>
                                            <div class="cpp-fiel">
                                                <input id="nom" class="form-control" type="text" name="name" placeholder="entrer le Nom complet" required>
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Zone</h5>
                                            <div class="cpp-fiel">
                                                <select id="inputState" class="form-control" name="zone" required>
                                                    <option selected>Choose...</option>
                                                    @foreach($zones as $zone)
                                                    <option value="{{$zone->localisation}}">{{ $zone->localisation }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Selectionner le village où le membre est attaché</h5>
                                            <div class="cpp-fiel">
                                                <select id="inputState" class="form-control" name="village" required>
                                                    <option selected>Choose...</option>
                                                    @foreach($villages as $village)
                                                    <option value="{{$village->nom}}"> {{ $village->nom }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Numero de telephone (Nouveau)</h5>
                                            <div class="cpp-fiel">
                                                <input id="telephone" class="form-control" type="text" name="telephone" placeholder="Num telephone" required>
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Numero de CNI (Nouveau)</h5>
                                            <div class="cpp-fiel">
                                                <input id="cni" class="form-control" type="text" name="cni" placeholder="Num de la carte d'identité" required>
                                                <i class="fa fa-address-card"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Date d'inscription effective (Nouveau)</h5>
                                            <div class="cpp-fiel">
                                                <input class="form-control" type="date" name="registered_date" placeholder="Num telephone" required>
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
    
                                        <div class="cp-field">
                                            <h5>Ajouter la photo du membre</h5>
                                            <div class="form-group">
                                                <div class="input-group col-md-12">
                                                    <input style="height:38px;width:140px;border-radius:7px 0 0 7px;"
                                                        id="fakeUploadLogo2" class="form-control fake-shadow"
                                                        placeholder="Selectionner le fichier" disabled="disabled">
                                                    <div class="input-group-btn">
                                                        <div class="fileUpload btn btn-danger fake-shadow"
                                                            style="border-radius:0 7px 7px 0!important;">
                                                            <span><i class="glyphicon glyphicon-upload"></i> Upload
                                                                image</span>
                                                            <input class="attachment_upload logo-id" name="filename"
                                                                type="file" accept="image/png, image/jpeg, image/jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="help-block" style="margin-top:10px;">* Uploader l'image
                                                </p>
                                            </div>
                                        </div>
    
                                        <div class="cp-field">
                                            <h5>Est-il delegué de sa zone ?</h5>
                                            <div class="checky-sec">
                                                <div class="fgt-sec" style="margin-right:15px;">
                                                    <input class="form-control" type="radio" name="deleguate" id="r1" value="1">
                                                    <label for="r1">
                                                        <span></span>
                                                    </label>
                                                    <small>Oui</small>
                                                </div>
                                                <div class="fgt-sec">
                                                    <input class="form-control" type="radio" name="deleguate" id="r2" value="0">
                                                    <label for="r2">
                                                        <span></span>
                                                    </label>
                                                    <small>Non</small>
                                                </div>
                                                <!--fgt-sec end-->
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button id="reset_step2">
                                                    <i class="fa fa-arrow-left" aria-hidden="true" style="margin-left: 8px;"></i>
                                                    Rentrer en arriere
                                                </button></li>
                                                <li><button type="submit">Enregistrer</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                            <div class="acc-setting" style="height:503px;overflow-y:scroll;">
                                <h3>Liste des membres</h3>
                                <div class="pro-work-status" style="padding-left: 0;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="data-table member-table table stripe hover nowrap"
                                                style="overflow-x: hidden;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 3%"></th>
                                                        <th class="table-plus" scope="col" style="width: 10%">Matricule</th>
                                                        <th scope="col" style="width: 14%">Zone</th>
                                                        <th scope="col" style="width: 14%">Village</th>
                                                        <th scope="col" style="width: 24%">Noms & prenoms</th>
                                                        <th scope="col" style="width: 40%">Role & Action</th>
                                                        <th scope="col" style="width: 40%">Participations</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($membrewithpartici as $key => $membreobj)
                                                    <tr style="position: relative;">
                                                        <th>{{$key +1}} - </th>
                                                        <th scope="row">{{$membreobj->membre->matricule}}</th>
                                                        <td>{{$membreobj->membre->zone_name}}</td>
                                                        <td>{{$membreobj->membre->village_name}}</td>
                                                        <td>{{$membreobj->membre->name}}</td>
                                                        <td class="job-dt role_action">
                                                            {{-- @php
                                                                dd($membre->user->getRoleNames()->count() );
                                                            @endphp --}}
                                                            @if($membreobj->membre->user && $membreobj->membre->user->getRoleNames()->count() > 0)
                                                                @php
                                                                $role = preg_split('/"/',$membreobj->membre->user->getRoleNames())[1]
                                                                @endphp
                                                                @if(explode('_', $role)[0] == 'B')
                                                                    <li><a href="#" title="" style="background:rgb(9, 179, 179);">
                                                                        B. executif
                                                                    </a></li>
                                                                    <li class="role_link">
                                                                        <a href="#" title="" style="background:#4ece43;">
                                                                            <span style="color:inherit;font-size:inherit;">{{ Str::limit(explode('_', $role)[1], 10) }}</span>
                                                                            <i class="fa fa-close" aria-hidden="true" style="font-size:13px;margin-left:3px;" ></i>
                                                                        </a>
                                                                    </li>
                                                                @elseif(explode('_', $role)[0] == 'C')
                                                                    <li><a href="#" title="" style="background:gold;">
                                                                        C. Sage
                                                                    </a></li>
                                                                    <li class="role_link">
                                                                        <a href="#" title="" style="background:#4ece43;">
                                                                            <span style="color:inherit;font-size:inherit;">{{ Str::limit(explode('_', $role)[1], 10) }}</span>
                                                                            <i class="fa fa-close" aria-hidden="true" style="font-size:13px;margin-left:3px;" ></i>
                                                                        </a>
                                                                    </li>
                                                               
                                                                @endif
                                                            @endif

                                                            @if($membreobj->membre->deleguate == true)
                                                                <li class="role_link"><a href="#" title="" style="background:#303281;">
                                                                    <span style="color:inherit;font-size:inherit;">Delegué</span>
                                                                    <i class="fa fa-close" aria-hidden="true" style="font-size:13px;margin-left:3px;" ></i>
                                                                </a></li>
                                                            @endif

                                                            <span class="table_action">
                                                                @if($membreobj->membre->statut == true)
                                                                    <li class="activate_link"><a href="#" title="">
                                                                        Actif
                                                                        <i class="fa fa-pencil" aria-hidden="true" style="font-size:13px;margin-left:3px;" ></i>
                                                                    </a></li>
                                                                @else
                                                                    <li class="activate_link"><a href="#" title="" style="background:grey;">
                                                                        Bloqué
                                                                        <i class="fa fa-pencil" aria-hidden="true" style="font-size:13px;margin-left:3px;" ></i>
                                                                    </a></li>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            @foreach ($membreobj->participations as $participation)
                                                                @if ($participation == 1)
                                                                <i class="fa fa-check" aria-hidden="true" style="color:#91C483;margin-right:3px;"></i>
                                                                @else
                                                                <i class="fa fa-times" aria-hidden="true" style="color:#e44d3a;margin-right:3px;"></i>
                                                                @endif
                                                            @endforeach
                                                            {{-- <i class="fa fa-check" aria-hidden="true" style="color:#91C483;margin-right:3px;"></i>
                                                            <i class="fa fa-times" aria-hidden="true" style="color:#e44d3a;margin-right:3px;"></i>
                                                            <i class="fa fa-times" aria-hidden="true" style="color:#e44d3a;margin-right:3px;"></i>
                                                            <i class="fa fa-times" aria-hidden="true" style="color:#e44d3a;margin-right:3px;"></i>
                                                            <i class="fa fa-check" aria-hidden="true" style="color:#91C483;margin-right:3px;"></i>
                                                            <i class="fa fa-check" aria-hidden="true" style="color:#91C483;margin-right:3px;"></i> --}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end table end-->
                                </div>
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-security-login" role="tabpanel"
                            aria-labelledby="nav-security-login-tab">
                            <div class="acc-setting" style="height:503px;overflow-y:scroll;">
                                <h3>Nouvel Evenement</h3>
                                <form action="{{url('ajouter-evenement')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="cp-field">
                                        <h5>Ajouter un titre a cet evenement </h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="titre" placeholder="Donnez lui un nom" required>
                                            <i class="fa fa-tag"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Nom du membre concerné par l'evenement</h5>
                                        <div class="cpp-fiel">
                                            <input class="form-control" type="text" name="membre" placeholder="La personne qui à l'evenement" required>
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Saisir une description de l'evenement</h5>
                                        <textarea name="description" required></textarea>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Qualificatif de l'evenemet</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="qualificatif" required>
                                                <option value="Heureux" selected>Heureux</option>
                                                <option value="Malheureux">Malheureux</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Ajouter quelques photos et videos</h5>
                                        <div class="form-group">
                                            <div class="input-group col-md-12">
                                                <input style="height:38px;width:140px;border-radius:7px 0 0 7px;"
                                                    id="fakeUploadLogo3" class="form-control fake-shadow"
                                                    placeholder="Selectionner les fichiers" disabled="disabled">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-danger fake-shadow"
                                                        style="border-radius:0 7px 7px 0!important;">
                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload
                                                            Logo</span>
                                                        <input class="attachment_upload logo-id" name="filenames[]"
                                                            type="file" accept="image/png, image/jpeg, image/jpg"
                                                            multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="help-block" style="margin-top:10px;">* Uploader l'image
                                            </p>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Enregistrer l'evenement</button></li>

                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                                @if(Session::has('error_menu6'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:absolute;top:5px;height:45px;left:39%;z-index:900;">
                                        <strong>Alerte !</strong> 
                                        <span id="notif_body">{{Session::get('error_menu6') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-privacy" role="tabpanel" aria-labelledby="nav-privacy-tab">
                            <div class="acc-setting" style="min-height:503px;">
                                <h3>Evenement soumis
                                    <span style="font-size:13px;font-family:system-ui;">Accepter/decliner</span>
                                </h3>
                                <div class="requests-list">
                                    @if (count($events) >= 1)
                                    @foreach($events as $evt)
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            {{-- <img src="http://via.placeholder.com/35x35" alt=""> --}}
                                            @if ($evt->medias->first() !=null)
                                            <img src="{{asset('uploads/events/'.$evt->medias->first()->url_destination.'')}}"
                                                alt="">
                                            @else
                                            <img src="{{asset('images/event-default1.png')}}" alt="">
                                            @endif

                                        </div>
                                        <div class="request-info">
                                            <h3>{{$evt->membre->name}}</h3>
                                            <span>{{$evt->titre}}</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li>
                                                    <button type="submit"
                                                        class="btn btn-outline-success accept-req validate_btn"
                                                        style="width:100px;padding-left:10px;padding-right:10px;color:#91C483;">
                                                        Accepter <i style="color:#28FFBF;"
                                                            class="la la-check validate_icon"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="submit"
                                                        class="btn btn-outline-danger close-req validate_btn"
                                                        style="width:90px;padding-left:10px;padding-right:10px;color:#FFAB76;">
                                                        Rejeter <i style="color:#FF6363;"
                                                            class="la la-close validate_icon"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="request-details nothings"
                                        style="height:390px;display:flex;flex-direction:row;justify-content:center;align-items:center;">
                                        <div class="request-info">
                                            <h2 style="font-weight:bold;">Aucun Evenement en attente de Validation !!
                                            </h2>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!--requests-list end-->
                            </div>
                        </div>

                        {{-- ok --}}
                        <div class="tab-pane fade" id="nav-deactivate" role="tabpanel"
                            aria-labelledby="nav-deactivate-tab">
                            <div class="acc-setting" style="min-height:503px;">
                                <h3>
                                    Collecte de fond
                                    <span class="fundlist"
                                        style="margin-top:10px;margin-left:10px;padding:5px;font-size:12px;border-radius:11px;border: 1px inset orange;">
                                        @if($collecte_en_cour != null)
                                        pour {{Str::limit($collecte_en_cour->evenement->titre,70)}}
                                        @else
                                        aucune collecte en cours
                                        @endif
                                    </span>
                                </h3>
                                <div class="profile-bx-details">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info" style="padding-bottom: 17px;">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon1.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>Fcfa</h3>
                                                        <h5>Operations</h5>
                                                    </div>
                                                </div>
                                                <!--pro-bx end-->
                                                <p class="fund-op1" style="color:#F4390B;cursor:pointer;">Lancer une
                                                    collecte</p>
                                                <p class="fund-op2" style="color:#F4390B;cursor:pointer;">Jumuler
                                                    collectes</p>
                                                <p class="fund-op3" style="color:#F4390B;cursor:pointer;">Enregistrer
                                                    participation</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon1.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>5,145F</h3>
                                                        <h5>Revenue</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                <p class="fundlist">Nous vous remercions tous !!</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon2.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>4,745</h3>
                                                        <h5>Participants</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                <p class="fundlist fund-op4">Voir list contributeurs</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon3.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>1,145</h3>
                                                        <h5>Beneficiaires</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                <p class="fundlist fund-op5">Voir list Beneficiaires</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                    </div>
                                </div>

                                <!-- fonction crown fund-->
                                <div class="" style="margin-top:15px;float:left;">
                                    <!--lancer cotisation /OK-->
                                    <div class="pro-work-status fund-item op1" style="padding-bottom:20px;">
                                        <h4 style="margin-bottom:7px;color:#e44d3a;">Nouvelle collecte de fond </h4>
                                        <form action="{{url('lancer-collecte')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="cp-field col-md-4"
                                                    style="padding-left:10px;margin-top:10px;">
                                                    <h5>Titre de l'evenement</h5>
                                                    <div class="cpp-fiel" style="margin-top:8px;margin-bottom:17px;">
                                                        <input class="form-control" type="text" name="titre"
                                                            placeholder="Rechercher l'evenement" required>
                                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="cp-field col-md-3"
                                                    style="padding-left:10px;margin-top:10px;">
                                                    <h5>Somme Cotisation</h5>
                                                    <div class="cpp-fiel" style="margin-top:8px;margin-bottom:17px;">
                                                        <input class="form-control" type="number" name="montant" placeholder="montant" required>
                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-5"></div>
                                                <button class="btn btn-primary"
                                                    style="background-color:#17c3b2;border:0;">
                                                    Lancer <i class="fa fa-arrow-right" aria-hidden="true"
                                                        style="margin-left: 8px;"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!--jumuler event sur cotisation /OK-->
                                    <div class="pro-work-status fund-item op2" style="padding-bottom:20px;">
                                        <h4 style="margin-bottom:15px;color:#e44d3a;">Ajouter un evenement a une
                                            collecte en cours </h4>
                                        <form action="{{url('mixer-collecte')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="cp-field col-md-7"
                                                    style="padding-left:10px;margin-top:0px;">
                                                    <div class="cpp-fiel">
                                                        <select id="inputState" class="form-control" name="collecte" required>
                                                            <option selected>Selectionner une collecte en cours ...
                                                            </option>
                                                            @foreach($collectes as $collecte)
                                                            <option value="{{$collecte->id}}">Collecte pour
                                                                {{ Str::limit($collecte->event_titre,20) }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"></div>
                                                <div class="cp-field col-md-7"
                                                    style="padding-left:10px;margin-top:18px;margin-bottom:17px;">
                                                    <div class="cpp-fiel">
                                                        <select id="inputState" class="form-control" name="nouvel_event" required>
                                                            <option selected>Selectionner l'evenement à rajouter ...
                                                            </option>
                                                            @foreach($eventforfunds as $evt)
                                                            <option value="{{$evt->titre}}">
                                                                {{ Str::limit($evt->titre, 30) }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary"
                                                style="margin-left:10px;background-color:#17c3b2;border:0;">
                                                Jumuler <i class="fa fa-handshake-o" aria-hidden="true"
                                                    style="margin-left: 8px;"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!--enregister new participation /OK-->
                                    <div class="pro-work-status fund-item op3" style="padding-bottom:20px;">
                                        <h4 style="margin-bottom:15px;color:#e44d3a;">Enregistre nouvelle participation
                                        </h4>
                                        <form action="{{url('nouvelle-participation')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="cp-field col-md-7" style="padding-left:10px;margin-top:8px;">
                                                    <div class="cpp-fiel">
                                                        <input class="form-control" type="text" name="membre_matricule"
                                                            placeholder="Entrer le matricule du membre" required>
                                                        <i class="fa fa-id-badge"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-7"></div>
                                                <div class="cp-field col-md-7"
                                                    style="padding-left:10px;margin-top:10px;margin-bottom:17px;">
                                                    <div class="cpp-fiel">
                                                        <select id="inputState" class="form-control" name="collecte" required>
                                                            <option selected>Selectionner une collecte en cours ...
                                                            </option>
                                                            @foreach($collectes as $collecte)
                                                            <option value="{{$collecte->id}}">Collecte pour
                                                                {{ Str::limit($collecte->event_titre,20) }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary"
                                                style="margin-left:10px;background-color:#17c3b2;border:0;">
                                                Ajouter <i class="fa fa-gift" aria-hidden="true"
                                                    style="margin-left:8px;font-size:18px;"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- consulter les participations /OK-->
                                    <div class="pro-work-status fund-item op4" style="padding-bottom:20px;">
                                        <div class="row" style="float:left;">
                                            <h4 class="col-md-12" style="margin-bottom:15px;color:#e44d3a;">
                                                <i class="fa fa-long-arrow-left" aria-hidden="true"
                                                    style="color:#e44d3a;margin-right:10px;cursor:pointer;"></i>
                                                Liste des participations pour la cotisation de
                                            </h4>

                                            @if($collecte_en_cour != null)
                                            <div class="col-md-12">
                                                <table class="data-table participation table stripe hover nowrap table_nosearch">
                                                    <thead>
                                                        <tr>
                                                            <th class="table-plus">Matricule</th>
                                                            <th>Nom</th>
                                                            <th>Zone</th>
                                                            <th>Participation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if($participants_final != null)
                                                        @foreach($participants_final as $pt)
                                                        <tr>
                                                            <th scope="row">{{$pt['matricule']}}</th>
                                                            <td>{{$pt['name']}}</td>
                                                            <td>{{$pt['zone']}}</td>
                                                            <td class="job-dt">
                                                                @if ($pt['participation'] == "Oui")
                                                                <li><a href="#" title="">{{$pt['participation']}}</a>
                                                                </li>
                                                                @else
                                                                <li><a href="#" title=""
                                                                        style="background: #F55353">{{$pt['participation']}}</a>
                                                                </li>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end table end-->
                                            <h3 class="col-md-12"
                                                style="margin-top:7px;margin-bottom:8px;color:#e44d3a;font-size:16px;font-weight:bold;">
                                                Statistique
                                            </h3>
                                            <ul class="col-md-12">
                                                <li style="font-size: 17px;margin-bottom:8px;">- Nombre de participant:
                                                    <strong
                                                        style="color:#295fa6;font-weight:bold;text-shadow: 3px 5px 6px #0477bf;">
                                                        {{$nbparticipants}}
                                                    </strong>
                                                </li>
                                                <li style="font-size: 17px;">
                                                    - Somme totale recollecte:
                                                    <strong
                                                        style="color:#248e38;font-weight:bold;text-shadow: 3px 5px 6px #abdca7;">
                                                        {{ $nbparticipants * $collecte_en_cour->montant_cotisation }}
                                                        Fcfa
                                                    </strong>
                                                </li>
                                            </ul>
                                            @endif

                                        </div>
                                    </div>

                                    <!-- consulter les beneficiaires /OK-->
                                    <div class="pro-work-status fund-item op5" style="padding-bottom:20px;">
                                        <div class="row" style="float:left;">
                                            <h4 class="col-md-12" style="margin-bottom:15px;color:#e44d3a;">
                                                <i class="fa fa-long-arrow-left" aria-hidden="true"
                                                    style="color:#e44d3a;margin-right:10px;cursor:pointer;"></i>
                                                Liste des beneficiaires de cette cotisation
                                            </h4>
                                            @if($collecte_en_cour != null)
                                            <div class="col-md-12">
                                                <table class="data-table table stripe hover nowrap table_nosearch">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 25%">Matricule Memb.</th>
                                                            <th scope="col" style="width: 25%">Nom du Membre</th>
                                                            <th scope="col" style="width: 25%">Numero de Cni</th>
                                                            <th scope="col" style="width: 25%">Zone</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($beneficiaires != null)
                                                        @foreach($beneficiaires as $bf)
                                                        <tr>
                                                            <th scope="row">{{$bf->membre->matricule}}</th>
                                                            <td>{{$bf->membre->name}}</td>
                                                            <td>{{$bf->membre->numero_cni}}</td>
                                                            <td>{{$bf->membre->zone_name}}</td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if(Session::has('error_menu8'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:absolute;top:280px;left:474px!important;height:45px;z-index:900;">
                                        <strong>Alerte !</strong> 
                                        <span id="notif_body">{{Session::get('error_menu8') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-blockking" role="tabpanel"
                            aria-labelledby="nav-blockking-tab">
                            <div class="acc-setting" style="min-height:503px;">
                                <h3>Regles du Groupe</h3>
                                <form>
                                    <div class="notbar">
                                        <h4>Notification Sound</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>
                                    <!--notbar end-->
                                    <div class="notbar">
                                        <h4>Notification Email</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>
                                    <!--notbar end-->
                                    <div class="notbar">
                                        <h4>Chat Message Sound</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>
</section>

<template id="">
    <div class="request-details nothings"
        style="height:390px;display:flex;flex-direction:row;justify-content:center;align-items:center;">
        <div class="request-info">
            <h2 style="font-weight:bold;">Toute les demandes d'evenement ont deja été traité !!</h2>
        </div>
    </div>
</template>
<template>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam architecto officiis nihil totam incidunt eum
    perferendis cupiditate tempore dolore? Incidunt necessitatibus atque ipsa laborum tempora architecto aspernatur
    eligendi libero exercitationem quas, alias dicta unde reprehenderit, deserunt magni labore. Alias ipsa molestias
    incidunt nobis sunt quod ex! Deleniti nulla soluta ab.
</template>


{{-- footer --}}
@include('layouts.footer')
@endsection
