<?php

namespace Src\museologo\infraestructure\repository\eloquent;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model {
    protected $table = "coleccion";
    protected $fillable = ['nombre'];

}