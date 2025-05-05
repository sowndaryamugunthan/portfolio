<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'dob',
        'education',
        'profession',
        'mobile',
        'email',
        'family_details',
        'partner_preferences',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
