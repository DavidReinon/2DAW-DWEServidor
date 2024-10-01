<?php

abstract class TrajeBase {
    protected $id;
    protected $talla;
    protected $estadoConservacion; // Nuevo, aceptable, regular, mal
    protected $dueño;
    protected $fechaIncorporacion; // Fecha en la que el traje fue añadido al banco

    // Constructor
    public function __construct($id, $talla, $estadoConservacion, $dueño, $fechaIncorporacion) {
        $this->id = $id;
        $this->talla = $talla;
        $this->estadoConservacion = $estadoConservacion;
        $this->dueño = $dueño;
        $this->fechaIncorporacion = $fechaIncorporacion;
    }

    abstract public function mostrarDetalles();
}

class TrajeGala extends Traje {
    private $pantalon;
    private $camisa;
    private $chaleco;
    private $medias;


    public function mostrarDetalles() {
        echo "Traje de Gala (ID: $this->id) - Talla: $this->talla, Estado: $this->estadoConservacion";
    }
}
