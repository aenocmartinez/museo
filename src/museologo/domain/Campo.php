<?php
declare(strict_types=1);

namespace Src\museologo\domain;

use MuseologoRepository;

abstract class Campo {
    private string $nombre;
    private string $descripcion;
    private string $abreviatura;
    protected MuseologoRepository $repository;

    public function setRepository(MuseologoRepository $repository): void {
        $this->repository = $repository;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setAbreviatura(string $abreviatura): void {
        $this->abreviatura = $abreviatura;
    }

    public function getAbreviatura(): string {
        return $this->abreviatura;
    }

    public function crear(): bool {
        return $this->repository->crearCampo($this);
    }

    public function eliminar(): bool {
        return $this->repository->eliminarCampo($this);
    }

    public function actualizar(): bool {
        return $this->repository->actualizarCampo($this);
    }

    public static function listar(MuseologoRepository $repository): array {
        return $repository->listarCampos();
    }

    public static function buscar(MuseologoRepository $repository, int $campoId): Campo {
        return $repository->buscarCampo($campoId);
    }

    abstract public function esCompuesto(): bool;
}
