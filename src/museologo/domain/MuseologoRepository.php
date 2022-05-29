<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use Src\museologo\domain\Campo;
use Src\museologo\domain\Coleccion;
use Src\museologo\domain\ColeccionCampo;
use Src\museologo\domain\Secuencia;
use Src\museologo\domain\Valor;

interface MuseologoRepository {
    public function agregarSubcampo(Campo $campo, int $orden): bool;
    public function quitarSubcampo(Campo $campo): bool;
    public function listarSubcampo(Campo $campo): array;
    public function crearCampo(Campo $campo): bool;
    public function eliminarCampo(Campo $campo): bool;
    public function actualizarCampo(Campo $campo): bool;
    public function listarCampos(): array;
    public function buscarCampo(int $campoId): Campo;
    public function agregarValor(string $valor): bool;
    public function quitarValor(Valor $valor): bool;
    public function listarValores(): array;
    public function crearSecuencia(Secuencia $secuencia): bool;
    public function eliminarSecuencia(Secuencia $secuencia): bool;
    public function actualizarSecuencia(Secuencia $secuencia): bool;
    public function listarSecuencias(): array;
    public function agregarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool;
    public function quitarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool;
    public function listarCamposColeccion(Coleccion $coleccion): array;
    public function asignarCaracteristicasAColeccionCampo(ColeccionCampo $campo): bool;
}
