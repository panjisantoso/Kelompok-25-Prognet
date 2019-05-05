@extends('layout2')

@section('pageHeader', 'Detail Product')

@section('isi')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
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
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Detail Product</strong>   
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Nama Product</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $products->product_name }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Harga Product</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $products->price }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Description</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $products->description }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Product Rate</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ product_rate }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Stock</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $products->stock }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Weight</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $products->weight }}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Product Categories</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ format_rupiah($saldo) }}</p>
                                </div>
                            </div>
                        </form>   
                    </div>
                    
                    <div class="card-header">
                        <h4 class="card-title" style="text-align: center;">Daftar Transaksi Terakhir</h4>
                    </div>
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">                  
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div class="detail-footer">
                        <form action="/products" method="GET">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i>Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
