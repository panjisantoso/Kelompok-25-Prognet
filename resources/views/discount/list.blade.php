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
                        <strong class="card-title">List Data Discounts</strong>
                        <a href="/admin/discounts/create"><button type="button" class="btn btn-primary" style="float: right;">Tambah Diskon Baru</button></a>
                    </div>   
                  <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Discounts</th>
                                        <th>Nama Produk</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= sizeof($discounts); $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $discounts[$i-1]->percentage }}%</td>
                                            <td>{{ $products[$i-1]->product_name }}</td>
                                            <td>{{ $discounts[$i-1]->start }}</td>
                                            <td>{{ $discounts[$i-1]->end }}</td>
                                           
                                            <td>
                                                    <form action="/admin/discounts/{{$discounts[$i-1]->id}}/edit" method="GET">
                                                        <button type="submit">
                                                            <i class="fa fa-edit">Edit</i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/discounts/{{$discounts[$i-1]->id}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </button>
                                                    </form>
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