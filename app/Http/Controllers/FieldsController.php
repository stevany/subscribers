<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Field;
use Session;
use App\Http\Resources\FieldResource as FieldResource;
use App\Http\Resources\FieldsResource as FieldsResource;


class FieldsController extends Controller
{
     /** Display a listing of the resource
     * 
     *
     *
     * @return FieldResource
     */
    public function index(){

    	return new FieldResource();

    }

    /**
    * Display the specified resource.
    *
    * @param \App\id\Field $field
    *
    * @return FieldResource
    */
    public function show(Field $field){
    	return new FieldResource($field);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return Field
     */
    public function create()
    {
        $field=new Field;
        $field->id=null;
        $field->type='active';
        return $field;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return mixed
     */
    public function store(Request $request)
    {

        $rules = array(
            'type'       => 'required',
           
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return  'error' ;
        } else {
            $field=new Field;
            $field->type=$request->type;
            $field->save();
            Session::flash('flash_message', 'Field successfully added!');
            return new FieldResource($field);
            
     }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit($id)
    {
        $Field=Field::find($id);
          
        return $field;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * 
     */
    public function update($id, Request $request)
    {
         $rules = array(
            'type'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
         
            return ;
        } else {
            $field=Field::find($id);
            $input=$request->all();
           
            if(count($field) > 0){
                    
                $field->fill($input)->save();
                
                Session::flash('flash_message', 'Field successfully updated!');
            }else{
                Session::flash('flash_message', 'Field not found!');
            }

            
            return new FieldResource($field);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($id)
    {
        //
        $field=Field::find($id);
        $field->delete();
    }
   
}
