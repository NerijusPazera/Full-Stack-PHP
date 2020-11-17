<table class="my-table" {!! html_attr($attr ?? []) !!}>
    <thead>
    @foreach($headers ?? [] as $header_name => $header)
        <th {!! html_attr($header['attr'] ?? []) !!}>{{ $header_name }}</th>
    @endforeach
    </thead>
    <tbody>
    @foreach($rows ?? [] as $row)
        <tr>
            @foreach($row ?? [] as $td)
                <td>{!! $td !!}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
