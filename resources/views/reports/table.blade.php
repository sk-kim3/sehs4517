<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 5px;
        word-break: break-word;
    }
</style>

<table>
    <thead>
        <tr>
            @foreach($headers as $header)
            <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            @foreach($headers as $key)
            <td>{{ $row->{$key} }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>