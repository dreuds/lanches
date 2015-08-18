<?php

# app/Models/Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Produto extends Model
{
    protected $table = 'produto';
    public $timestamps = false;
}
