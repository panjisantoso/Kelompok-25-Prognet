@extends('layout2')

@section('pageHeader', 'Dashboard')

@section('isi')
        
<div class="content mt-3" bg-color="black" >
    @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
    @endif
    @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Welcome</span> Selamat datang di Dashboard Admin.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <canvas id="canvas"></canvas>
            </div>     
            <div class="col-sm-4">
                    <h4 class="card-title mb-0">Traffic</h4>
                    <div class="small text-muted">October 2017</div>
                </div>
                <!--/.col-->
                <div class="col-sm-8 hidden-sm-down">
                    <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button>
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="options" id="option1"> Day
                            </label>
                            <label class="btn btn-outline-secondary active">
                                <input type="radio" name="options" id="option2" checked=""> Month
                            </label>
                            <label class="btn btn-outline-secondary">
                                <input type="radio" name="options" id="option3"> Year
                            </label>
                        </div>
                    </div>
                </div>  

@endsection
<script>
    var bulan = <?php echo json_encode($reportBulanan); ?>;
    console.log(bulan)
    var bulanLabel = bulan.map(bulan=>{
        return bulan.bulan;
    })
    var bulanData = bulan.map(bulan=>{
        return bulan.pendapatan;
    }) 



    var barChartData = {
        labels: bulanLabel,
        datasets: [{
            label: 'bulan',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: bulanData
        }]
    };


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Report Transaksi'
                }
            }
        });


    };
</script>
