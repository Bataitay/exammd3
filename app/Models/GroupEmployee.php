<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupEmployee extends Model
{
    use HasFactory;
    protected $table = 'group_employees';
    protected $fillable = [
        'group_employees',
    ];
    public function employees(){
        return $this->hasMany(Employee::class, 'groupE_id', 'id');
    }

}
