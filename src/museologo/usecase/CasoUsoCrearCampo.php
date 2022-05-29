<?php
declare(strict_types=1);

namespace Src\museologo\usecase;

use App\Http\Requests\RequestGuardarCampo;
use Src\museologo\domain\CampoCompuesto;
use Src\museologo\domain\CampoSimple;
use Src\museologo\domain\MuseologoRepository;

class CasoUsoCrearCampo {
    private MuseologoRepository $repository;

    public function __construct(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function ejecutar(RequestGuardarCampo $req): bool {
        $campo = new CampoSimple();
        if ($req->es_compuesto){
            $campo = new CampoCompuesto();
        }

        $campo->setRepository($this->repository);
        $campo->setNombre($req->nombre);
        $campo->setDescripcion($req->descripcion);
        $campo->setAbreviatura($req->abreviatura);
        return $campo->crear();
    }
}
