<?php
declare(strict_types=1);

namespace Src\museologo\usecase;

use Src\museologo\domain\Coleccion;
use Src\museologo\domain\MuseologoRepository;

class CasoUsoCrearColeccion {
    private MuseologoRepository $repository;

    public function __construct(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function Ejecutar(string $nombre): bool {
        $coleccion = new Coleccion();
        $coleccion->setNombre($nombre);
        return $coleccion->crear();
    }
}