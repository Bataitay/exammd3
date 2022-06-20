<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'employees';

    protected $fillable = [
        'fullname',
        'phone',
        'general',
        'cmnd',
        'birthday',
        'email',
        'address',
        'groupE_id ',
    ];
    public function group()
    {
        return $this->belongsTo(GroupEmployee::class, 'groupE_id', 'id');
    }
}
