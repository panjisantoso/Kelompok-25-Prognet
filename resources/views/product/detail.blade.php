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
                        <strong class="card-title">Product Details</strong>
                    </div>
                    
                    <div class="card-body">
                        <div class="preview col-lg-4 col-md-12">
                            <div class="preview-pic tab-content">
                                @for($i=1; $i<=sizeof($productImages); $i++)
                                    @if($i == 1)
                                        <div class="tab-pane active" id="product_{{ $i }}">
                                            <a href="/{{ $productImages[$i-1]->image_name }}">
                                                <img src="/{{ $productImages[$i-1]->image_name }}" alt="" class="img-fluid" />
                                            </a>
                                        </div>
                                    @else
                                        <div class="tab-pane" id="product_{{ $i }}">
                                            <a href="/{{ $productImages[$i-1]->image_name }}">
                                                <img src="/{{ $productImages[$i-1]->image_name }}" alt="" class="img-fluid" />
                                            </a>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                @for($i=1; $i<=sizeof($productImages); $i++)
                                    @if($i == 1)
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product_{{ $i }}"><img src="/{{ $productImages[$i-1]->image_name }}" alt="" /></a></li>
                                    @else
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_{{$i}}"><img src="/{{ $productImages[$i-1]->image_name }}" alt="" /></a></li>
                                    @endif
                                @endfor
                            </ul>  
                        </div>
                        
                        <div class="col-lg-8 ">
                            <form action="/admin/product" method="POST" class="form">
                                @csrf
                                @method("PUT")
                                <h2 class="text-black">{{ $productid->product_name }}</h2>
                                <pre>{{ $productid->description }}</pre>
                                <p class="mb-4">Categories : 
                                @for($i=1; $i<=sizeof($detail); $i++)
                                    @if($i == sizeof($detail))
                                        {{ $detail[$i-1]->category_name }}.
                                    @else
                                        {{ $detail[$i-1]->category_name }},
                                    @endif
                                @endfor
                                
                                </p>
                                <p><strong class="text-primary h4">{{ format_rupiah($productid->price)}}</strong></p>
                                <div class="mb-5">
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a type="button" href="/admin/product" class="btn btn-outline-success btn-lg active">
                                        OK
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
