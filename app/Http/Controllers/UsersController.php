<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UsersController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('user/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchUserList(Request $request)
    {

        $data = User::select('*')->latest()->get();
        $data = Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($row) {
                    return date("d M, Y", strtotime($row->created_at));
                })
                ->make(true);

            return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
    	$id = $request['id'];

    	$validation = array(
    		'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users'],
    		'password' => ['required', 'string', 'min:4', 'max:20', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:4', 'max:20'],
    	);

    	if (!empty($id)) {
    		$validation['email'] = ['required', 'email', 'max:100', Rule::unique('users')->ignore($id)];
    	}

        Validator::make($request->all(), $validation)->validate();


        // if have this id in database then it's can be update. 
        if (!empty($id)) {
        	$post = User::find($id);

	        if (!$post) {
	            return json_encode(array('success' => 0));exit;
	        }

        	$post->update([
	            'name' => $request['name'],
	            'email' => $request['email'],
	            'password' => Hash::make($request['password']),
	        ]);
        }
        else{
        	$post = User::create([
	            'name' => $request['name'],
	            'email' => $request['email'],
	            'password' => Hash::make($request['password']),
	        ]);
        }

        
        //echo "<pre>";print_r($post);exit;

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
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
    public function fetchUser(Request $request)
    {
        $post = User::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser(Request $request)
    {
        
        $post = User::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        $post->delete();

        //return response('Deleted');
        return json_encode(array('success' => 1));exit;
    }

}
