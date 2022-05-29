<?php
declare(strict_types=1);

namespace Src\museologo\domain\repositories;

use Src\museologo\domain\Campo;
use Src\museologo\domain\Coleccion;

interface ColeccionRepository {
    public function crear(Coleccion $coleccion): bool;
    public function buscarPorId(int $coleccionId): Coleccion;
    public function actualizar(Coleccion $coleccion): bool;
    public function eliminar(int $coleccionId): bool;
    public function listar(): array;
    public function agregarCampo(Campo $campo): bool;
}

