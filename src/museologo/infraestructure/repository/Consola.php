<?php
declare(strict_types=1);

namespace Src\museologo\infraestructure\repository;

use MuseologoRepository;
use Src\museologo\domain\Campo;
use Src\museologo\domain\CampoSimple;
use Src\museologo\domain\Coleccion;
use Src\museologo\domain\ColeccionCampo;
use Src\museologo\domain\Secuencia;
use Src\museologo\domain\Valor;

class Consola implements MuseologoRepository {
    
    public function agregarSubcampo(Campo $campo, int $orden): bool {
        return false;
    }
    public function quitarSubcampo(Campo $campo): bool {
        return false;
    }
    public function listarSubcampo(Campo $campo): array {
        return [];
    }
    public function crearCampo(Campo $campo): bool {
        return false;
    }
    public function eliminarCampo(Campo $campo): bool {
        return false;
    }
    public function actualizarCampo(Campo $campo): bool {
        return false;
    }
    public function listarCampos(): array {
        return [];
    }
    public function buscarCampo(int $campoId): Campo{
        return new CampoSimple();
    }
    public function agregarValor(string $valor): bool{
        return false;
    }
    public function quitarValor(Valor $valor): bool {
        return false;
    }
    public function listarValores(): array{
        return [];
    }
    public function crearSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function eliminarSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function actualizarSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function listarSecuencias(): array{
        return [];
    }
    public function agregarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool{
        return false;
    }
    public function quitarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool{
        return false;
    }
    public function listarCamposColeccion(Coleccion $coleccion): array{
        return [];
    }
    public function asignarCaracteristicasAColeccionCampo(ColeccionCampo $campo): bool{
        return false;
    }
}