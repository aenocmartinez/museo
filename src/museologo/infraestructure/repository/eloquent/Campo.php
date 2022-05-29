<?php

namespace Src\museologo\infraestructure\repository\eloquent;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model {
    protected $table = "campos";
    protected $fillable = ['nombre', 'descripcion', 'abreviatura'];

    public function subcampos() {
        return $this->belongsToMany(Campo::class, 'subcampos', 'campo_id', 'subcampo_id')
            ->withPivot(['orden'])
            ->withTimestamps();
    }

    public function esCompuesto(): bool {
        return count($this->subcampos) > 0;
    }
}
