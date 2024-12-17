<?php

namespace AEV2\Core;

use Doctrine\ORM\EntityManager;
use AEV2\Core\Interfaces\IRequest;
use AEV2\Core\Interfaces\IRoute;

class Dispatcher
{
    private $routeList;
    private IRequest $currentRequest;
    private EntityManager $entityManager;

    /**
     *  Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la URI del navegador
     *  para que el dispatcher puéda redirigir al lugar controller correcto con los parámetros adecuados.
     * @param IRoute $routeCollection
     * @param IRequest $request
     */
    public function __construct(IRoute $routeCollection, IRequest $request, EntityManager $entityManager)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->entityManager = $entityManager;
        $this->dispatch();
    }

    /**
     * Redirigimos la aplicación al controlador adecuado.
     */
    private function dispatch(){
        //Verificamos que la ruta que hemos recibido está dentro de las rutás de la aplicación
        if(isset($this->routeList[$this->currentRequest->getRoute()])){
            //Aqui dentro tenetemos un texto del tipo AP34\Controller\DetalleController
            $controllerClass = "AEV2\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            //Es equivalente a $controller = new AP2\Controller\MainController o DetalleController;
            $controller = new $controllerClass;

            // Inyectar el EntityManager si el controlador tiene el método setEntityManager
            if (method_exists($controller, 'setEntityManager')) {
                $controller->setEntityManager($this->entityManager);
            }

            //Es equivalente al texto main o detail
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            //Comprobamos que se han enviado o no parámetros por la ruta y lanzamos la acción del controller
            if(!is_null($this->currentRequest->getParams())){
                //Como visual Studio no sabe si los parámetros son o no un array da un fallo de iteración, pero realmente funciona adecuadamente
                $controller->$action(...$this->currentRequest->getParams());
            }else{
                //Equivalente a $controller->main();
                $controller->$action();
            }
        }else{
            //Al crear la ruta default este punto no se va a utilizar probablemente.
            //Si quereis probarla borrar los datos del archivo rutas.json correspondientes a default
            echo "La ruta no esta definda";
        }
    }
}