<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    // Define the relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    /*$user = User::find(1); // Assuming user with ID 1 exists
    $volunteer = $user->volunteer;*/
}
