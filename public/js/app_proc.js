$(document).ready(function(){
    localStorage.removeItem('procList');
    localStorage.removeItem('contratsList');
    localStorage.removeItem('adversairesList')

});

function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
}

function validateAdv(){
    if(localStorage.getItem('adversairesList')){
        if(!jQuery.isEmptyObject(JSON.parse(localStorage.getItem('adversairesList')))){
            return true;
        }
    }
}
function validateContrat(){

    if($('#cl_name').val().length>0){
        $('#cl_name').parent().parent().removeClass('has-error');

        if($('#cl_echeance').val().length>0){
            $('#cl_echeance').parent().removeClass('has-error');

            if($('#cl_typeDossier').val().length>0){
                $('#cl_typeDossier').parent().removeClass('has-error');
                if(localStorage.getItem('contratsList')){
                    if(!jQuery.isEmptyObject(JSON.parse(localStorage.getItem('contratsList')))){
                        return true;
                    }
                }
            }else{
                $('#cl_typeDossier').parent().addClass('has-error');
            }
        }else{
            $('#cl_echeance').parent().addClass('has-error');
        }
    }else{
        $('#cl_name').parent().parent().addClass('has-error');
    }
}
function validateProcedures(){
    if(localStorage.getItem('procList')){
        if(!jQuery.isEmptyObject(JSON.parse(localStorage.getItem('procList')))){
            return true;
        }
    }
}

function editDossierTrib(dossierData){

    // {
    //     "id": 1,
    //     "idDossierClient": 1,
    //     "adversaires": [
    //     {
    //         "id": 1,
    //         "nomAdv": "KFERFJ"
    //     },
    //     {
    //         "id": 2,
    //         "nomAdv": "MM"
    //     }
    // ],
    //     "contrats": [
    //     {
    //         "id": 1,
    //         "numContrat": "MLOK12547"
    //     }
    // ],
    //     "creanceProc": 125487,
    //     "idProc": 3,
    //     "idAgent": 1,
    //     "status": 1,
    //     "idTribunal": 4,
    //     "commentaireDossier": "ejfzeiufheziufhzeiyhf",
    //     "nomTribunal": "Tribune primaire",
    //     "villeTribunal": "Kenitra",
    //     "intituleProc": "Saisie arret sur salaire DM",
    //     "codeEtape": "010",
    //     "libelleEtape": "Création",
    //     "demandeFond": 0,
    //     "commentEtape": "Etape1"
    // }

    $('#proc_creance').val(dossierData.creanceProc);
    $('#proc_type').val(dossierData.idProc).change();
    $('#proc_tribunal').val(dossierData.idTribunal).change();
    $('#proc_commentaire').val(dossierData.commentaireDossier);
    $('#proc_status').val(dossierData.status).change();
    console.log(dossierData);
    $('#editDossierTribModal').modal();
}

function addCl_form_submit(e,form){
    e.preventDefault();
    $('#btn_addCl').button('loading');

    var formdata = $(form).serializeArray();
    var data = {}

    for(i=0;i<formdata.length;i++){
        data[formdata[i].name]=formdata[i].value;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/client/add",
        method: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(result){

            $('#btn_addCl').button('reset');
            if(result.type=='success'){
                $('#cl_name').append('<option value="'+result.client.clientId+'">'+result.client.nomClient+'</option>');
                $("#cl_name").selectpicker("refresh");

                swal({
                    icon:'success',
                    button: "OK",
                    title:"Client Ajouté !"
                }).then(function () {
                    $('#btn_dissmissAddCl').click();
                });
            }else{
                swal({
                    icon:'error',
                    button: "OK",
                    title:"Une Erreur s'est produite !"
                });
            }

        },
        error: function(error){
            console.log("ERROR : ");
            console.log(error);
        }
    });

}

function removeContrat(contratId){
    $('#'+contratId).remove();
    contratsList = JSON.parse(localStorage.getItem('contratsList'));
    delete contratsList[contratId];
    localStorage.setItem("contratsList",JSON.stringify(contratsList));
}
function addContrat_form_submit(e,form){

    e.preventDefault();
    $('#btn_addCont').button('loading');

    var formdata = $(form).serializeArray();
    var data = {}

    for(i=0;i<formdata.length;i++){
        data[formdata[i].name]=formdata[i].value;
    }
    var contratId = "contrat_"+makeid();
    var newContrat = "<li class=\"list-group-item\" id='"+contratId+"'>" +
        "<span class=\"text-right\" style='float: right'><a href=\"#\" class=\"btn btn-icon btn-danger btn-sm\" onclick='removeContrat(\""+contratId+"\")'><span class=\"fa fa-remove\"></span></a></span>"+
        "N° : "+data.addCont_num+"" +
        "<p class=\"text-center\">"+data.addCont_creance+" DHS</p>" +
        "</li>";
    $('#list_contrats').append(newContrat);

    contratsList = {}

    if(localStorage.getItem('contratsList')){
        contratsList = JSON.parse(localStorage.getItem('contratsList'));

        contratsList[contratId] = {
            'cont_creance': data.addCont_creance,
            'cont_num': data.addCont_num,
        };
        localStorage.setItem('contratsList',JSON.stringify(contratsList));
    }else{
        contratsList[contratId] = {
            'cont_creance': data.addCont_creance,
            'cont_num': data.addCont_num,
        };
        localStorage.setItem('contratsList',JSON.stringify(contratsList));
    }

    $(form).trigger("reset");
    $('#btn_addCont').button('reset');
    $('#addContModal').modal('hide');

}

function change_labels(advType){
    switch (advType) {
        case 'societe':{
            $('#adv_name_label').text('Raison Sociale')
            $('#adv_cin_label').text('N° de Registre de Commerce')
        }
        break;
        case 'particulier':{
            $('#adv_name_label').text('Nom & Prénom')
            $('#adv_cin_label').text('CIN')
        }
        break;
    }
}
function removeAdversaire(advId){
    $('#'+advId).remove();
    adversairesList = JSON.parse(localStorage.getItem('adversairesList'));
    delete adversairesList[advId];
    localStorage.setItem("adversairesList",JSON.stringify(adversairesList));
}
function addAdversaire_form_submit(e,form){
    e.preventDefault();
    $('#btn_addAdv').button('loading');

    var formdata = $(form).serializeArray();
    var data = {}
    for(i=0;i<formdata.length;i++){
        data[formdata[i].name]=formdata[i].value;
    }
    data["adv_nomVille"] = $('#adv_ville').find("option:selected").text();

    var advId = "adv_"+makeid();

    var newAdv = "<div class=\"col-md-4\" id='"+advId+"'>" +
        "<div class=\"block block-condensed\">\n" +
            "<div class=\"app-heading\">\n" +
            "   <div class=\"title\">\n" +
            "      <h2>"+data.adv_nom+"</h2>\n" +
            "      <p>"+data.adv_nomVille+"</p>\n" +
            "   </div>\n" +
            "   <div class=\"heading-elements\"><a href=\"#\" class=\"btn btn-sm btn-danger btn-icon\" onclick='removeAdversaire(\""+advId+"\")'><span class=\"fa fa-remove\"></span></a></div>\n" +
            "</div>"+
            "<div class=\"col-md-6\">\n" +
            "   <div class=\"app-widget-informer\">\n" +
            "      <div class=\"title\"><span class=\"icon-pushpin\"></span>"+(data.typeAdv=='particulier'?'CIN':'N° de Registre de Commerce')+" :</div>\n" +
            "      <div class=\"tinyintval text-center\">"+data.adv_cin+"</div>\n" +
            "   </div>\n" +
            "</div>" +
            "<div class=\"col-md-6\">\n" +
            "   <div class=\"app-widget-informer\">\n" +
            "      <div class=\"title\"><span class=\""+(data.typeAdv=='particulier'?'icon-user':'icon-apartment')+"\"></span> Type d'adversaire :</div>\n" +
            "      <div class=\"tinyintval text-center\">"+data.typeAdv+"</div>\n" +
            "   </div>\n" +
            "</div>"+
            "<div class=\"col-md-12\">\n" +
            "   <div class=\"app-widget-informer\">\n" +
            "      <div class=\"title\"><span class=\"icon-location\"></span> Adresse :</div>\n" +
            "      <div class=\"tinyintval text-center\">"+data.adv_adresse+"</div>\n" +
            "   </div>\n" +
            "</div>"+
        "</div>"+
        "</div>";


    $('#list_adversaires').append(newAdv);

    adversairesList = {}


    if(localStorage.getItem('adversairesList')){
        adversairesList = JSON.parse(localStorage.getItem('adversairesList'));

        adversairesList[advId] = {
            'cont_creance': data.addCont_creance,
            'cont_num': data.addCont_num,
        };
        localStorage.setItem('adversairesList',JSON.stringify(adversairesList));
    }else{
        adversairesList[advId] = {
            'adv_nom': data.adv_nom,
            'adv_ref': data.adv_cin,
            'adv_type': (data.typeAdv == 'particulier' ? 1:2),
            'adv_ville': data.adv_ville,
            'adv_adresse': data.adv_adresse,
        };
        localStorage.setItem('adversairesList',JSON.stringify(adversairesList));
    }

    $(form).trigger("reset");
    $("#adv_ville").val('default');
    $("#adv_ville").selectpicker("refresh");
    $('#btn_addAdv').button('reset');
    $('#addAdvModal').modal('hide');
}

function removeProc(procId){
    $('#'+procId).remove();
    procList = JSON.parse(localStorage.getItem('procList'));
    delete procList[procId];
    localStorage.setItem("procList",JSON.stringify(procList));
}
function addProc_form_submit(e,form){

    e.preventDefault();
    $('#btn_addProc').button('loading');

    var formdata = $(form).serializeArray();
    var data = {}

    for(i=0;i<formdata.length;i++){
        data[formdata[i].name]=formdata[i].value;
    }
    var procId = makeid();
    newProc = "<div class=\"col-md-4\" id='"+procId+"'>\n" +
        "<div class=\"block block-condensed\">\n" +
        "<div class=\"app-heading app-heading-small\">\n" +
        "<div class=\"title\">\n" +
        "<h2>"+$('#proc_type').find(":selected").text()+"</h2>\n" +
        "</div>\n" +
        "<div class=\"heading-elements\">\n" +
        //"<a href=\"#\" class=\"btn btn-clean btn-warning btn-default btn-sm\" ><span class=\"fa fa-edit\"></span></a>\n" +
        "<a href=\"#\" class=\"btn btn-clean btn-danger btn-default btn-sm\" onclick='removeProc(\""+procId+"\")'><span class=\"fa fa-remove\"></span></a>\n" +
        "</div>\n" +
        "</div>\n" +
        "<div class=\"block-content\">\n" +
        "<p>\n" +
        "<strong>Créance :</strong>\n" +
        "<br>"+$('#proc_creance').val() +" DHS" +
        "</p>\n" +
        /*"<p>\n" +
        "<strong>Tribunal :</strong>\n" +
        "<br>"+$('#proc_tribunal').find(":selected").text().replace("|","de")+
        "</p>\n" +*/
        "<p>\n" +
        "<i>"+$('#proc_commentaire').val()+"</i>\n" +
        "</p>\n" +
        "</div>\n" +
        "</div>\n" +
        "</div>";

    $('#procList').append(newProc);
    if(localStorage.getItem('procList')){
        procList = JSON.parse(localStorage.getItem('procList'));

        procList[procId] = {
            'proc_type': $('#proc_type').val(),
            'proc_creance': $('#proc_creance').val(),
            'proc_commentaire': $('#proc_commentaire').val()
        };
        localStorage.setItem('procList',JSON.stringify(procList));
    }else{
        procList[procId] = {
            'proc_type': $('#proc_type').val(),
            'proc_creance': $('#proc_creance').val(),
            'proc_commentaire': $('#proc_commentaire').val()
        };
        localStorage.setItem('procList',JSON.stringify(procList));
    }

    $(form).trigger("reset");
    $("#proc_type").val('default');
    $("#proc_type").selectpicker("refresh");
    $('#btn_addProc').button('reset');
    $('#addProcModal').modal('hide');
}

function dossier_file_changeFile(e,input){

    if(input.value.length>0){
        var fileName = input.files[0].name
        $('#btn_addExcel').html('<span class="fa fa-check"></span>'+fileName)
    }else{
        $('#btn_addExcel').html('<span class="fa fa-file-excel-o"></span> Fichier Excel')
    }
}
$("#excelFile_form").on('submit',(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/dossierTrib/add",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
        {
            // if(data=='invalid')
            // {
            //     // invalid file format.
            //     $("#err").html("Invalid File !").fadeIn();
            // }
            // else
            // {
            //     // view uploaded file.
            //     $("#preview").html(data).fadeIn();
            //     $("#form")[0].reset();
            // }

            console.log(data)
        },
        error: function(e)
        {
            console.log(e)
            $(document).html(e)
        }
    });
}));

$('#btn_AddDossierTrib').on('click',function(){

    if($('#dossier_file').val().length>0){
        $('#excelFile_form').trigger('submit');
    }else{
        validateAdv() != true ? $('#nav_advTab').html($('#nav_advTab').html()+"<span class=\"informer informer-danger informer-sm\">!</span>"): $('#nav_advTab').html($('#nav_advTab').html().replace("<span class=\"informer informer-danger informer-sm\">!</span>",""));
        validateContrat() != true ? $('#nav_contratTab').html($('#nav_contratTab').html()+"<span class=\"informer informer-danger informer-sm\">!</span>"): $('#nav_contratTab').html($('#nav_contratTab').html().replace("<span class=\"informer informer-danger informer-sm\">!</span>",""));
        validateProcedures() != true ? $('#nav_procTab').html($('#nav_procTab').html()+"<span class=\"informer informer-danger informer-sm\">!</span>"): $('#nav_procTab').html($('#nav_procTab').html().replace("<span class=\"informer informer-danger informer-sm\">!</span>",""));

        if(validateAdv() && validateContrat() && validateProcedures()){
            $('#btn_addExcel').removeClass('btn-informer');
            $('#btn_AddDossierTrib').button('loading');
            procList = JSON.parse(localStorage.getItem('procList'));
            contratsList = JSON.parse(localStorage.getItem('contratsList'));
            adversairesList = JSON.parse(localStorage.getItem('adversairesList'));
            var data = {
                "procList":procList,
                "contratsList":contratsList,
                "adversairesList":adversairesList,
                "type_dossier":$('#cl_typeDossier').val(),
                "id_client":$('#cl_name').val(),
                "echeance_dossier":$('#cl_echeance').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/dossierTrib/add",
                method: 'post',
                data: data,
                success: function(result){
                    $('#cl_typeDossier').val('default');
                    $('#cl_typeDossier').selectpicker("refresh");
                    $('#cl_name').val('default');
                    $('#cl_name').selectpicker("refresh")
                    $('#cl_echeance').val('')
                    $('#btn_AddDossierTrib').button('reset')
                    if(result=='success'){
                        swal({
                            icon:'success',
                            button: "OK",
                            title:"Dossier Ajouté !"
                        }).then(function () {
                            window.location.replace('/dossier');
                        });
                    }else{
                        swal({
                            icon:'error',
                            button: "OK",
                            title:"Une Erreur s'est produite !"
                        });
                    }
                },
                error: function(error){
                    console.log("ERROR : ");
                    console.log(error);
                }
            });
        }else{
            $('#btn_addExcel').addClass('btn-informer');
            $('#btn_addExcel').html($('#btn_addExcel').html()+"<span class=\"informer informer-danger informer-sm\">!</span>")
        }
    }


});

