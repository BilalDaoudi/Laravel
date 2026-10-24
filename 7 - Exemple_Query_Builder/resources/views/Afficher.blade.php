@if(count($rows)>0)
<table border="2">
    <tr>
        @foreach($rows[0] as $key=> $row)
        <td>{{ $key }}</td>
        @endforeach
    </tr>
    @foreach($rows as $row)
    <tr>
        @foreach($row as $colonne)
        <td>{{ $colonne }}</td>
        @endforeach
    </tr>
    @endforeach

</table>
@else
    Table Vide
@endif
