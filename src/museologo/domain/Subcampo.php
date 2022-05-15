<?php
declare(strict_types=1);

namespace Src\museologo\domain;


class Subcampo {
    private Campo $campo;
    private int $orden;

    public function __construct(Campo $campo, int $orden = 1)
    {
        $this->campo = $campo;
        $this->orden = $orden;
    }

    public function getOrden(): int {
        return $this->orden;
    }

    public function getCampo(): Campo {
        return $this->campo;
    }
}
