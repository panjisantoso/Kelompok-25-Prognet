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
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span3"></div>
                    <div class="span6">
                        <div>
                            <canvas id="canvas"></canvas>
                        </div>       
                    </div>
                    <div class="span3"></div>                 
                </div>
            </div>
            
             <div class="container-fluid">
                <div class="row-fluid">
                <div class="span6">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong>Well done!</strong> {{Session::get('message')}}
                    </div>
                @endif
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5><center>Report Bulanan</center></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Pendapatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($reportBulanan as $b)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$b->bulan}}</td>
                                <td>Rp {{number_format($b->pendapatan)}}</td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
        
                 <div class="span6">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong>Well done!</strong> {{Session::get('message')}}
                    </div>
                @endif
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Report Tahunan</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Pendapatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reportTahunan as $t)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$t->tahun}}</td>
                                <td>Rp {{number_format($t->pendapatan)}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
