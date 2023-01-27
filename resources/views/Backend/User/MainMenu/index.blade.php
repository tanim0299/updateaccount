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
                <a href="{{route('main_menu.create')}}" class="btn btn-sm btn-dark">Add New</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="white_card_body">
    <div class="QA_section">
        <div class="QA_table mb_30">

            <table id="myTable">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Main Menu Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    @foreach ($data as $v)
                    <tr>
                        <td>{{$v->menu_id}}</td>
                        <td>{{$v->main_menu_name}}</td>
                        <td><i class="{{$v->icon}}"></i></td>
                        <td>
                            @if($v->status == 1)
                            <div class="badge bg-success">Active</div>
                            @else
                            <div class="badge bg-danger">Inactive</div>
                            @endif
                        </td>
                        <td>
                            @if($v->status == 1)
                            <div class="checkbox_wrap d-flex align-items-center">
                                <label class="form-label lms_checkbox_1" for="course_{{$v->id}}" name="">
                                <input value="{{$v->id}}" type="checkbox" id="course_{{$v->id}}" name="status" checked id="menuId" >
                                <div class="slider-check round" id="status" data-id="{{$v->id}}"></div>
                                </label>
                            </div>
                            @else
                            <div class="checkbox_wrap d-flex align-items-center">
                                <label class="form-label lms_checkbox_1" for="course_{{$v->id}}" name="">
                                <input value="{{$v->id}}" type="checkbox" id="course_{{$v->id}}" name="status" id="menuId">
                                <div class="slider-check round" id="status" data-id="{{$v->id}}"></div>
                                </label>
                            </div>
                            @endif
                        </td>
                        <td>

                            <a style="float: left;" href="{{route('main_menu.edit',$v->id)}}" class="action_btn mr_10"><i class="far fa-edit"></i></a>
                            <form action="{{ route('main_menu.destroy',$v->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are Your Sure?')" type="submit" class="action_btn mr_10"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script>
        // alert();


        $(document).on('click','#status',function(e){
            // alert();
            var menu_id = $(this).attr('data-id');

            // alert(menu_id);

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('mainMenuStatusChange') }}',

                type : 'POST',

                data : {menu_id},

                beforesend:{

                },

                success : function(data)
                {
                    if(data == 1)
                    {
                        location.reload();
                    }
                }

            });

        });

    </script>

@endsection
