<?php

# app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Cliente extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;
}
