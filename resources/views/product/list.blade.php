@extends('layout2')

@section('pageHeader', 'List Product')

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
            @if(!empty($detail))
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Product Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Nama Product</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: {{ $productid->product_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Kategori Product</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">:
                                        
                                        @foreach ($detail as $det)
                                            {{ $det->category_name }},
                                        @endforeach
                                       
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Product Images</label></div>
                                <div class="col-2 col-md-9">
                                    <p class="form-control-static">: <br>
                                        @foreach ($productImages as $images)
                                            <img src="/{{ $images->image_name }}" width="150">
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a type="button" href="/admin/product" class="btn btn-outline-success btn-lg active">
                                OK
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Data Produk</strong>
                        <a href="/admin/product/create"><button type="button" class="btn btn-primary" style="float: right;">Tambah Product</button></a>
                    </div>   
                  <div class="card-body">
       
                       
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product Name</th>
                                        <!-- <th>Product Categories</th> -->
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Product Rate</th>
                                        <th>Created at</th>
                                        <th>Updated At</th>
                                        <th>Stock</th>
                                        <th>Weight</th>
                                        <th>Status Aktif</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                 @for ($i = 1; $i <= sizeof($products); $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $products[$i-1]->product_name }}</td>
                                            
                                            <td>{{ format_rupiah($products[$i-1]->price)}}</td>
                                            <td>{{ $products[$i-1]->description }}</td>
                                            <td>{{ $products[$i-1]->product_rate }}</td>
                                            <td>{{ $products[$i-1]->created_at }}</td>
                                            <td>{{ $products[$i-1]->updated_at }}</td>
                                            <td>{{ $products[$i-1]->stock }}</td>
                                            <td>{{ $products[$i-1]->weight }}</td>
                                            <td>
                                                @if( $products[$i-1]->status_aktif == 1 )
                                                    Aktif
                                                @else
                                                    Non Aktif
                                                @endif
                                            </td>
                                            <td>
                                            
                                                @if( $products[$i-1]->status_aktif == 0 )
                                                    <form action="/admin/product/{{$products[$i-1]->id}}/aktif" method="GET">
                                                        <button type="submit">
                                                            <i class="fa fa-edit">Aktif</i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if( $products[$i-1]->status_aktif == 1 )
                                                    <form action="/admin/product/{{$products[$i-1]->id}}" method="GET">
                                                        <button type="submit">
                                                            <i class="fa fa-cog">Detail</i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/product/{{$products[$i-1]->id}}/edit" method="GET">
                                                        <button type="submit">
                                                            <i class="fa fa-edit">Edit</i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/product/{{$products[$i-1]->id}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@stop
