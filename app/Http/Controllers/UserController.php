<?php

namespace App\Http\Controllers;

use App\Models\EmployeeData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->hasPermissionTo('user-view')) {

        return view('users.index');
        // }else{
        //     abort(404);
        // }
    }
    // Datatable
    public function getData(Request $request)
    {
        $draw                 =         $request->get('draw'); // Internal use
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        // $orderArray 	   = 		$request->get('order');
        // $columnNameArray 	= 		$request->get('columns'); // It will give us columns array

        $searchArray         =         $request->get('search');
        // $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        // $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name,
        // Base on the index we get

        // $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value


        $users = DB::table('employee_data');
        $total = $users->count();

        $totalFilter = DB::table('employee_data as ed')->join('users', 'ed.user_id', 'users.id')->select(
            'ed.id as id',
            'users.first_name as first_name',
            'users.last_name as last_name',
            'users.email as email',
            'ed.date_of_birth as date_of_birth',
            'users.phone as phone',
            'users.is_active as is_active',
            'users.created_at as created_at',
            'ed.cnic as cnic',
        );
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('first_name', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('email', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->where('last_name', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('phone', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('date_of_birth', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('cnic', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = DB::table('employee_data as ed')->join('users', 'ed.user_id', 'users.id')->select(
            'ed.id as id',
            'users.first_name as first_name',
            'users.last_name as last_name',
            'users.email as email',
            'users.is_active as is_active',
            'ed.date_of_birth as date_of_birth',
            'users.phone as phone',
            'users.created_at as created_at',
            'ed.cnic as cnic',
        );
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('first_name', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->where('last_name', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orWhere('email', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orWhere('phone', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orWhere('date_of_birth', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orWhere('cnic', 'like', '%' . $searchValue . '%');
        }

        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );

        return response()->json($response);
    }

    public function active_change($id)
    {
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
        echo json_encode(['success' => true, 'msg' => 'Status has been updated']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->hasPermissionTo('user-create')) {
        $usertype = UserType::get();
        return view('users.create', compact('usertype'));
        // }else{
        //     abort(404);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if(Auth::user()->hasPermissionTo('user-create')) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'date_of_birth' => 'required|date',
        ]);
        try {
            $data = $request->all();
            extract($data);
            $user = new User();
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->phone = $phone;
            $user->app_login = $app_login;
            $user->web_login = $web_login;
            $user->user_type = $role;
            $user->is_active = $is_active;
            $user->password = Hash::make($password);
            if ($request->file('profile_image')) {
                $request->validate([
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:1048',
                ]);
                $file = $request->file('profile_image');
                $fileName = $first_name . '_' . $last_name . '_' . strtotime("now") . '.' . $request->profile_image->extension();
                $destinationPath = public_path() . '/images/salesman';
                $file->move($destinationPath, $fileName);
                $user->image = '/images/salesman/' . $fileName;
            }
            $user->save();
            $emp = new EmployeeData();
            $emp->user_id = $user->id;
            $emp->father_name = $father_name;
            $emp->date_of_birth = $date_of_birth;
            $emp->cnic = $cnic;
            $emp->address = $address;
            $emp->remarks = $remarks;
            $emp->save();

            return redirect('user')->with('Insert', 'User Inserted Successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return view('users.error');
        }
        // }else{
        //     abort(404);
        // }
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
        // if(Auth::user()->hasPermissionTo('user-edit')) {

        $usertype = UserType::get();
        $record = EmployeeData::find($id);
        return view('users.edit', compact(['record', 'usertype']));
        // }else{
        //     abort(404);
        // }
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
        // if(Auth::user()->hasPermissionTo('user-edit')) {
        $request->validate([
            'first_name' => 'required',
            // 'last_name'=>'required',
            'phone' => 'required',
            // 'date_of_birth' => 'required|date',
        ]);

        try {
            $data = $request->all();
            $emp = EmployeeData::find($id);
            $emp->father_name = $data['father_name'];
            $emp->cnic = $data['cnic'];
            $emp->address = $data['address'];
            $emp->date_of_birth = $data['date_of_birth'];
            $emp->remarks = $data['remarks'];
            $emp->save();


            $record = User::where('id', $emp->user_id)->first();
            $record->first_name = $data['first_name'];
            $record->last_name = $data['last_name'];
            $record->email = $data['email'];
            $record->app_login = $data['app_login'];
            $record->web_login = $data['web_login'];
            $record->phone = $data['phone'];
            $record->user_type = $data['role'];
            $record->is_active = $data['is_active'];
            if ($request->file('profile_image')) {
                $request->validate([
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $file = $request->file('profile_image');
                $fileName = $record->first_name . '_' . $record->last_name . '_' . strtotime("now") . '.' . $request->profile_image->extension();
                $destinationPath = public_path() . '/images/salesman';
                $file->move($destinationPath, $fileName);
                $record->image = '/images/salesman/' . $fileName;
            }
            if ($data['password']) {
                Hash::make($data['password']);
            }
            $record->save();


            return redirect()->route('user.index')->with('Updated', 'Updated Successfull');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return view('users.error');
        }
        // }else{
        //     abort(404);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(Auth::user()->hasPermissionTo('user-delete')) {
        $record = User::find($id);
        if ($record) {
            $record->delete();
        }
        return redirect()->route('user.index')->with('delete', 'Record Deleted Successfully');
        // }else{
        //     abort(404);
        // }
    }

    // public function create_permission(Request $request){
    //     $request->validate([
    //         'name'=>'required',
    //         'slug'=>'required|unique:permissions',
    //     ]);
    //     $createTasks = new Permission();
    // 	$createTasks->slug = $request->slug;
    // 	$createTasks->name = $request->name;
    // 	$createTasks->save();
    //     return response()->json(['msg'=>'success']);
    //     // $dev_perm = Permission::where('slug',$request->slug)->first();
    //     // $user=User::find(2);
    //     // dd($user->givePermissionsTo('create-tasks'));
    //     // dd($user->permissions()->attach($dev_perm));
    // 	// $createTasks->roles()->attach($dev_role);
    // }

    // public function assign_permisssion(Request $request,$id=null){
    //     if($id){
    //         $user=User::find($id);
    //     }else{
    //         $user=Auth::user();
    //     }
    //     return view('users.permission')->with('users',User::get())->with('permissions',Permission::get())->with('user',$user);
    // }
    // public function set_permisssion(Request $request){
    //     if(Auth::user()->hasPermissionTo('user-delete')) {

    //         $usert=User::find($request->user);
    //         if($request->val=="true"){
    //             $usert->givePermissionsTo($request->slug);
    //             return response()->json(['message'=>true]);
    //         }else if($request->val=="false"){
    //             $per=Permission::where('slug',$request->slug)->first();
    //             $usert->permissions()->detach($per->id);
    //             return response()->json(['message'=>true]);
    //         }
    //     }else{
    //         abort(404);
    //     }

    // }

    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
