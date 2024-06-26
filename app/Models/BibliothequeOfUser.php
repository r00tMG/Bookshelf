<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibliothequeOfUser extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['titre', 'auteur', 'date_publication', 'livreFile', 'genre', 'category', 'status'];
}
