{{$Personne->sexe == 'Homme' ? true : false }}
<html>

<head>
    <title>Page Update Personne {{$Personne->cin}}</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/form.css') }}">

</head>

<body>
    <div>
        <form action="/Personnes" method="POST">
            @csrf
            @method('PUT')
            <table width="30%">
                <tr>
                    <td>CIN : </td>
                    <td><input type="text" name="cin" value='{{$Personne->cin}}' readonly/></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" value='{{$Personne->nom}}' /></td>
                </tr>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" value='{{$Personne->prenom}}' /></td>
                </tr>
                <tr>
                    <td>Date de Naissance : </td>
                    <td><input type="date" name="datenaissance" value='{{$Personne->datenaissance}}' /></td>
                </tr>
                <tr>
                    <td>Sexe : </td>
                    <td>
                        <input type="radio" name="sexe" value="Homme" checked = "{{$Personne->sexe == 'Homme' ? true : false }}" /> Homme
                        <input type="radio" name="sexe" value="Femme" checked = "{{$Personne->sexe == 'Femme' ? true : false }}" /> Femme
                    </td>
                </tr>
                <tr>
                    <td>Nationalité : </td>
                    <td>
                        <select name="nationalite">
                            <option value="France" selected = "{{$Personne->nationalite == 'France' ? true : false }}">France</option>
                            <option value="Maroc"  selected = "{{$Personne->nationalite == 'Maroc' ? true : false }}">Maroc</option>
                            <option value="Algerie"  selected = "{{$Personne->nationalite == 'Algerie' ? true : false }}">Algerie</option>
                            <option value="Portugal"  selected = "{{$Personne->nationalite == 'Portugal' ? true : false }}">Portugal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>