<?php

namespace AP34\Core\Interfaces;

/**
 * Mediante esta interfaz vamos a garantizar que la clase que la implemente contenga obligadamente la función executeSQL
 */
interface IDataBase
{
    public function executeSQL($sql);
}