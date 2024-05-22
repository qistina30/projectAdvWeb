<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name', 'volunteer_id', 'ic_number', 'address','phoneNo',
    ];


    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }

}
