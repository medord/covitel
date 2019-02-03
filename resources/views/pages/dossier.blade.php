@extends('layouts.mainLayout')

@section('pageContent')
    <!-- START PAGE CONTAINER -->
    <div class="app-container">
        @include('layouts.mainSidebar')
        <div class="app-content">
            @include('layouts.mainHeader')
            <div class="container">
                <div class="block block-condensed">
                    <div class="block-content">
                        <div class="app-heading title-only padding-left-0">
                            <div class="icon"><span class="icon-file-add"></span></div>
                            <div class="title">
                                <div class="title text-capitalize heading-line-below heading-line-below-short">
                                    <h1>Nouveau Dossier</h1>
                                </div>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-pills nav-pills-bordered">
                                <li class="active">
                                    <a class="btn btn-informer" href="#tabContrat" data-toggle="tab" aria-expanded="true" id="nav_contratTab">
                                        <span class="icon-file-empty"></span> Contrats
                                    </a>
                                </li>
                                <li class="">
                                    <a class="btn btn-informer" href="#tabAdversaire" data-toggle="tab" aria-expanded="true" id="nav_advTab">
                                        <span class="icon-user"></span> Adversaires
                                    </a>
                                </li>
                                <li class="">
                                    <a class="btn btn-informer" href="#tabProcedure" data-toggle="tab" aria-expanded="true" id="nav_procTab">
                                        <span class="icon-briefcase"></span> Procédures
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="tabContrat">
                                    <div class="col-md-4">
                                        <label>Client</label>
                                        <div class="btn-group bootstrap-select bs-select">
                                            <select class="bs-select" data-live-search="true" tabindex="-98" name="cl_name" id="cl_name" required>
                                                <option class="bs-title-option" value="">Veuillez choisir un client...</option>
                                                @foreach($list_clients as $client)
                                                    <option value="{{$client->clientId}}">{{$client->nomClient}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-right">
                                                <button class="btn btn-primary btn-clean btn-rounded btn-sm" data-toggle="modal" data-target="#addClModal">
                                                    <span class="icon-plus-circle"></span> Nouveau Client
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                        {{--<label>Réference du contrat</label>--}}
                                        {{--<div class="btn-group bootstrap-select bs-select">--}}
                                            {{--<select class="bs-select" data-live-search="true" tabindex="-98" id="cl_contrat" name="cl_contrat" multiple="multiple" required>--}}
                                                {{--<option class="bs-title-option" value="">Veuillez choisir un contrat...</option>--}}
                                                {{--@foreach($list_contrats as $contrat)--}}
                                                    {{--<option value="{{$contrat->contratId}}">{{$contrat->referenceContrat}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-4">
                                        <label>Contrats</label>
                                        <div class="panel panel-default" id="panel-expand">
                                            <ul class="list-group" id="list_contrats">
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-right">
                                                <button class="btn btn-primary btn-clean btn-rounded btn-sm" data-toggle="modal" data-target="#addContModal">
                                                    <span class="icon-plus-circle"></span> Nouvelle Contrat
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Echeance</label>
                                        <div class="input-group">
                                            <input type="number" data-validation="" class="form-control" name="cl_echeance" id="cl_echeance" required>
                                            <span class="input-group-addon">DHS</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Type De Dossier</label>
                                        <div class="btn-group bootstrap-select bs-select">
                                            <select class="bs-select" tabindex="-98" name="cl_typeDossier" id="cl_typeDossier" required>
                                                <option value="1">Dossier Masse</option>
                                                <option value="2">Gros Dossier</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal fade" data-backdrop="static" id="addContModal" tabindex="-1" role="dialog" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form action="/contrats/add" onsubmit="addContrat_form_submit(event,this)" method="post">
                                                        @csrf
                                                        <div class="app-heading title-only padding-left-0">
                                                            <div class="icon"><span class="icon-file-add"></span></div>
                                                            <div class="title">
                                                                <div class="title text-capitalize heading-line-below heading-line-below-short">
                                                                    <h1>Nouvelle Contrat</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                        <div class="col-md-12">
                                                            <label>N° Contrat :</label>
                                                            <div class="input-group">
                                                                <input type="text" data-validation="" class="form-control" id="addCont_num" name="addCont_num" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Montant Créance :</label>
                                                            <div class="input-group">
                                                                <input type="number" data-validation="" class="form-control" name="addCont_creance" id="addCont_creance" required>
                                                                <span class="input-group-addon">DHS</span>
                                                            </div>
                                                        </div>

                                                        </p>
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-primary btn-md btn-clean" id="btn_addCont" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-plus"></span> Ajouter</button>
                                                            <button type="reset" class="btn btn-danger btn-md btn-clean" data-dismiss="modal" id="btn_dissmissAddCont"><span class="fa fa-times"></span> Annuler</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" data-backdrop="static" id="addClModal" tabindex="-1" role="dialog" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form action="/client/addClient" onsubmit="addCl_form_submit(event,this)" method="post">
                                                        @csrf
                                                        <div class="app-heading title-only padding-left-0">
                                                            <div class="icon"><span class="icon-user"></span></div>
                                                            <div class="title">
                                                                <div class="title text-capitalize heading-line-below heading-line-below-short">
                                                                    <h1>Nouveau Client</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                        <div class="col-md-12">
                                                            <label>Nom :</label>
                                                            <div class="input-group">
                                                                <input type="text" data-validation="" class="form-control" id="addCl_nom" name="addCl_nom" required>
                                                            </div>
                                                        </div>
                                                        {{--<div class="col-md-12">--}}
                                                            {{--<label>Email :</label>--}}
                                                            {{--<div class="input-group">--}}
                                                                {{--<input type="email" data-validation="" class="form-control" id="addCl_Email" name="addCl_email" required>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label>Adresse :</label>
                                                            <textarea class="form-control" id="addCl_adresse" name="addCl_adresse" required></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label>Ville</label>
                                                            <div class="btn-group bootstrap-select bs-select">
                                                                <select class="bs-select" data-live-search="true" tabindex="-98" id="addCl_ville" name="addCl_ville" required>
                                                                    <option class="bs-title-option" value="">Veuillez choisir une ville...</option>
                                                                    @foreach($list_villes as $ville)
                                                                        <option value="{{$ville->villeId}}">{{$ville->intituleVille}} | {{$ville->intituleVilleArabe}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label>Type Client</label>
                                                            <div class="btn-group bootstrap-select bs-select">
                                                                <select class="bs-select" data-live-search="true" tabindex="-98" id="addCl_type" name="addCl_type" required>
                                                                    <option class="bs-title-option" value="">Veuillez choisir un type...</option>
                                                                    <option value="1">Particiulier</option>
                                                                    <option value="2">Societe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-primary btn-md btn-clean" id="btn_addCl" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-plus"></span> Ajouter</button>
                                                            <button type="reset" class="btn btn-danger btn-md btn-clean" data-dismiss="modal" id="btn_dissmissAddCl"><span class="fa fa-times"></span> Annuler</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tabAdversaire">
                                    <div class="col-md-12">
                                        {{--<label>Adversaires</label>--}}
                                        <div class="col-md-12" id="list_adversaires">
                                        </div>
                                        {{--<div class="panel panel-default" id="panel-expand">--}}

                                            {{--<ul class="list-group" id="list_adversaires">--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        <div class="col-md-12">
                                            <p class="text-right">
                                                <button class="btn btn-primary btn-clean btn-rounded btn-sm" data-toggle="modal" data-target="#addAdvModal">
                                                    <span class="icon-plus-circle"></span> Nouveau Adversaire
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal fade" data-backdrop="static" id="addAdvModal" tabindex="-1" role="dialog" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form action="/adversaires/add" onsubmit="addAdversaire_form_submit(event,this)" method="post">
                                                        @csrf
                                                        <div class="app-heading title-only padding-left-0">
                                                            <div class="icon"><span class="icon-user"></span></div>
                                                            <div class="title">
                                                                <div class="title text-capitalize heading-line-below heading-line-below-short">
                                                                    <h1>Nouveau Advesaire</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <div class="col-md-12">
                                                                <p class="text-center">
                                                                    <label>Type d'adversaire :</label>
                                                                    <div class="app-radio round">
                                                                        <p class="text-center">
                                                                            <label>
                                                                                <input type="radio" name="typeAdv" onchange="change_labels(this.value)" value="particulier" checked="checked">Particulier<span></span>
                                                                            </label>
                                                                            &nbsp;&nbsp;
                                                                            <label>
                                                                                <input type="radio" name="typeAdv" value="societe" onchange="change_labels(this.value)">Societé<span></span>
                                                                            </label>
                                                                        </p>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                            <br/>
                                                            <div class="col-md-12">
                                                                <label id="adv_name_label">Nom & Prenom</label>
                                                                <div class="input-group">
                                                                    <input type="text" data-validation="" class="form-control" id="adv_nom" name="adv_nom" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label id="adv_cin_label">CIN</label>
                                                                <div class="input-group">
                                                                    <input type="text" data-validation="" class="form-control" id="adv_cin" name="adv_cin" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label>Ville</label>
                                                                <div class="btn-group bootstrap-select bs-select">
                                                                    <select class="bs-select" data-live-search="true" tabindex="-98" id="adv_ville" name="adv_ville" required>
                                                                        <option class="bs-title-option" value="">Veuillez choisir une ville...</option>
                                                                        @foreach($list_villes as $ville)
                                                                            <option value="{{$ville->villeId}}">{{$ville->intituleVille}} | {{$ville->intituleVilleArabe}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label>Adresse</label>
                                                                    <textarea class="form-control" name="adv_adresse" id="adv_adresse" required></textarea>
                                                                </div>
                                                            </div>
                                                        </p>
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-primary btn-md btn-clean" id="btn_addCont" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-plus"></span> Ajouter</button>
                                                            <button type="reset" class="btn btn-danger btn-md btn-clean" data-dismiss="modal" id="btn_dissmissAddCont"><span class="fa fa-times"></span> Annuler</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabProcedure">
                                    <div class="col-md-12" id="procList">
                                    </div>
                                    <div class="col-md-12">
                                        <p class="text-right">
                                            <button class="btn btn-primary btn-clean btn-rounded" data-toggle="modal" data-target="#addProcModal">
                                                <span class="icon-plus-circle"></span> Ajouter Une Procedure
                                            </button>
                                        </p>
                                    </div>
                                    <div class="modal fade" data-backdrop="static" id="addProcModal" tabindex="-1" role="dialog" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="app-heading title-only padding-left-0">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <div class="title">
                                                            <div class="title text-capitalize heading-line-below heading-line-below-short">
                                                                <h1>Nouvelle Procédure</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="/procedures/add" onsubmit="addProc_form_submit(event,this)" method="post">
                                                        @csrf
                                                        <p>
                                                        <div class="col-md-12">
                                                            <label>Créance :</label>
                                                            <div class="input-group">
                                                                <input type="number" data-validation="" class="form-control" id="proc_creance" name="proc_creance" required>
                                                                <span class="input-group-addon">DHS</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Type De Procédure :</label>
                                                            <div class="btn-group bootstrap-select bs-select">
                                                                <select class="bs-select" data-live-search="true" tabindex="-98" id="proc_type" name="proc_type" required>
                                                                    <option class="bs-title-option" value="">Veuillez choisir une procédure...</option>
                                                                    @foreach($list_procedures as $proc)
                                                                        <option value="{{$proc->procedureId}}">{{$proc->intituleProcedure}} | {{$proc->intituleProcedureArabe}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{--<div class="col-md-12">
                                                            <br>
                                                            <label>Tribunal :</label>
                                                            <div class="btn-group bootstrap-select bs-select">
                                                                <select class="bs-select" data-live-search="true" tabindex="-98" id="proc_tribunal" name="proc_tribunal" required>
                                                                    <option class="bs-title-option" value="">Veuillez choisir un tribunal...</option>
                                                                    @foreach($list_tribunals as $trib)
                                                                        <option value="{{$trib->id}}">{{$trib->nomTribunal}} | {{$trib->villeTribunal}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>--}}
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label>Commentaire :</label>
                                                            <textarea class="form-control" id="proc_commentaire" name="proc_commentaire" required></textarea>
                                                        </div>
                                                        </p>
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-primary btn-md btn-clean" id="btn_addProc"><span class="fa fa-plus"></span> Ajouter</button>
                                                            <button type="reset" class="btn btn-danger btn-md btn-clean" data-dismiss="modal" id="btn_dissmissAddProc"><span class="fa fa-times"></span> Annuler</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="block-content">
                        <div class="col-md-6">
                            <div class="row padding-top-20 text-left">
                                <form id="excelFile_form" action="/procedures/add" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="hidden" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="dossier_file" name="dossier_file" onchange="dossier_file_changeFile(event,this)" hidden>
                                </form>

                                <button type="button" id="btn_addExcel" class="btn btn-success btn-icon-fixed btn-md" onclick="$('#dossier_file').click()" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-file-excel-o"></span> Fichier Excel</button>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="row padding-top-20 text-right">
                                <button type="button" class="btn btn-primary btn-icon-fixed btn-md" id="btn_AddDossierTrib" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-check"></span> Enregistrer</button>
                                <button type="button" class="btn btn-danger btn-icon-fixed btn-md" id="btn_CancelDossierTrib"><span class="fa fa-times"></span> Annuler</button>
                            </div>
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- END PAGE CONTAINER -->
@endsection
