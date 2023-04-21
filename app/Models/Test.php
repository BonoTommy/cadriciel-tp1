<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['testId', 'name', 'email', 'date', 'unite', 'unite_kg', 'password', 'password_confirmation', 'ville_id'];
}
