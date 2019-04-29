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
                            <form action="/admin/categories-details" method="POST" class="form">
                            @csrf
                                <div class="card-body card-block">
                                    <div class="card-header">
                                        <h1>
                                            <strong>Tambah</strong> <small> Data Product Category Details </small>
                                        </h1>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_address" class="text-black">Nama Produk <span class="text-danger">*</span></label>
                                                <select name="product_id" id="product_id" class="form-control">
                                                    @for ($i = 1; $i <= sizeof($products); $i++)
                                                        <option value="{{ $products[$i-1]->id }}">{{ $products[$i-1]->product_name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="c_address" class="text-black">Nama Kategori <span class="text-danger">*</span></label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @for ($i = 1; $i <= sizeof($categories); $i++)
                                                        <option value="{{ $categories[$i-1]->id }}">{{ $categories[$i-1]->category_name }}</option>
                                                    @endfor
                                                </select>
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
