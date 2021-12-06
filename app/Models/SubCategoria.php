<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Categoria;

class SubCategoria extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','categoria_id'];

    protected $table = 'sub_categorias';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
