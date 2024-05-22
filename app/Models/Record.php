<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'book_id',
        'member_id',
        'volunteer_id',
        'borrowing_date',
        'returning_date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
