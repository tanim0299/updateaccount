@extends('Backend.Layouts.master')
@section('body')
<!-- Content wrapper -->
<div class="main_content_iner ">
    <div class="container-fluid p-0">
    <div class="row justify-content-center">
    <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    <div class="">
    <div class="main-title">
        <div class="row">
            <div class="col-6">
                <h3 class="m-0">Sub Menu</h3>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="{{route('sub_menu.index')}}" class="btn btn-sm btn-dark">View Sub Menu</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="white_card_body">
    <div class="QA_section">
        <div class="QA_table mb_30">

            <form action="{{route('sub_menu.update',$data->id)}}" method="post" id="form">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Serial No</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="@error('serial_no') is-invalid @enderror form-control form-control-sm" name="serial_no" id="inputText" value="{{$data->serial_no}}">
                            </div>
                            @error('serial_no')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Main Menu Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <select class="form-control form-control-sm js-example-basic-single" name="main_menu_id">
                                <option selected disabled >--- Select One ----</option>
                                @if($main_menu)
                                @foreach ($main_menu as $v)
                                <option @if($data->main_menu_id == $v->id) selected @endif value="{{$v->id}}">{{$v->main_menu_name}}</option>
                                @endforeach
                                @endif
                            </select>
                            </div>
                            @error('main_menu_name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Sub Menu Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="@error('sub_menu_name') is-invalid @enderror form-control form-control-sm" name="sub_menu_name" id="inputText" value="{{$data->sub_menu_name}}">
                            </div>
                            @error('sub_menu_name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Route Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('route') is-invalid @enderror" name="route" id="inputText" value="{{$data->route}}">
                            </div>
                            @error('route')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="col-12" style="text-align: center;">
                        <input type="submit" class="btn btn-sm btn-success" value="Save">
                    </div>


                </div>

            </form>

            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
