<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use MuseologoRepository;

class Lista {
    private MuseologoRepository $repository;
    private array $valores = [];
    private string $nombre;

    public function setRepository(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function agregarValor(string $valor): bool {
        return $this->repository->agregarValor($valor);
    }

    public function quitarValor(Valor $valor): bool {
        return $this->repository->quitarValor($valor);
    }

    public function valores(): array {
        $this->valores = $this->repository->listarValores();
        return $this->valores;
    }

    public function totalValores(): int {
        return count($this->valores());
    }
}
