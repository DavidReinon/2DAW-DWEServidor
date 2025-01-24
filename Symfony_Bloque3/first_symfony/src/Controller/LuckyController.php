<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController {
    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max): Response {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    #[Route('/lucky/redirect/', name: 'app_redirect_example')]
    public function redirectExample(): Response {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');

        // does a permanent HTTP 301 redirect
        return $this->redirectToRoute('homepage', [], 301);
        // if you prefer, you can use PHP constants instead of hardcoded numbers
        return $this->redirectToRoute('homepage', [], Response::HTTP_MOVED_PERMANENTLY);

        // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 10]);
    }

}