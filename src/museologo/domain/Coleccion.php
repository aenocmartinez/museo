<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use Src\museologo\domain\repositories\ColeccionRepository;

class Coleccion {
    private ColeccionRepository $repository;
    private string $nombre;

    public function setRepository(ColeccionRepository $repository): void {
        $this->repository = $repository;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function crear(): bool {
        return $this->repository->crearColeccion($this);
    }

    public function agregarCampo(Campo $campo, int $orden=1): bool {
        return $this->repository->agregarCampoAColeccion($this, new ColeccionCampo($campo, $orden));
    }

    public function quitarCampo(Campo $campo): bool {
        return $this->repository->quitarCampoAColeccion($this, new ColeccionCampo($campo));
    }

    public function asignarCaracteristicasACampo(Campo $campo, $caracteristicas=[
        'esUnico' => false,
        'esObligatorio' => false,
        'esEditable' => true,
        'tieneSecuencia' => false,
        'tieneLista' => false,
    ]): bool {

        $coleccionCampo = new ColeccionCampo($campo);
        $coleccionCampo->setEsUnico($caracteristicas['esUnico']);
        $coleccionCampo->setEsObligatorio($caracteristicas['esObligatorio']);
        $coleccionCampo->setEsEditable($caracteristicas['esEditable']);
        return $this->repository->asignarCaracteristicasAColeccionCampo($coleccionCampo);
    }

    public function listarCampos(): array {
        return $this->repository->listarCamposColeccion($this);
    }

    public function totalCampos(): int {
        return count($this->listarCampos());
    }
}
