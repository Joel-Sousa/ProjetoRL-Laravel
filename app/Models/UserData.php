<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';
    protected $table = 'userData';
    protected $primaryKey = 'idUserData';

    protected $fillable = [
        'name',
        'idUser'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    
}
