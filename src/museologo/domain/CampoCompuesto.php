<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use MuseologoRepository;

class CampoCompuesto extends Campo {

    private array $subcampos = [];

    public function agregarSubcampo(Campo $campo, int $orden = 1): bool {
        return $this->repository->agregarSubcampo($campo, $orden);
    }

    public function quitarSubcampo(Campo $campo): bool {
        return $this->repository->quitarSubcampo($campo);
    }

    public function listarSubcampos(): array {
        $this->subcampos = $this->repository->listarSubcampo($this);
        return $this->subcampos;
    }

    public function totalSubcampos(): int {
        return count($this->subcampos);
    }

    public function esCompuesto(): bool {
        return true;
    }
}
