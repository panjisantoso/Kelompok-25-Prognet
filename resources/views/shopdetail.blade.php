@extends('layouts.layout1')

@section('pageHeader', 'Home')

@section('isi')

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/index">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $productid->product_name }}</strong></div>
    </div>
  </div>
</div>  
<div class="site-section">
  <div class="container">
    <div class="row">
    </div>
  </div>
</div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">

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
    <div class="row">
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
            <form action="{{route('addToCart')}}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->product_name}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <input type="hidden" name="stock" value="{{$detail_product->stock}}">

                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{$detail_product->product_name}}</h2>
                            
                        {{-- <p>Code ID: {{$detail_product->p_code}}</p> --}}
                        {{-- <span>
                            <select name="size" id="idSize" class="form-control">
                        	<option value="">Select Size</option>
                            @foreach($detail_product->attributes as $attrs)
                                <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                            @endforeach
                        </select>
                        </span><br> --}}
                        
                        <span>
                            <span id="dynamic_price">Rp {{number_format($detail_product->price)}}</span>
                            <label>Quantity:</label>
                            <input type="text" name="quantity" id="inputStock"/>
                        </br>

                            @if($detail_product->stock >0)
                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
                        </span>
                        <p><b>Category:</b> 
                        @for($i=1; $i<=sizeof($detail); $i++)
                            @if($i == sizeof($detail))
                                {{ $detail[$i-1]->category_name }}.
                            @else
                                {{ $detail[$i-1]->category_name }},
                            @endif
                        @endfor
                        </p>
                        <p><b>Availability:</b>
                            @if($detail_product->stock >0)
                                <span id="availableStock">In Stock</span>
                            @else
                                <span id="availableStock">Out of Stock</span>
                            @endif
                        </p>
                        <p><b>Condition:</b> New</p>

                        <p><b>Discount:</b>@if(empty($dis)) None @else {{$dis->percentage}}% untill {{date('d M Y', strtotime($dis->end))}} @endif</p>
                        <p><b>Description:</b> 
                            <pre>{{ $detail_product->description }}</pre> 
                        </p>
                        <p>
                            @php
                                $a = 5;
                            @endphp
                            @for($i=0 ; $i< $detail_product->product_rate; $i++)
                                @php
                                    $a = $a-1;
                                @endphp
                                <span style="color: gold;" class="fa fa-star checked"></span>
                            @endfor
                            @for($i=0 ; $i< $a; $i++)
                                <span style="color: grey;" class="fa fa-star"></span>
                            @endfor
                        </p>
                        
                        {{-- <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> --}}
                    </div><!--/product-information-->
                </form>

                
            </div>
        </div>
        <div class="product-information">
        <h2><b>Product Review</b></h2>
            <br>
            @for($i=1; $i<=sizeof($review); $i++)
                <label> {{$i}}. {{ $review[$i-1]->name }}</label>
                <br>
                <input type="text" value=" {{ $review[$i-1]->content }} " readonly/>
                @php
                    $a = 5;
                    $b = $review[$i-1]->rate;
                @endphp
                @for($i=1 ; $i<=$b ; $i++)
                    @php
                        $a = $a-1;
                    @endphp
                    <span style="color: gold;" class="fa fa-star checked"></span>
                @endfor
                @for($i=0 ; $i< $a; $i++)
                    <span style="color: grey;" class="fa fa-star"></span>
                @endfor
                <br><br>
            @endfor
        </div>
      </div>
    </div>
  </div>
@stop