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
    /*$user = User::find(1); // Assuming user with ID 1 exists
    $volunteer = $user->volunteer;*/
}
