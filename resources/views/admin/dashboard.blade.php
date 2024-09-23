@extends('components.layouts.app')

@section('content')
@livewire('adminlte.sidebar')
@livewire('adminlte.navbar')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">
                                <!-- Status Cards -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="status-card bg-success">
                                            <span>Unit Vessel<br><span style="font-size: 24px;">RFU</span></span>
                                            <span style="font-size: 33px; color: black;">{{ $rfu }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="status-card bg-primary">
                                            <span>VESSEL WAITING<br><span style="font-size: 24px;">PRIME MOVER</span></span>
                                            <span style="font-size: 33px; color: black;">{{$vessel_waiting_prime_mover}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="status-card bg-info">
                                            <span>SERVICE VESSEL<br><span style="font-size: 24px; color: transparent;">A</span></span>
                                            <span style="font-size: 33px; color: black;">{{$service_vessel}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="status-card bg-danger">
                                            <span>Unit Vessel<br><span style="font-size: 24px;">BREAKDOWN</span></span>
                                            <span style="font-size: 33px; color: black;">{{$breakdown}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="status-card bg-secondary">
                                            <span>PRIME MOVER<br><span style="font-size: 24px;">WAITING VESSEL</span></span>
                                            <span style="font-size: 33px; color: black;">{{$prime_mover_waiting_vessel}}</span>
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <h3>Actual Grafik</h3>
                                </center>

                                <!-- Bar Charts -->
                                <div class="row">
                                    <!-- Card -->
                                    @foreach ($grafik_vessel as $data)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">{{ $data['vessel'] }}</div>
                                            <div class="card-body chart-container" id="chart{{$data['id']}}"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
<!-- Chart -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    $(document).ready(function() {
        // Enable sorting on the cards
        $(".row").sortable({
            items: ".col-md-4",
            handle: ".card-header",
            placeholder: "ui-state-highlight"
        });

        // Highcharts options for bar charts
        function renderChart(containerId, title, data, max) {
            Highcharts.chart(containerId, {
                chart: {
                    type: 'column'
                },
                title: {
                    text: title
                },
                xAxis: {
                    categories: ['BD', 'RFU']
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    min: 0,
                    max: max // Adjust this based on your dynamic data
                },
                series: [{
                    name: 'Colors',
                    data: data, // Dynamic data
                    colorByPoint: true,
                    colors: ['#FF0000', '#00FF00']
                }]
            });
        }

        @foreach($grafik_vessel as $data)
        renderChart('chart{{$data['id']}}', '{{$data['vessel']}}', [{{ $data['total'] - $data['rfu']}} , {{$data['rfu']}}], {{$data['total']}});
        @endforeach

        // renderChart('chart1', 'A', [30, 40], 100);
        // renderChart('chart2', 'B', [30, 40], 100);
        // renderChart('chart3', 'C', [30, 40], 100);
    });
</script>