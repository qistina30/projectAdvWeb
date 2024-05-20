<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'author', 'publisher_name', 'published_year','category','status','volunteer_id'
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
/*$table->string('title');
$table->string('author');
$table->string('publisher_name');
$table->year('published_year');
$table->string('category');*/