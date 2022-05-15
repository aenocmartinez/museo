<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use Illuminate\Cache\Repository;
use MuseologoRepository;

class Secuencia {
    private MuseologoRepository $repository;
    private string $prefijo;
    private string $nombre;
    private int $secuencia;
    private int $numeroDigitos;
    public function __construct()
    {
        $this->secuencia = 1;
        $this->numeroDigitos = 5;
    }

    public function setRepository(MuseologoRepository $repository) {
        $this->repository = $repository;
    }

    public function setNumeroDigitos(int $numeroDigitos): void {
        $this->numeroDigitos = $numeroDigitos;
    }

    public function setPrefijo(string $prefijo): void {
        $this->prefijo = $prefijo;
    }

    public function getPrefijo(): string {
        return $this->prefijo;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setSecuencia(int $secuencia): void {
        $this->secuencia = $secuencia;
    }

    public function reiniciar(): void {
        $this->secuencia = 1;
    }

    public function incrementar(): void {
        $this->secuencia = $this->secuencia + 1;
    }

    public function getValor(): string {
        return trim($this->prefijo . $this->rellenarConCerosValor());
    }

    private function rellenarConCerosValor(): string {
        return substr(str_repeat("0", $this->numeroDigitos).$this->secuencia, - $this->numeroDigitos);
    }

    public function crear():bool {
        return $this->repository->crearSecuencia($this);
    }

    public function eliminar(): bool {
        return $this->repository->eliminarSecuencia($this);
    }

    public function actualizar(): bool {
        return $this->repository->actualizarSecuencia($this);
    }

    public static function listar(MuseologoRepository $repository): array {
        return $repository->listarSecuencias();
    }
}
