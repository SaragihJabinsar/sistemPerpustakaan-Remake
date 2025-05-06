<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
protected $table = 'tbusers';
protected $primaryKey = 'username';
public $incrementing = false;
protected $keyType = 'string';

protected $fillable = ['username', 'password'];
public $timestamps = false; // karena di tabel tidak ada created_at & updated_at
}
