@extends('layout2')

@section('pageHeader', 'Dashboard')

@section('isi')
        
<div class="content mt-3" bg-color="black" >
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
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Welcome</span> Selamat datang di Dashboard Admin.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
            
            
            
            
@endsection


            
                
                
                
            

