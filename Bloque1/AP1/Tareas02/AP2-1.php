<?php

class VehiculoCarrera {
    protected string $marca;
    protected string $modelo;
    protected string $color;
    protected int $velocidadMaxima;
    protected int $combustible;
    protected int $velocidad = 0;
    protected float $distanciaRecorrida = 0;

    /**
     * @return int
     */
    public function getVelocidadMaxima(): int {
        return $this->velocidadMaxima;
    }

    /**
     * @return float
     */
    public function getDistanciaRecorrida(): float {
        return $this->distanciaRecorrida;
    }

    /**
     * @return int
     */
    public function getVelocidad(): int {
        return $this->velocidad;
    }

    public function __construct(string $marca, string $modelo, string $color, int $combustible) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->combustible = $combustible;
        $this->generarVelocidadMaxima();
    }

    public function __destruct() {
        echo "\nCoche retirado de la carrera.";
    }

    private function generarVelocidadMaxima(): void {
        //Se genera un número aleatorio entre 250 y 300
        $this->velocidadMaxima = rand(250, 300);
    }

    public function avanzar(): void {
        // Suponiendo que cada iteración del bucle representa 1 segundo
        $this->distanciaRecorrida += $this->velocidad / 3.6; // Convertir km/h a m/s
    }

    public function consumirCombustible(): void {
        $this->combustible -= 10;
    }

    public function arrancar(): void {
        echo "El coche ha sido arrancado";
    }

    public function acelerar(int $aceleracion): void {
        $this->velocidad += $aceleracion;
    }

    public function detener(): void {
        echo "El coche se ha detenido";

    }

    public function mostrarEstado(): void {
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