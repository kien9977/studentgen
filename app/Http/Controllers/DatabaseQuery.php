<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class DatabaseQuery extends Controller
{
    //
    function DatabaseQuery(Request $request){
    	
			
		// $data = DB::table('student')->get();
		/*
			<select name="student" id="student">
			@php
				foreach($data as $d){
					echo "<option value='".$d->id."'>".$d->id.". ".$d->name."</option>";
				}
			@endphp
			</select>
		*/

		if(isset($request['student'])){
    		$datamain = DB::table('student')->where('id','=',$request['student'])->get();
    	}
    	else{
    		$datamain = DB::table('student')->get();
    	}

		return view('student', compact(['datamain']));
    }

    function Add(Request $request){

    	$validator = Validator::make($request->all(), [
			'name' => 'required',
			'age' => 'required|integer',
			'address' => 'required',
		]);

		if ($validator->fails()) {
			return '<script>alert("Not accepted"); window.history.back();</script>';
		}


    	$data = $request->toArray();

    	$name = $data['name'];
    	$age = $data['age'];
    	$address = $data['address'];
    	

    	DB::table('student')->insert(['name' => $name, 'age'=> $age, 'address'=> $address]);

    	if(isset($request['student'])){
    		$datamain = DB::table('student')->where('id','=',$request['student'])->get();
    	}
    	else{
    		$datamain = DB::table('student')->get();
    	}

		return view('student', compact(['datamain']));
    }

    function generate(){
    	
			
		// $data = DB::table('student')->get();
		$count = DB::table('student')->count();

		$rand = random_int(1, $count);
		$datamain = DB::table('student')->where('id','=',$rand)->get();

		return view('student', compact(['datamain']));
    }
}
