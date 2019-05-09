@extends('layout2')

@section('pageHeader', 'Edit List Anggota')

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
                    <form action="/admin/product" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-header">
                            <h1>
                                <strong>Tambah</strong> <small> Product Data </small>
                            </h1>
                        </div>
                            <div class="card-body card-block">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label for="c_address" class="text-black">Nama Produk<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Masukkan Nama Produk">
                                    </div>
                                </div>
                                <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Kategori Produk</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                        @foreach($category as $cat)
                                            <input type="checkbox" id="category_id" name="category_id[]" value="{{ $cat->id }}" class="form-check-input">{{ $cat->category_name }}
                                            <br>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label for="c_address" class="text-black">Harga Produk <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga Produk" >
                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Deskripsi Produk</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Masukkan Deskripsi Produk..." ></textarea>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                <label for="c_address" class="text-black">Stock <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Masukkan Stok Awal Produk ini" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                <label for="c_address" class="text-black">Berat barang<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Masukkan berat barang" >
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
