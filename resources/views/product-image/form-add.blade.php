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
                            <form action="/admin/product-images" method="POST" class="form" enctype="multipart/form-data">
                            @csrf
                                <div class="card-body card-block">
                                    <div class="card-header">
                                        <h1>
                                            <strong>Tambah</strong> <small> Data Product Images</small>
                                        </h1>
                                    </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_address" class="text-black">Nama Produk <span class="text-danger">*</span></label>
                                                <select name="product_id" id="product_id" class="form-control">
                                                    @for ($i = 1; $i <= sizeof($product); $i++)
                                                        <option value="{{ $product[$i-1]->id }}">{{ $product[$i-1]->product_name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_address" class="text-black">File Gambar<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" required name="image[]" id="image" multiple accept="image/*" placeholder="Masukkan FIle Gambar">
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
