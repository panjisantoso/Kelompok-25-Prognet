@extends('layouts.layout1')

@section('pageHeader', 'Home')

@section('isi')

<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section site-section block-3 site-blocks-2 bg-light">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  
                  
                </div>
              </div>
            </div>
            <div class="row mb-5">
          
            @for($i = 1; $i <=sizeof($products); $i++)
            
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                  @foreach($productImages as $images)
                    @if($images->product_id == $products[$i-1]->id)
                        <a >
                            <img src="/{{ $images->image_name }}" alt="Image placeholder" class="img-fluid">
                        </a>   
                      @break
                    @endif
                @endforeach
                </figure>
                  <div class="block-4-text p-4">
                    <h3><a >{{ $products[$i-1]->product_name }}</a></h3>
                    <p class="mb-0">{{ format_rupiah($products[$i-1]->price)}}</p>
                    <p class="text-primary font-weight-bold"></p>

                    <form action="/shop/{{$products[$i-1]->id}}" method="GET">
                      <button type="submit">
                          <i class="fa fa-edit">SHOP NOW</i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              
              
            @endfor
          
            </div>
          
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                @foreach($categories as $cat)
                 <li class="mb-1"><a href="#" class="d-flex"><span>{{ $cat->category_name }}</span> <span class="text-black ml-auto"></span></a></li>
                @endforeach
             </ul>
            </div>

            
  

        
      </div>
    </div>

@stop