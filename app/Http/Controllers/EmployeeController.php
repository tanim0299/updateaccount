<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee_info;
use DB;
use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AutoCode($table, $fildname, $prefix, $length)
    {
        $id_length = $length;
        $max_id = DB::table($table)->max($fildname);
        $prefix = $prefix;
        $prefix_length = strlen($prefix);
        $only_id = substr($max_id, $prefix_length);
        $new = (int)($only_id);
        $new++;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        $made_id = $prefix . $zero . $new;
        return $made_id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = employee_info::all();

        return view('Backend.User.Employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return base_path();
        return view('Backend.User.Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->email;


        $emp_id = $this->AutoCode('employee_infos','emp_id','EMP-','10');


        $phone = $request->phone_number[0].$request->phone_number[1].$request->phone_number[2].$request->phone_number[3].$request->phone_number[4].$request->phone_number[5].$request->phone_number[6].$request->phone_number[7].$request->phone_number[8].$request->phone_number[9].$request->phone_number[10];

        // return $phone;

        $phone2 = $request->phone_number2[0].$request->phone_number2[1].$request->phone_number2[2].$request->phone_number2[3].$request->phone_number2[4].$request->phone_number2[5].$request->phone_number2[6].$request->phone_number2[7].$request->phone_number2[8].$request->phone_number2[9].$request->phone_number2[10];

        if(isset($request->joining_date))
        {

            $explode = explode('/',$request->joining_date);

            $joining_date = $explode[2].'-'.$explode[0].'-'.$explode[1];
        }
        else
        {
            $joining_date = date('Y-m-d');
        }

        if($request->status == 'on')
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }

        $data = array(
            'emp_id'=>$emp_id,
            'name'=>$request->name,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'phone_number'=>$phone,
            'phone_number2'=>$phone2,
            'email'=>$request->email,
            'designation'=>$request->designation,
            'gender'=>$request->gender,
            'religion'=>$request->religion,
            'present_address'=>$request->present_address,
            'permenant_address'=>$request->permenant_address,
            'joining_date'=>$joining_date,
            'status'=>$status,
            'image'=>'0',
            'nid'=>'0',
        );


        $insert = employee_info::create($data);

        if($insert)
        {
            $file1 = $request->file('image');
            $file2 = $request->file('nid');

            if($file1)
            {
                $imageName = rand().'.'.$file1->getClientOriginalExtension();

                $file1->move(base_path().'/Backend/img/EmployeeImage/',$imageName);

                employee_info::where('emp_id',$emp_id)->update(['image'=>$imageName]);
            }
            if($file2)
            {
                $imageName = rand().'.'.$file2->getClientOriginalExtension();

                $file2->move(base_path().'/Backend/img/EmployeeNid/',$imageName);

                employee_info::where('emp_id',$emp_id)->update(['nid'=>$imageName]);
            }

            return 1;
        }
        else
        {
            return 0;
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function employeeStatusChange(Request $request)
    {

        $check = employee_info::find($request->employee_id);

        if($check->status == 1)
        {
            employee_info::find($request->employee_id)->update(['status'=>0]);
        }
        else
        {
            employee_info::find($request->employee_id)->update(['status'=>1]);
        }

        return 1;

    }
}
