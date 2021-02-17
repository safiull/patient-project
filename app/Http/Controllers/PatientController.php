<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DataTables;

class PatientController extends Controller
{
    

    public function index()
    {
        return view('patient/index');
    }

    public function fetchPatientList(Request $request)
    {
        if ($request->ajax()) {
            $data = Patients::select('*')->latest()->get();
            $data = Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($row) {
                        return date("d M, Y", strtotime($row->created_at));
                    })
                    ->make(true);
                return $data;
        }
    }

    // Add patient code start fome here

    public function storePatient(Request $request)
    {
    	$id = $request['id'];

    	$validation = array(
            'patient_name' => ['required', 'string', 'max:100'],
            'address' => ['required'],
            'mobile' => ['required', 'unique:patients'],
            'blood_group' => ['required', 'string'],
            'age' => ['required'],
    		'sex' => ['required', 'string'],
    	);

        if (!empty($id)) {
            $validation['mobile'] = ['required', Rule::unique('patients')->ignore($id)];
        }

        Validator::make($request->all(), $validation)->validate();


        if (!empty($id)) {
        	$post = Patients::find($id);

	        if (!$post) {
	            return json_encode(array('success' => 0));exit;
	        }

        	$post->update([
                'patient_name' => $request['patient_name'],
                'address'      => $request['address'],
                'mobile'       => $request['mobile'],
                'blood_group'  => $request['blood_group'],
                'age'          => $request['age'],
	            'sex'          => $request['sex']
	        ]);
        }
        else{
        	$post = Patients::create([
	            'patient_name' => $request['patient_name'],
                'address'      => $request['address'],
                'mobile'       => $request['mobile'],
                'blood_group'  => $request['blood_group'],
                'age'          => $request['age'],
                'sex'          => $request['sex'],
                'patient_id' => '000000'
	        ]);

            $post->update([
                'patient_id' => str_pad($post->id, 6, "0", STR_PAD_LEFT)
            ]);
        }

        
        //echo "<pre>";print_r($post);exit;

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
    }

    // Fetch patient code start form here.

    public function fetchPatient(Request $request)
    {
        $post = Patients::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
    }

    // Destroy user code start form here 

    public function destroyPatient(Request $request)
    {
        $post = Patients::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        $post->delete();

        //return response('Deleted');
        return json_encode(array('success' => 1));exit;
    }

    // Patient card

    public function card($id)
    {
        $post = Patients::find($id);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }
        //return $post;
        return view("patient.card", array('id' => $id));

    }
   
}
