<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes';
    public function module()
    {
    return $this->belongsTo(Module::class);
    }
    public function stagiaire()
    {
    return $this->belongsTo(Stagiaire::class);
    }
   
}