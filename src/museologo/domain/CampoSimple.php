<?php
declare(strict_types=1);

namespace Src\museologo\domain;


class CampoSimple extends Campo {

    public function esCompuesto(): bool {
        return false;
    }
}
