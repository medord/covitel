<!DOCTYPE html>

<html lang="en">

<head>

    <title>COVITEL</title>



    <!-- META SECTION -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ Session::token() }}">


    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <link rel="stylesheet" href="{{asset('css/variables.css')}}">

    <!-- EOF CSS INCLUDE -->

</head>

<body>



    <!-- APP WRAPPER -->

    <div class="app">
        @yield('pageContent')
    </div>
    <!-- END APP WRAPPER -->



    <!-- IMPORTANT SCRIPTS -->

    <script type="text/javascript" src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/jquery/jquery-migrate.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/jquery/jquery-ui.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/moment/moment.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

    <!-- END IMPORTANT SCRIPTS -->

    <!-- THIS PAGE SCRIPTS -->

    <script type="text/javascript" src="{{asset('js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/select2/select2.full.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/bootstrap-daterange/daterangepicker.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/multiselect/jquery.multi-select.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/form-validator/jquery.form-validator.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/noty/jquery.noty.packaged.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/sweetalert/sweetalert.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/datatables/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

    <!-- END THIS PAGE SCRIPTS -->

    <!-- APP SCRIPTS -->

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/app_plugins.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/app_proc.js')}}"></script>



    <!-- END APP SCRIPTS -->



    <script type="text/javascript">

        $(document).ready(function() {



            // Création d'un dossier



            $(document).on('click', '.createRecordFormLink', function() {



                if( $(this).parents('.panel').hasClass('panel-primary') )



                    $(this).parents('.panel').removeClass('panel-primary');



                else



                    $(this).parents('.panel').addClass('panel-primary');





                $('.createRecordFormLink').not(this).parents('.panel').removeClass('panel-primary');



            });





            $(document).on('change', '[name="natureDebiteur"]', function() {



                if( $(this).val() == 'physique')

                {



                    $("#nomRaisonSocial").hide("slow", function() {



                        $(this).text("Nom & prénom").show("fast");



                    });



                    $("#cinRc").hide("slow", function() {



                        $(this).text("CIN").show("slow");



                    });



                } else

                {



                    $("#nomRaisonSocial").hide("slow", function() {



                        $(this).text("Raison sociale").show("fast");



                    });



                    $("#cinRc").hide("slow", function() {



                        $(this).text("RC").show("fast");



                    });



                }



            });





            $(document).on('keyup', '[name="referenceContrat"]', function() {



                if( $(this).val() == '123456789' )



                    $("#contratDejaExiste").show("slow");



                else



                    $("#contratDejaExiste").hide("slow");



            });



        });

    </script>



</body>

</html>

