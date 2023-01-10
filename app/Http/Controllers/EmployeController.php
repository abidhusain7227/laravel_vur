<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeController extends Controller
{
    //
    public function Getdata()
    {
        return "hello";
    }
    public function Addemploye(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|string',
            'email' => 'required|unique:employe,email',
            'date_time' => 'required',
        ],
        [
            'name.required' => 'The name is required',
            'email.required' => 'The email is required',
            'email.unique'=> 'The email has already been taken',
            'date_time.required' => "Plase Select Date Time",
        ]);
        if ($validator->fails()) {  
            return response()->json($validator->messages(), 400);
        }
        
        $data = new Employe();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->status = $request->status == 'null' ? 1 :$request->status;
        $data->date_time = $request->date_time;
        $data->save();
        if ($data) {
            return response()->json("Employe Add successfully", 200);
        }
    }

    public function Getemploye(Request $request){
        $search = $request->search;
        $record = $request->record;
        $status = $request->status;
        // dd($status != '');
        $data = Employe::where(function($q) use ($search) {
            if($search != ''){
                $q->where('name','LIKE',"%".$search."%");
                $q->Orwhere('email','LIKE',"%".$search."%");
            }
        })
        ->where(function($s) use ($status) {
            if ($status != '') {
                $s->where('status',$status);
            }
        })
        ->orderBy('id', 'desc')
        ->paginate($record);
        return response()->json(['result'=>$data, 'code'=>200]);
    }
    public function ActiveInactiveEmploye(Request $request){
        $data = Employe::where('id',$request->id)->update(['status'=>$request->status]);
        if($data){
            return response()->json(['message' => 'Employee status change successfully', 'code' => 200]);
        }else{
            return response()->json(['message' => 'Something is wrong', 'code' => 400]);
        }
    }
    public function GetEmployeById(Request $request){
        $data = Employe::where('id',$request->id)->first();
        if($data){
            return response()->json(['data' => $data, 'code' => 200]);
        }else{
            return response()->json(['message' => 'Something is wrong', 'code' => 400]);
        }
    }
    public function Editemploye(Request $request){
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|string',
            'email' => 'required|unique:employe,email,'.$request->id,
            'date_time' => 'required'
        ],
        [
            'name.required' => 'The name is required',
            'email.required' => 'The email is required',
            'email.unique'=> 'The email has already been taken',
            'date_time.required' => "Plase Select Date Time",
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }
        $data = Employe::where('id',$request->id)->update([
            'name'=>$request->name, 
            'email' => $request->email,
            'status' => $request->status == 'null' ? 1 :$request->status,
            'date_time' => $request->date_time
        ]);
        if($data){
            return response()->json(['message' => 'Employe Edit successfully', 'code' => 200]);
        }else{
            return response()->json(['message' => 'Something is wrong', 'code' => 400]);
        }
    }
    public function Deleteemploye(Request $request){
        $data = Employe::where('id',$request->id)->delete();
        if($data){
            return response()->json(['message' => 'Employe delete successfully', 'code' => 200]);
        }else{
            return response()->json(['message' => 'Something is wrong', 'code' => 400]);
        }
    }
}
