<?php

namespace D\Aev1\Core\Interfaces;

/**
 * Mediante esta interfaz vamos a garantizar que la clase que la implemente contenga obligadamente la función executeSQL
 */
interface IDataBase
{
    public function executeSQL($sql);
}