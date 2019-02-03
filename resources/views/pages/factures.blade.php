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
                                    <h1>Nouvelle Facture</h1>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <label>Client :</label>
                                <div class="btn-group bootstrap-select bs-select">
                                    <select class="bs-select" tabindex="-98" name="fact_client" id="fact_client" required>
                                        <option class="bs-title-option" value="">Veuillez choisir un client...</option>
                                        @foreach($list_clients as $client)
                                            <option value="{{$client->id}}">{{$client->nomClient}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Dossier juridique :</label>
                                <div class="btn-group bootstrap-select bs-select">
                                    <select class="bs-select" tabindex="-98" name="fact_dossier" id="fact_dossier" required>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Depenses :</label>
                                <div class="btn-group bootstrap-select bs-select">
                                    <select class="bs-select" tabindex="-98" name="fact_depenses" id="fact_depenses" required>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="block-content">

                        <div class="row padding-top-20 text-right">
                            <button type="button" class="btn btn-primary btn-icon-fixed btn-md" id="btn_AddDossierTrib" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><span class="fa fa-check"></span> Enregistrer</button>
                            <button type="button" class="btn btn-danger btn-icon-fixed btn-md" id="btn_CancelDossierTrib"><span class="fa fa-times"></span> Annuler</button>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- END PAGE CONTAINER -->
@endsection
