<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartdevice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serial', 'description', 'manufacturer_id'
    ];

    /**
     * Get the manufactuerer record associated with the user.
     */
    // public function manufacturer()
    // {
    //     return $this->hasOne('App\Manufacturer');
    /**
     * Get the manufacturer that owns the smartdevice.
     */
    public function manufacturer()
    {
        return $this->hasOne('App\Manufacturer', 'id', 'manufacturer_id')->get();
    }
}
