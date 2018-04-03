<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Subscriber;
use App\Field;
use Session;
use App\Http\Resources\SubscriberResource as SubscriberResource;
use App\Http\Resources\SubscribersResource as SubscribersResource;

class SubscribersController extends Controller
{
     /** Display a listing of the resource
     * 
     *
     *
     * @return SubscribesResource
     */
    public function index(){

        $subscriber=Subscriber::with('fields:type')->get();
  
        return $subscriber;
    }
    /**
    * Display the specified resource.
    *
    * @param \shop\id\Subscribe $subscribe
    *
    * @return SubscribeResource
    */
    public function show(Subscriber $subscriber){
    	return new SubscriberResource($subscriber);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return Subscribe
     */
    public function create()
    {
        $subscriber=new Subscribe;
        $subscriber->id=null;
        $subscriber->name=null;
        $subscriber->email_address=null;
        $subscriber->state='active';
        return $subscriber;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return mixed
     */
    public function store(Request $request)
    {
        //split email and domain
        $domain = substr(strrchr($request->email_address, "@"), 1);
       
        $rules = array(

            'name'       		 => 'required',
            'email_address'		 => 'required|email',
            'state'      		 => 'required',
            'fields'             => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
  
        if ($validator->fails() ) {
          
            return  'error' ;
        } else if(checkdnsrr($domain, "MX")){//if host domain active
            $subscriber=new Subscriber;
            $subscriber->fill($request->all())->save();
            $subscriber->save();
            $fields=Field::findMany($request->fields);
            $field_ids = array();
            foreach($fields as $f){
                
                array_push($field_ids, $f->id);
            }
            $subscriber->fields()->sync($field_ids);
            Session::flash('flash_message', 'Subscriber successfully added!');
            return new SubscriberResource($subscriber);
            
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
        $subscriber=Subscriber::find($id);
          
        return $subscriber;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * 
     */
    public function update($id, Request $request)
    {

        //split email and domain
        $domain = substr(strrchr($request->email_address, "@"), 1);
        
         $rules = array(
            'name'       		 => 'required',
            'email_address'      => 'required|email',
            'state' 			 => 'required',
            'fields'             => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

     
        if ($validator->fails()) {
 
            return 'error';
        } else if(checkdnsrr($domain, "MX")){//if host domain active

            $subscriber=Subscriber::find($id);
            $input=$request->all();
           
            if(count($subscriber) > 0){
                    
                $subscriber->fill($input)->save();
                $fields=Field::findMany($request->fields);
                $field_ids = array();
                foreach($fields as $f){
                    
                    array_push($field_ids, $f->id);
                }
                $subscriber->fields()->sync($field_ids);
                Session::flash('flash_message', 'Subscriber successfully updated!');
            }else{
                Session::flash('flash_message', 'Subscriber not found!');
            }

            
             return new SubscriberResource($subscriber);
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
        $subscriber=Subscriber::find($id);
        $subscriber->delete();
    }
   
}
