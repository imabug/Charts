<script type="text/javascript">
    google.charts.load("current", {packages:["calendar"]});
    chart = google.charts.setOnLoadCallback(drawChart);
    var {{ $model->id }};
    function drawChart() {
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn({ type: 'date', id: 'Date'});
        dataTable.addColumn({ type: 'number', id: '{!! $model->element_label !!}'});
        dataTable.addRows([
                @for ($i = 0; $i < count($model->values); $i++)
                    [new Date("{!! $model->labels[$i] !!}"), {{ $model->values[$i] }}],
                @endfor
        ]);

        var options = {
            @include('charts::google.titles')
            @include('charts::_partials.dimension.js')
            fontSize: 12,
            legend: { position: 'top', alignment: 'end' }
        };

        {{ $model->id }} = new google.visualization.Calendar(document.getElementById("{{ $model->id }}"));

        {{ $model->id }}.draw(dataTable, options);
    }
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
