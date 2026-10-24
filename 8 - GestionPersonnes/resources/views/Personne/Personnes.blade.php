<html>
    <head>
        <title>Page Personnes</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/Liste.css') }}">
        <!-- <link href="{{ asset('css/Liste.css') }}" rel="stylesheet"> -->

    </head>

    <body>
        <a href="/Personnes/Add"><button>Add</button></a></br></br>
        <table width="100%" border="1">
            <tr>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>sexe</th>
                <th>Date de Naissance</th>
                <th>Nationalité</th>
                <th>Action</th>
            </tr>
            @foreach($Personnes as $per)
            <tr>
                <td>{{$per->cin}}</td>
                <td>{{$per->nom}}</td>
                <td>{{$per->prenom}}</td>
                <td>{{$per->sexe}}</td>
                <td>{{$per->datenaissance}}</td>
                <td>{{$per->nationalite}}</td>
                <td>
                    <form action="{{route('delete',$per->cin)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('page.update',$per->cin)}}"> <button>Update</button></a>
                    
                </td>
            </tr>

            @endforeach

        </table>
    </body>
</html>