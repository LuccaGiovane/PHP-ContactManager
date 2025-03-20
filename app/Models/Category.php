<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    // Permite atribuição em massa para o campo 'name'
    protected $fillable = ['name'];

    // Define o relacionamento: uma categoria pode ter vários contatos
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}