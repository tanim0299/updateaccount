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
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>NID</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    @foreach ($data as $v)
                    <tr>
                        <td>{{$v->emp_id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->phone_number}}</td>
                        <td>{{$v->designation}}</td>
                        <td>


                            <button class="btn btn-sm btn-info" type="button" uk-toggle="target: #modal-example-{{$v->id}}">View Image</button>

                            <!-- This is the modal -->
                            <div id="modal-example-{{$v->id}}" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body" style="text-align: center">
                                    <h2 class="uk-modal-title">Image</h2>
                                    <img src="{{asset('Backend/img/EmployeeImage')}}/{{$v->image}}" class="img-fluid">
                                    <p class="uk-text-right">

                                        <a href="{{asset('Backend/img/EmployeeImage')}}/{{$v->image}}" class="uk-button uk-button-primary" download="{{$v->emp_id}}.jpg">Download</a>
                                    </p>
                                </div>
                            </div>

                        </td>
                        <td>

                            <button class="btn btn-sm btn-info" type="button" uk-toggle="target: #modal-examplenid-{{$v->id}}">View NID</button>

                            <!-- This is the modal -->
                            <div id="modal-examplenid-{{$v->id}}" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body" style="text-align: center">
                                    <h2 class="uk-modal-title">NID</h2>
                                    <img src="{{asset('Backend/img/EmployeeNid')}}/{{$v->nid}}" class="img-fluid">
                                    <p class="uk-text-right">

                                        <a href="{{asset('Backend/img/EmployeeNid')}}/{{$v->nid}}" class="uk-button uk-button-primary" download="{{$v->emp_id}}.jpg">Download</a>
                                    </p>
                                </div>
                            </div>

                        </td>
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


    <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <p>
            TEST
        </p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
        </div>
        </div>

    <script>
        // alert();


        $(document).on('click','#status',function(e){
            // alert();
            var employee_id = $(this).attr('data-id');

            // alert(menu_id);

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('employeeStatusChange') }}',

                type : 'POST',

                data : {employee_id},

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
