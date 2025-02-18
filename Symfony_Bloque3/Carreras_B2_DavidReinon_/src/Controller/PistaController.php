<?php

namespace App\Controller;

use App\Entity\Pista;
use App\Repository\PistaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use function Sodium\add;

#[Route('/pistas', name: 'pistas_controller')]
final class PistaController extends AbstractController {
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(PistaRepository $pistaRepository): JsonResponse {
        $pistas = $pistaRepository->findAll();
        $data = [];

        foreach ($pistas as $pista) {
            $data[] = [
                'id' => $pista->getId(),
                'nombre' => $pista->getNombre(),
                'nivel_dificultad' => $pista->getNivelDificultad(),
                'longitud' => $pista->getLongitud(),
                'numero_curvas' => $pista->getNumeroCurvas(),
                'libre' => $pista->isLibre(),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Pista $pista): JsonResponse {
        $data = [
            'id' => $pista->getId(),
            'nombre' => $pista->getNombre(),
            'nivel_dificultad' => $pista->getNivelDificultad(),
            'longitud' => $pista->getLongitud(),
            'numero_curvas' => $pista->getNumeroCurvas(),
            'libre' => $pista->isLibre(),
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $pista = new Pista();
        $pista->setNombre($data['nombre']);
        $pista->setNivelDificultad($data['nivel_dificultad']);
        $pista->setLongitud($data['longitud'] ?? null);
        $pista->setNumeroCurvas($data['numero_curvas'] ?? null);
        $pista->setLibre($data['libre']);

        $em->persist($pista);
        $em->flush();

        return new JsonResponse(['status' => 'Pista creada'], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, Pista $pista, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $pista->setNombre($data['nombre']);
        $pista->setNivelDificultad($data['nivel_dificultad']);
        $pista->setLongitud($data['longitud'] ?? null);
        $pista->setNumeroCurvas($data['numero_curvas'] ?? null);
        $pista->setLibre($data['libre']);

        $em->flush();

        return new JsonResponse(['status' => 'Pista actualizada']);
    }

    #[Route('/{id}', methods: ['PATCH'], name: 'partial_update')]
    public function partialUpdate(Request $request, Pista $pista, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nombre'])) {
            $pista->setNombre($data['nombre']);
        }
        if (isset($data['nivel_dificultad'])) {
            $pista->setNivelDificultad($data['nivel_dificultad']);
        }
        if (isset($data['longitud'])) {
            $pista->setLongitud($data['longitud']);
        }
        if (isset($data['numero_curvas'])) {
            $pista->setNumeroCurvas($data['numero_curvas']);
        }
        if (isset($data['libre'])) {
            $pista->setLibre($data['libre']);
        }

        $em->flush();

        return new JsonResponse(['status' => 'Pista actualizada parcialmente']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Pista $pista, EntityManagerInterface $em): JsonResponse {
        $em->remove($pista);
        $em->flush();

        return new JsonResponse(['status' => 'Pista eliminada']);
    }

    #[Route('/pistasOcupadas', name: 'app_pista_delete', methods: ['GET'])]
    public function getPistasOcupadas(PistaRepository $pistaRepository): JsonResponse {
        $pistas = $pistaRepository->findByNoLibreField();
        $data = [];
        foreach ($pistas as $pista) {
            $data[] = [
                'id' => $pista->getId(),
                'nombre' => $pista->getNombre(),
            ];
        }

        return new JsonResponse([$data]);
    }

}
