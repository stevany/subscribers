<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $updated_at= false;
    public $created_at = false;
    
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];

   
    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'subscribers_fields');
    }
    
}
