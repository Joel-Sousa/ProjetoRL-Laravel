<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['idRole','name'];
    protected $primaryKey = 'idRole';
    protected $table = 'roles';
    protected $hidden = ['created_at', 'updated_at'];

}
