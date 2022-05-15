<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use MuseologoRepository;

class Valor {
    private string $valor;

    public function __construct(string $valor) {
        $this->valor = $valor;
    }

    public function setRepository(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function get(): string {
        return $this->valor;
    }

    public function set(string $valor): void {
        $this->valor = $valor;
    }
}
