<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVendido extends Model
{
    use HasFactory;

    protected $table = 'produtos_vendidos';

    public $timestamps = false;

}
