<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

    <style>
        /* td{
            height: 50px;
        } */
    </style>
    <script>
        setTimeout(function() {
            document.querySelector('.message').style.display = 'none';
        }, 5000);


        function chek(chekbutton, classname) {
            let destinataires = document.querySelectorAll("." + classname);
            for (var i = 0; i < destinataires.length; i++) {
                destinataires[i].checked = chekbutton.checked;
            }
        }
    </script>
</head>

<body>

    <div class="wrapper">


        @extends('layouts.main-header')
        @section('title','Envoyer des Messages')

        @include('layouts.main-sidebar')

        <div class="content-wrapper" style="margin-top:45px;background-color:antiquewhite;">
            <form method="post" action="{{ route('EnvoyerMessage.envoyer') }}">
                @csrf
                <div class="row">
                    <div class="col-8 text-danger"><b><i>Sélectionnez les messages que vous avez envoyés à vos destinataires.</i></b></div>
                    <div class="col-4 text-right">
                    <input type="submit" value="Envoyer" class="btn btn-primary" /></div>
                </div>
                <div class="row">

                    <div class="col-6 pl-4 pr-4">
                        <div style="height: 100%;">
                            <div class="h4 mb-4 text-center">
                                Destinataires
                            </div>
                            <div style="height: 450px; overflow-y: scroll;">
                                <table class="table bg-light table-hover">
                                    <tr>
                                        <td><input type="checkbox" id="tous_destinataires" onclick="chek(this,'destinataires')" /></td>
                                        <td colspan="2" ><label for="tous_destinataires" class="w-100"><b>Sélectionné Tous</b></label> </td>
                                    </tr>
                                    @foreach($destinataires as $des)
                                    <tr>
                                        <td style="width: 20px;"><input type="checkbox" id="des{{$des->id}}" name="destinataires[]" value="{{$des->id}}" class="destinataires" /></td>
                                        <td><label for="des{{$des->id}}" class="w-100">{{$des->nom}}</label></td>
                                        <td><label for="des{{$des->id}}" class="w-100">{{$des->numerotelephone}}</label></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-4 pr-4 ">
                        <div style="height: 100%;" >
                            <div class="h4 mb-4 w-100 text-center">
                                Messages
                            </div>
                            <div style="height: 420px; overflow-y: scroll;">
                                <table class="table bg-light table-hover">
                                    <tr>
                                        <td><input type="checkbox"  id="tous_messages" onclick="chek(this,'messages')" /></td>
                                        <td><label for="tous_messages" class="w-100"><b>Sélectionné Tous</b></label></td>
                                    </tr>
                                    @foreach($messages as $mes)
                                    <tr>
                                        <td style="width: 20px;"><input type="checkbox" name="messages[]" value="{{$mes->id}}" class="messages" id="m{{$mes->id}}" /></td>
                                        <td><label for="m{{$mes->id}}" class="  w-100">{{$mes->description}}</label></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    @include('layouts.footer-scripts')

</body>

</html>