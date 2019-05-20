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
                                        <th>Product Images</th>
                                        <th>Product Categories</th>
                                        <th>Discount</th>
                                        <th>Price</th>
                                        <!-- <th>Description</th> -->
                                        <th>Product Rate</th>
                                        <!-- <th>Created at</th>
                                        <th>Updated At</th> -->
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
                                            <td>
                                                @foreach($productImages as $images)
                                                    @if($images->product_id == $products[$i-1]->id)
                                                    
                                                        
                                                        <form action="/admin/product-images/{{$images->id}}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <a href="/{{ $images->image_name }}">
                                                                <img src="/{{ $images->image_name }}" width="70"> 
                                                            </a>
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </form>
                                                        
                                                        
                                                    @endif
                                                @endforeach
                                                <form action="/admin/product-images/{{$products[$i-1]->id}}" method="POST" class="form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method("put")
                                                    
                                                    <input type="file"  required name="image[]" id="image" multiple accept="image/*" >
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                @foreach($productsjoin as $category)
                                                    @if($category->product_id == $products[$i-1]->id)
                                                        - {{ $category->category_name }}
                                                        <br>
                                                    
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($discounts as $d)
                                                    @if($d->id_product == $products[$i-1]->id)
                                                        {{ $d->percentage }}%
                                                        <br>
                                                    
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ format_rupiah($products[$i-1]->price)}}</td>
                                            <!-- <td>{{ $products[$i-1]->description }}</td> -->
                                            <td>{{ $products[$i-1]->product_rate }}</td>
                                            <!-- <td>{{ $products[$i-1]->created_at }}</td>
                                            <td>{{ $products[$i-1]->updated_at }}</td> -->
                                            <td>{{ $products[$i-1]->stock }} Item</td>
                                            <td>{{ $products[$i-1]->weight }} Kg</td>
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
