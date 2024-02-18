<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'supplier_code',
        'supplier_group',
        'company_name',
];

protected $casts = [
    'details' => 'json',
    'contact_person' => 'json',
];
}
