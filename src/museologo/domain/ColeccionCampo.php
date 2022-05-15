<?php
declare(strict_types=1);

namespace Src\museologo\domain;

class ColeccionCampo {
    private Campo $campo;
    private int $orden;
    private Lista $lista;
    private Secuencia $secuencia;
    private bool $esEditable;
    private bool $esUnico;
    private bool $esObligatorio;
    private bool $tieneSecuencia;
    private bool $tieneLista;

    public function __construct(Campo $campo, int $orden = 1) {
        $this->campo = $campo;
        $this->orden = $orden;
        $this->esUnico = false;
        $this->esEditable = true;
        $this->esObligatorio = false;
        $this->tieneSecuencia = false;
        $this->tieneLista = false;
    }

    public function getNombre(): string {
        return $this->campo->getNombre();
    }

    public function getDescripcion(): string {
        return $this->campo->getDescripcion();
    }

    public function getAbreviatura(): string {
        return $this->campo->getAbreviatura();
    }

    public function setEsUnico(bool $esUnico): void {
        $this->esUnico = $esUnico;
    }

    public function setEsObligatorio(bool $esObligatorio): void {
        $this->esObligatorio = $esObligatorio;
    }

    public function setTieneSecuencia(bool $tieneSecuencia): void {
        $this->tieneSecuencia = $tieneSecuencia;
    }

    public function setTieneLista(bool $tieneLista): void {
        $this->tieneLista = $tieneLista;
    }

    public function esUnico(): bool {
        return $this->esUnico;
    }

    public function esObligatorio(): bool {
        return $this->esObligatorio;
    }

    public function setEsEditable(bool $esEditable): void {
        $this->esEditable = $esEditable;
    }

    public function esEditable(): bool {
        return $this->esEditable;
    }

    public function tieneSecuencia(): bool {
        return $this->tieneSecuencia;
    }

}
