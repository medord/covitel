@extends('layouts.mainLayout')

@section('pageContent')
    <div class="app-container">
        @include('layouts.mainSidebar')
        <div class="app-content">
            @include('layouts.mainHeader')
            <div class="block block-condensed">
                @if(isset($list_dossiers))
                    <div class="app-heading app-heading-small">
                        <div class="title">
                            <h5>Dossiers Tribuneaux</h5>
                            <p>Liste des dossiers tribuneaux</p>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table style="text-align: center;" class="table table-striped table-bordered datatable-extended dataTable table-head-custom no-footer " id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                        <thead>
                                        <tr role="row" style="text-align: center;">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 254.533px;" aria-sort="ascending" aria-label="Client: activate to sort column descending">Client</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 390.2px;" aria-label="Date: activate to sort column ascending">Date de creation</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 187.75px;" aria-label="Type: activate to sort column ascending">Type du dossier</th>
                                            <th>Consulter</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($list_dossiers as $dossier)
                                            <tr role="row">
                                                <td class="sorting_1">{{$dossier->nomClient}}</td>
                                                <td>{{$dossier->dateDossier}}</td>
                                                <td>{{$dossier->typeDossier}}</td>
                                                <td class="col-lg-1 col-centered"><a class="btn btn-primary btn-rounded btn-icon btn-info btn-xs" href="/dossier/search/{{$dossier->id}}"><span class="fa fa-info-circle"></span></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(isset($dossier_client))
                    <div class="app-heading app-heading-small">
                        <div class="title">
                            <h5>Details Du Dossier</h5>
                        </div>
                    </div>
                    <div class="block-content">


                        <div class="col-md-12">
                            <div class="app-widget-tile">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="icon icon-lg"><span class="icon-book"></span></div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="line">
                                            <div class="title">Dossier N°{{$dossier_client->id }}</div>
                                            <div class="title pull-right text-danger">{{$dossier_client->typeDossier}}</div>
                                        </div>
                                        <div class="intval text-left">Client : {{$dossier_client->nomClient}}</div>
                                        <div class="line">
                                            <div class="subtitle">Date de création : {{date('l m F Y',strtotime($dossier_client->dateDossier))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="text-align: center;" class="table table-head-custom datatable-extended dataTable no-footer table-head-light" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                            <thead>
                                            <tr role="row" style="text-align: center;">
                                                <th>Procédures</th>
                                                <th>Adversaires</th>
                                                <th>Contrats</th>
                                                <th>Créance</th>
                                                <th>Status</th>
                                                <th>Tribunal</th>
                                                <th>Commentaire</th>
                                                <th>Modifier/Supprimer</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @foreach($dossier_tribs_client as $dossier)
                                                <tr role="row">
                                                    <td class="sorting_1">{{$dossier->intituleProc}}</td>
                                                    <td>
                                                        @foreach($dossier->adversaires as $adv)
                                                            {{$adv->nomAdv}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($dossier->contrats as $cont)
                                                            {{$cont->numContrat}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{$dossier->creanceProc.' DHS'}}</td>
                                                    <td>{{$dossier->libelleEtape}}</td>
                                                    <td>{{$dossier->nomTribunal.' - '.$dossier->villeTribunal}}</td>
                                                    <td>{{$dossier->commentaireDossier}}</td>
                                                    <td class="col-lg-1 col-centered">
                                                        <a class="btn btn-primary btn-icon btn-sm" onclick="editDossierTrib({{json_encode($dossier)}})">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                        <a class="btn btn-primarys btn-icon btn-danger btn-sm" href="/dossier/deleteDossietTrib/{{$dossier->id}}">
                                                            <span class="fa fa-remove"></span>
                                                        </a>
                                                    </td>-
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <div class="modal fade" data-backdrop="static" id="editDossierTribModal" tabindex="-1" role="dialog" style="display: none;">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="app-heading title-only padding-left-0">
                                                                <div class="icon"><span class="icon-briefcase"></span></div>
                                                                <div class="title">
                                                                    <div class="title text-capitalize heading-line-below heading-line-below-short">
                                                                        <h1>Modifier le dossier tribunal</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                                <option value="{{$proc->id}}">{{$proc->intituleProc}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <label>Status du Procédure :</label>
                                                                    <div class="btn-group bootstrap-select bs-select">
                                                                        <select class="bs-select" data-live-search="true" tabindex="-98" id="proc_status" name="proc_status" required>
                                                                            <option class="bs-title-option" value="">Veuillez choisir un status...</option>
                                                                            @foreach($list_status as $stat)
                                                                                <option value="{{$stat->id}}">{{$stat->libelleEtape}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <label>Commentaire :</label>
                                                                    <div class="input-group">
                                                                        <textarea class="form-control" id="proc_commentaire" name="proc_commentaire" required></textarea>
                                                                    </div>

                                                                </div>
                                                            </p>
                                                            <p class="text-right">
                                                                <button type="submit" class="btn btn-primary btn-md btn-clean" id="updateDossierTrib"><span class="fa fa-edit"></span>Modifier</button>
                                                                <button type="button" class="btn btn-danger btn-md btn-clean" data-dismiss="modal" id=""><span class="fa fa-times"></span> Annuler</button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
