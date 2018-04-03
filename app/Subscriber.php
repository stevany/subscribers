<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public $updated_at= false;
    public $created_at = false;
    public $timestamps=false;
    
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name',  'email_address', 'state'
    ];

   
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'subscribers_fields','subscriber_id','field_id');
    }
   
}
