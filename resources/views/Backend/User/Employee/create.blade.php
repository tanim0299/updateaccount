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
                <h3 class="m-0">Employee</h3>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="{{route('employee_info.index')}}" class="btn btn-sm btn-dark">View Employee</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="white_card_body">
    <div class="QA_section">
        <div class="QA_table mb_30">

            <form action="{{route('employee_info.store')}}" method="post" id="form" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-4" id="NameBox">
                        <div class="white_card_body">
                        <label>Name</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <input type="text" class="@error('name') is-invalid @enderror form-control form-control-sm" name="name" placeholder="" id="name">
                            </div>
                            @error('name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Fathers Name</label>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('fathers_name') is-invalid @enderror" name="fathers_name" id="inputText" placeholder="">
                            </div>
                            @error('fathers_name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Mothers Name</label>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('mothers_name') is-invalid @enderror" name="mothers_name" id="inputText">
                            </div>
                            @error('mothers_name')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body" id="PhoneBox">
                        <label>Phone Number</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <table class="phone-input" border="1">
                                <tr>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n0"  data-next="1"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n1"  data-next="2"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n2"  data-next="3"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n3"  data-next="4"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n4"  data-next="5"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n5"  data-next="6"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n6"  data-next="7"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n7"  data-next="8"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n8"  data-next="9"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n9"  data-next="10"></td>
                                    <td><input type="text" name="phone_number[]" maxlength="1" class="authInput" id="n10"  data-next="11"></td>
                                </tr>
                            </table>
                            </div>
                            @error('phone_number')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body" id="PhoneBox">
                        <label>Phone Number 2</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="mt-1">
                            <table class="phone-input" border="1">
                                <tr>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i0"  data-next="1"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i1"  data-next="2"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i2"  data-next="3"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i3"  data-next="4"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i4"  data-next="5"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i5"  data-next="6"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i6"  data-next="7"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i7"  data-next="8"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i8"  data-next="9"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i9"  data-next="10"></td>
                                    <td><input type="text" name="phone_number2[]" maxlength="1" class="authInput2" id="i10"  data-next="11"></td>
                                </tr>
                            </table>
                            </div>
                            @error('phone_number')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Email</label>
                            <div class="mt-1">
                            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="inputText">
                            </div>
                            @error('email')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Designation</label>
                            <div class="mt-1">
                            <input type="text" class="form-control form-control-sm @error('designation') is-invalid @enderror" name="designation" id="inputText">
                            </div>
                            @error('designation')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="white_card_body">
                            <label class="" for="#">Gender:</label><span class="text-danger" style="font-size: 15px;">*</span>
                            <div class="common_select" id="">
                                <select class="nice_Select wide mb_30" name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            @error('gender')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Religion</label><span class="text-danger" style="font-size: 15px;">*</span>
                        <div class="common_select">
                            <select class="nice_Select wide mb_30" name="religion" id="religion">
                                {{-- <option selected disabled >--- Select One ----</option> --}}
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Chirstian">Chirstian</option>
                            </select>
                            </div>
                            @error('religion')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Present Adress</label>
                            <div class="mt-1">
                            <textarea class="form-control @error('present_address') is-invalid @enderror" name="present_address"></textarea>
                            @error('present_address')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Permnent Adress</label>
                            <div class="mt-1">
                            <textarea class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address"></textarea>
                            @error('permanent_address')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Joinig Date</label>
                        <div class="input-group common_date_picker">
                            <input class="form-control-sm @error('joining_date') is-invalid @enderror" type="text" data-language="en" name="joining_date" id="start_datepicker">
                        </div>
                    </div>
                    </div>

                    <div class="col-4">
                        <div class="white_card_body">
                        <label>Status</label><span class="text-danger" style="font-size: 15px;">*</span>
                        <div class="checkbox_wrap d-flex align-items-center">
                            <label class="form-label lms_checkbox_1" for="course_3" name="">
                            <input type="checkbox" id="course_3" name="status" id="">
                            <div class="slider-check round" id="status"></div>
                            </label>
                            @error('status')
                                <div class="alert alert-danger alert-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>Image</label>
                        <div class="input-group common_date_picker">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" data-language="en" name="image" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                    <img id="output" style="height: 110px;width:100px;"/>
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                    </script>
                    </div>

                    <div class="col-6">
                        <div class="white_card_body">
                        <label>NID</label>
                        <div class="input-group common_date_picker">
                            <input class="form-control @error('nid') is-invalid @enderror" type="file" data-language="en" name="nid" accept="image/*" onchange="loadFile2(event)">
                        </div>
                    </div>
                    <img id="output2" style="height: 110px;width:100px;"/>
                    <script>
                    var loadFile2 = function(event) {
                        var output = document.getElementById('output2');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output2.src) // free memory
                        }
                    };
                    </script>
                    </div>

                    <div class="col-12 mt-4" style="text-align: center;">
                        <input type="submit" class="btn btn-sm btn-success w-100" value="Save" id="submit">
                        <input type="button" class="btn btn-sm btn-success w-100" value="Loading..." id="Loading">
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




    <script>
        $('#Loading').hide();

        $('#name').on('keyup',function(){

            $(this).removeClass('is-invalid');

        });

        $('#form').on('submit',function(e){

            e.preventDefault();



            var name = $('#name').val();

            // alert(name);

            if(name == "")
            {
                $('input#name').addClass('is-invalid');
                $(function() {
                    var target = $('#NameBox');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 100);
                        return false;
                    }
                });
            }
            else
            {

                $.ajax({

                    headers : {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },

                    url : '{{ route('employee_info.store') }}',


                    type : 'POST',


                    data : new FormData(this),

                    dataType:'JSON',

                    contentType: false,

                    cache: false,

                    processData: false,

                    beforeSend : function() {
                        $('#bodyTag').prop('disabled',true);
                        $('#Loading').show();
                        $('#submit').hide();
                    },

                    success : function(response)
                    {

                        if(response == 1)
                        {
                            swal('', 'Employee Information Added', 'success');
                        }
                        else
                        {
                            swal('', 'Employee Information Added Faild', 'error');
                        }
                        $('#bodyTag').prop('disabled',false);
                        $('#Loading').hide();
                        $('#submit').show();
                    }

                });

            }

        });
    </script>


<script>
$('.authInput').keyup(function(e) {
    if (this.value.length === this.maxLength) {
        let next = $(this).data('next');
        $('#n' + next).focus();
    }
});
</script>

<script>
$('.authInput2').keyup(function(e) {
    if (this.value.length === this.maxLength) {
        let next = $(this).data('next');
        $('#i' + next).focus();
    }
});
</script>

<script>

</script>

@endsection
