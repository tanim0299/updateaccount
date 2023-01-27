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
                <h3 class="m-0">Main Menu</h3>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="{{route('main_menu.index')}}" class="btn btn-sm btn-dark">View Main Menu</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="white_card_body">
    <div class="QA_section">
        <div class="QA_table mb_30">

            <form action="{{route('main_menu.update',$data->id)}}" method="post" id="form">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Serial No</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="@error('serial_no') is-invalid @enderror form-control form-control-sm" name="serial_no" id="inputText" placeholder="" value="{{$data->serial_no}}">
                            </div>
                            @error('serial_no')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Main Menu Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('main_menu_name') is-invalid @enderror" name="main_menu_name" id="inputText" placeholder="" value="{{$data->main_menu_name}}">
                            </div>
                            @error('main_menu_name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Icon Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('icon') is-invalid @enderror" name="icon" id="inputText" value="fas fa-stop-circle" value="{{$data->icon}}">
                            </div>
                            @error('icon')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-4">
                        <div class="white_card_body">
                        <label>Status</label><span class="text-danger" style="font-size: 15px;">*</span>
                        <div class="checkbox_wrap d-flex align-items-center">
                            <label class="form-label lms_checkbox_1" for="course_3" name="">
                            <input type="checkbox" id="course_3" name="status">
                            <div class="slider-check round"></div>
                            </label>
                            @error('status')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div> --}}

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
