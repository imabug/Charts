<script type="text/javascript">
    chart = google.charts.setOnLoadCallback(drawChart)
    var {{ $model->id }};
    function drawChart() {
        var dataTable = google.visualization.DataTable();
        dataTable.addColumn({ type: 'date', id: 'Date'});
        dataTAble.addColumn({ type: 'number', id: '{!! $model->element_label !!}'});
        dataTable.addRows([
                @for ($i = 0; $i < count($model->values); $i++)
                    ["{!! $model->labels[$i] !!}", {{ $model->values[$i] }}],
                @endfor
        ]);

        var options = {
            @include('charts::_partials.dimension.js')
            fontSize: 12,
            @include('charts::google.titles')
            legend: { position: 'top', alignment: 'end' }
        };

        {{ $model->id }} = new google.visualization.Calendar(document.getElementById("{{ $model->id }}"))

        {{ $model->id }}.draw(data, options)
    }
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
