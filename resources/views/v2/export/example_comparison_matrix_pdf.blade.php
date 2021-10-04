<h1>{{ $projectName }}</h1>

<table>
    @foreach($dataComparison as $comparison)
    <tr>
        <th>{{ !empty($comparison->comparison_name) ? $comparison->comparison_name : '' }}</th>
        <th>{{ !empty($comparison->competitor1) ? $comparison->competitor1 : '' }}</th>
        <th>{{ !empty($comparison->competitor2) ? $comparison->competitor2 : '' }}</th>
        <th>{{ !empty($comparison->competitor3) ? $comparison->competitor3 : '' }}</th>
        <th>{{ !empty($comparison->competitor4) ? $comparison->competitor4 : '' }}</th>
        <th>{{ !empty($comparison->competitor5) ? $comparison->competitor5 : '' }}</th>
    </tr>
    @endforeach
</table>
