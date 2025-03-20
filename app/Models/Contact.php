<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    // Permite atribuição em massa para os campos abaixo
    protected $fillable = ['name', 'email', 'phone', 'category_id'];

    // Define o relacionamento: um contato pertence a uma categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
