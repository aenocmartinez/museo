<?php
declare(strict_types=1);

namespace Src\museologo\infraestructure\repository;

use Brick\Math\BigInteger;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Src\museologo\domain\Campo;
use Src\museologo\domain\CampoCompuesto;
use Src\museologo\domain\CampoSimple;
use Src\museologo\domain\Coleccion;
use Src\museologo\domain\ColeccionCampo;
use Src\museologo\domain\MuseologoRepository;
use Src\museologo\domain\Secuencia;
use Src\museologo\domain\Valor;
use Src\museologo\infraestructure\repository\eloquent\Campo as EloquentCampo;
use Src\museologo\infraestructure\repository\eloquent\Coleccion as EloquentColeccion;

class EloquentMuseologo extends Model implements MuseologoRepository {

    public function agregarSubcampo(Campo $campo, Campo $subcampo, int $orden): bool {
        try {
            $eloquentCampo = EloquentCampo::find($campo->getId());
            $eloquentSubcampo = EloquentCampo::find($subcampo->getId());
            if ($eloquentSubcampo) {
                $eloquentCampo->subcampos()->attach($eloquentSubcampo, ['orden' => $orden]);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
    public function quitarSubcampo(Campo $campo): bool {
        return false;
    }
    public function listarSubcampo(Campo $campo): array {
        return [];
    }
    public function crearCampo(Campo $campo): bool {
        $resultado = true;
        try {
            $nCampo = EloquentCampo::create([
                'nombre' => $campo->getNombre(),
                'descripcion' => $campo->getDescripcion(),
                'abreviatura' => $campo->getAbreviatura(),
            ]);            

            if ($campo->esCompuesto()) {
                $subcampo = new CampoSimple();
                $subcampo->setId($nCampo->id);
                $campo->setId($nCampo->id);
                $campo->agregarSubcampo($subcampo, 1);
            }
        } catch (Exception $e) {
            echo "CrearCampo: " . $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    }
    public function eliminarCampo(Campo $campo): bool {
        return false;
    }
    public function actualizarCampo(Campo $campo): bool {
        return false;
    }
    public function listarCampos(): array {
        $campos = array();
        try {
            $rows = EloquentCampo::select('id', 'nombre', 'descripcion', 'abreviatura')->orderBy('nombre')->get();
            foreach($rows as $row) {
                $campo = new CampoSimple();
                if ($row->esCompuesto()) {
                    $campo = new CampoCompuesto();
                }
                $campo->setId($row->id);
                $campo->setNombre($row->nombre);
                $campo->setAbreviatura($row->abreviatura);
                $campo->setDescripcion($row->descripcion);
                array_push($campos, $campo);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $campos;
    }
    public function buscarCampo(int $campoId): Campo{
        return new CampoSimple();
    }
    public function agregarValor(string $valor): bool{
        return false;
    }
    public function quitarValor(Valor $valor): bool {
        return false;
    }
    public function listarValores(): array{
        return [];
    }
    public function crearSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function eliminarSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function actualizarSecuencia(Secuencia $secuencia): bool{
        return false;
    }
    public function listarSecuencias(): array{
        return [];
    }
    public function agregarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool{
        return false;
    }
    public function quitarCampoAColeccion(Coleccion $coleccion, ColeccionCampo $campo): bool{
        return false;
    }
    public function listarCamposColeccion(Coleccion $coleccion): array{
        return [];
    }
    public function asignarCaracteristicasAColeccionCampo(ColeccionCampo $campo): bool{
        return false;
    }

    public function crearColeccion(Coleccion $coleccion): bool {
        $exito = false;
        try {
            EloquentColeccion::create($coleccion->getNombre());
            $exito = true;
        } catch(Exception $e) {
            echo $e->getMessage();            
        }
        return $exito;
    }
}
