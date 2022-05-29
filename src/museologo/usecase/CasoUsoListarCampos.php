<?php
declare(strict_types=1);

namespace Src\museologo\usecase;

use Src\museologo\domain\Campo;
use Src\museologo\domain\MuseologoRepository;

class CasoUsoListarCampos {
    private MuseologoRepository $repository;

    public function __construct(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function ejecutar(): array{
        return Campo::listar($this->repository);
    }
}
