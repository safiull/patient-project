<?php

namespace App\Http\Controllers;

use App\Prescription_oe;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use DataTables;

class E_PrescriptionController extends Controller
{
    function index() {
    	return view('settings.index');
    }

    public function E_prescriptionList(Request $request)
    {
        if ($request->ajax()) {
            $data = Prescription_oe::select('*')->latest()->get();
            $data = Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($row) {
                        return date("d M, Y", strtotime($row->created_at));
                    })
                    ->make(true);
                return $data;
        }
    }

    public function storeE_prescription(Request $request)
    {
    	$id = $request['id'];

    	$validation = array(
    		'name' => ['required', 'string','unique:prescription_oes'],
    	);

        Validator::make($request->all(), $validation)->validate();


        // if have this id in database then it's can be update. 
        if (!empty($id)) {
        	$post = Prescription_oe::find($id);

	        if (!$post) {
	            return json_encode(array('success' => 0));exit;
	        }

        	$post->update([
	            'name' => $request['name'],
	        ]);
        }
        else{
        	$post = Prescription_oe::create([
	            'name' => $request['name'],
	        ]);
        }

        
        //echo "<pre>";print_r($post);exit;

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
    }

    // Fetch patient code start form here.

    public function fetchEO(Request $request)
    {
        $post = Prescription_oe::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        return $post;
    }

    // Destroy e-prescription code start form here.

    public function destroyE_prescription(Request $request)
    {
        $post = Prescription_oe::find($request['id']);

        if (!$post) {
            return json_encode(array('success' => 0));exit;
        }

        $post->delete();

        //return response('Deleted');
        return json_encode(array('success' => 1));exit;
    }
}
