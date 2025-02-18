<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'main_')]
final class MainController extends AbstractController {

    #[Route('', name: 'home')]
    public function main(): Response {
        return new Response(
            '<h1>Lista de acciones:</h1>
            <ul>
                <li><a href="/cirujano">Ver Cirujano</a></li>
                <li><a href="/enfermo">Ver Enfermo</a></li>
                <li><a href="/quirofano">Ver Quirofano</a></li>
            </ul>'
        );
    }
}
