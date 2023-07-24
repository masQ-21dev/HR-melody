<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}
