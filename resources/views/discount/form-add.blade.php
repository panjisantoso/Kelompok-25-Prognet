@extends('layout2')

@section('pageHeader', 'Tambah Data Anggota')

@section('isi')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                        <div class="card">
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
                            <form action="/admin/discounts" method="POST" class="form">
                            @csrf
                                <div class="card-body card-block">
                                    <div class="card-header">
                                        <h1>
                                            <strong>Tambah</strong> <small> Data Discounts </small>
                                        </h1>
                                    </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="c_address" class="text-black">Persentase Diskon<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Masukkan Persentase Diskon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="c_address" class="text-black">Persentase Diskon<span class="text-danger">*</span></label>
                                            <select name="id_product" id="id_product" class="form-control">
                                                @foreach($products as $p)
                                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="c_address" class="text-black">Tanggal Mulai<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="start" name="start" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="c_address" class="text-black">Tanggal Berakhir<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="end" name="end">
                                            </div>
                                        </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success btn-lg active">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@stop
