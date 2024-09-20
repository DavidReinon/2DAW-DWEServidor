<?php

class VehiculoCarrera {
    protected string $marca;
    protected string $modelo;
    protected string $color;
    protected int $velocidadActual = 0;
    protected int $velocidadMaxima;
    protected int $combustible;
    protected float $distanciaRecorrida = 0;

    public function __construct(string $marca, string $modelo, string $color, int $combustible) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->combustible = $combustible;
    }

    public function __destruct() {
        echo "El coche se ha retirado de la carrera.";
    }

    protected function avanzar(): void {
        //En base a la velocidad actual y el tiempo, se calcula la distancia recorrida
    }

    protected function consumirCombustible(): void {
        $this->combustible -= 10;
    }

    public function arrancar(): void {
        echo "El coche ha sido arrancado";
    }

    public function acelerar(int $incrementoAceleracion): void {
        $this->velocidad += $incrementoAceleracion;
    }

    public function detener(): void {
        echo "El coche se ha detenido";

    }

    public function mostrarEstado() {
        echo "Estado del coche\n
        Marca: $this->marca, Modelo: $this->modelo, Velocidad: $this->velocidad, 
        Velocidad Máxima: $this->velocidadMaxima, Combustible: $this->combustible, 
        Distancia Recorrida: $this->distanciaRecorrida";
    }
}

class CocheF1 extends VehiculoCarrera {
    private bool $alerones = false;

    public function activarDRS(): void {
        echo "DRS activado";
    }
}

class CocheElectricoF1 extends VehiculoCarrera {
    private int $bateria = 100;

    public function recargar(): void {
        $this->bateria = 100;
    }
}