<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['name', 'description', 'preview_description'];
}
