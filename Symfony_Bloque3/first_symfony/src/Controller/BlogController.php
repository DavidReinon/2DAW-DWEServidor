<?php

// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController {
    #[Route('/blog', name: 'blog_list', methods: ['GET'])]
    public function list(): Response {
        // ...
    }

    #[Route('/blog/{id}', name: 'blog_list', methods: ['POST'])]
    public function edit(int $id): Response {
        // ...
    }

    #[Route('/blog/{id}', name: 'blog_list', methods: ['POST'], condition: "params['id'] < 0")]
    public function delete(int $id): Response {
        // ...
    }
}
