<html>

<head>
    <title>Page Add Personne</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/form.css') }}">

</head>

<body>
    <div>
        <form action="/Personnes" method="POST">
            @csrf
            <table>
                <tr>
                    <td>CIN : </td>
                    <td><input type="text" name="cin" /></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" /></td>
                </tr>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" /></td>
                </tr>
                <tr>
                    <td>Date de Naissance : </td>
                    <td><input type="date" name="datenaissance" /></td>
                </tr>
                <tr>
                    <td>Sexe : </td>
                    <td>
                        <input type="radio" name="sexe" value="Homme" /> Homme
                        <input type="radio" name="sexe" value="Femme" /> Femme
                    </td>
                </tr>
                <tr>
                    <td>Nationalité : </td>
                    <td>
                        <select name="nationalite">
                            <option value="Maroc">Maroc</option>
                            <option value="France">France</option>
                            <option value="Algerie">Algerie</option>
                            <option value="Germane">Germane</option>
                            <option value="Portugal">Portugal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>