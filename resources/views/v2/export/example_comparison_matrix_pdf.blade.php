<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <style>
        * {
            font-family: "DejaVu Sans Mono", monospace;
        }
    </style>
</head>
<h1>{{ $projectName }}</h1>

<table>
    @foreach($dataComparison as $comparison)
    <tr>
        <th>{{ !empty($comparison->aspect) ? $comparison->aspect : '' }}</th>
{{--        <th>{{ !empty(($comparison->competitor1)) ? $comparison->competitor1 : '' }}</th>--}}
        <th>{{ !empty(($comparison->competitor1)) ? $comparison->competitor1 : '' }}</th>
        <th>{{ !empty($comparison->competitor2) ? $comparison->competitor2 : '' }}</th>
        <th>{{ !empty($comparison->competitor3) ? $comparison->competitor3 : '' }}</th>
        <th>{{ !empty($comparison->competitor4) ? $comparison->competitor4 : '' }}</th>
        <th>{{ !empty($comparison->competitor5) ? $comparison->competitor5 : '' }}</th>
    </tr>
    @endforeach
</table>
