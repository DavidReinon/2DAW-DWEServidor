<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/uni')]
final class UniHomeController extends AbstractController{
    #[Route('/', name: 'app_uni_home')]
    public function index(): Response
    {
        return $this->render('uni_home/index.html.twig', [
            'controller_name' => 'UniHomeController',
        ]);
    }
}
