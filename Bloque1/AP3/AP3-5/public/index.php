<?php
require '../vendor/autoload.php';

use Root\Ap35\Controllers\UserController;
use Root\Ap35\Models\User;
use Root\Ap35\Views\UserView;

$usuarioController = new UserController();
$usuarioModelo = new User();
$usuarioVista = new UserView();