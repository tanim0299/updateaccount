<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_menu;
use Auth;
use DB;

class MainMenuController extends Controller
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
        $data = main_menu::all();
        return view('Backend.User.MainMenu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.MainMenu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'serial_no'=>'required',
            'main_menu_name'=>'required',
            // 'icon'=>'required',
            'status'=>'required',
        ],[
            'serial_no.required'=>'Please Give Serial Number',
            'main_menu_name.required'=>'Please Give Menu Name',
            'status.required'=>'Please Give Status',
        ]);

        $menu_id = $this->AutoCode('main_menus','menu_id','MAIN-','10');


        if($request->status == 'on')
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }

        $data = array(
            'serial_no'             =>$request->serial_no,
            'menu_id'               =>$menu_id,
            'main_menu_name'        =>$request->main_menu_name,
            'icon'                  =>$request->icon,
            'status'                =>$status,
            'admin_id'              =>Auth::user()->id,
        );

        $insert = main_menu::create($data);

        if($insert)
        {
            return redirect('/main_menu')->with('success','Main Menu Created');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
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
        $data = main_menu::find($id);

        return view('Backend.User.MainMenu.edit',compact('data'));
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

        $validated = $request->validate([
            'serial_no'=>'required',
            'main_menu_name'=>'required',
        ],[
            'serial_no.required'=>'Please Give Serial Number',
            'main_menu_name.required'=>'Please Give Menu Name',
        ]);



        $data = array(
            'serial_no'             =>$request->serial_no,
            'main_menu_name'        =>$request->main_menu_name,
            'icon'                  =>$request->icon,
            'admin_id'              =>Auth::user()->id,
        );

        $update = main_menu::find($id)->update($data);

        if($update)
        {
            return redirect('main_menu')->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = main_menu::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Main Menu Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }

    public function mainMenuStatusChange(Request $request){
        $check = main_menu::find($request->menu_id);

        if($check->status == 1)
        {
            main_menu::find($request->menu_id)->update(['status'=>0]);
        }
        else
        {
            main_menu::find($request->menu_id)->update(['status'=>1]);
        }

        return 1;

    }

}
