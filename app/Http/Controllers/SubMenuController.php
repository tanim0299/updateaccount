<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_menu;
use App\Models\sub_menu;
use DB;
use Auth;

class SubMenuController extends Controller
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
        $data = sub_menu::leftjoin('main_menus','main_menus.id','sub_menus.main_menu_id')
                ->select('main_menus.main_menu_name','sub_menus.*')
                ->get();
        return view('Backend.User.SubMenu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $main_menu = main_menu::where('status',1)->get();

        return view('Backend.User.SubMenu.create',compact('main_menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->main_menu_id;
        $validated = $request->validate([
            'serial_no'=>'required',
            'main_menu_id'=>'required',
            'sub_menu_name'=>'required',
            'route'=>'required',
            'status'=>'required',
        ],[
            'serial_no.required'=>'Please Give Serial Number',
            'main_menu_id.required'=>'Select A Main Menu',
            'sub_menu_name.required'=>'Please Give A Sub Menu Name',
            'route.required'=>'Please Give A Sub Menu Name',
            'status.required'=>'Please Give This Menu A Status'
        ]);

        $sub_menu_id = $this->AutoCode('sub_menus','sub_menu_id','SUB-','10');

        if($request->status == 'on')
        {
            $status = 1;
        }
        else{
            $status = 0;
        }

        $data = array(
            'serial_no'         =>  $request->serial_no,
            'sub_menu_id'       =>  $sub_menu_id,
            'main_menu_id'      =>  $request->main_menu_id,
            'sub_menu_name'     =>  $request->sub_menu_name,
            'route'             =>  $request->route,
            'status'            =>  $status,
            'admin_id'          =>  Auth::user()->id,
        );

        $insert = sub_menu::create($data);

        if($insert)
        {
            return redirect('/sub_menu')->with('success','Sub Menu Created');
        }
        else
        {
            return redirect()->back()->with('error','Sub Menu Created Failed');
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
        $main_menu = main_menu::where('status',1)->get();
        $data = sub_menu::find($id);
        return view('Backend.User.SubMenu.edit',compact('data','main_menu'));
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
            'main_menu_id'=>'required',
            'sub_menu_name'=>'required',
            'route'=>'required',
        ],[
            'serial_no.required'=>'Please Give Serial Number',
            'main_menu_id.required'=>'Select A Main Menu',
            'sub_menu_name.required'=>'Please Give A Sub Menu Name',
            'route.required'=>'Please Give A Sub Menu Name',
        ]);

        $data = array(
            'serial_no'         =>  $request->serial_no,
            'main_menu_id'      =>  $request->main_menu_id,
            'sub_menu_name'     =>  $request->sub_menu_name,
            'route'             =>  $request->route,
            'admin_id'          =>  Auth::user()->id,
        );

        $insert = sub_menu::find($id)->update($data);

        if($insert)
        {
            return redirect('/sub_menu')->with('success','Sub Menu Updated');
        }
        else
        {
            return redirect()->back()->with('error','Sub Menu Updated Failed');
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
        //
    }

    public function subMenuStatusChange(Request $request)
    {

        $check = sub_menu::find($request->menu_id);

        if($check->status == 1)
        {
            sub_menu::find($request->menu_id)->update(['status'=>0]);
        }
        else
        {
            sub_menu::find($request->menu_id)->update(['status'=>1]);
        }

        return 1;

    }
}
