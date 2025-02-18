<?php

namespace App\Controller;

use App\Entity\Coche;
use App\Form\CocheType;
use App\Repository\CocheRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/coches', name: 'coches_controller')]
final class CocheController extends AbstractController {
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(CocheRepository $cocheRepository): JsonResponse {
        $coches = $cocheRepository->findAll();
        $data = [];

        foreach ($coches as $coche) {
            $data[] = [
                'id' => $coche->getId(),
                'marca' => $coche->getMarca(),
                'modelo' => $coche->getModelo(),
                'potencia' => $coche->getPotencia(),
                'velocidad_maxima' => $coche->getVelocidadMaxima(),
                'fecha_compra' => $coche->getFechaCompra()->format('Y-m-d'),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Coche $coche): JsonResponse {
        $data = [
            'id' => $coche->getId(),
            'marca' => $coche->getMarca(),
            'modelo' => $coche->getModelo(),
            'potencia' => $coche->getPotencia(),
            'velocidad_maxima' => $coche->getVelocidadMaxima(),
            'fecha_compra' => $coche->getFechaCompra()->format('Y-m-d'),
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $coche = new Coche();
        $coche->setMarca($data['marca']);
        $coche->setModelo($data['modelo']);
        $coche->setPotencia($data['potencia']);
        $coche->setVelocidadMaxima($data['velocidad_maxima']);
        $coche->setFechaCompra(new \DateTime($data['fecha_compra']));


        $em->persist($coche);
        $em->flush();

        return new JsonResponse(['status' => 'Coche creado'], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, Coche $coche, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $coche->setMarca($data['marca']);
        $coche->setModelo($data['modelo']);
        $coche->setPotencia($data['potencia']);
        $coche->setVelocidadMaxima($data['velocidad_maxima']);
        $coche->setFechaCompra(new \DateTime($data['fecha_compra']));

        $em->flush();

        return new JsonResponse(['status' => 'Coche actualizado']);
    }

    #[Route('/{id}', methods: ['PATCH'], name: 'partial_update')]
    public function partialUpdate(Request $request, Coche $coche, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (isset($data['marca'])) {
            $coche->setMarca($data['marca']);
        }
        if (isset($data['modelo'])) {
            $coche->setModelo($data['modelo']);
        }
        if (isset($data['potencia'])) {
            $coche->setPotencia($data['potencia']);
        }
        if (isset($data['velocidad_maxima'])) {
            $coche->setVelocidadMaxima($data['velocidad_maxima']);
        }
        if (isset($data['fecha_compra'])) {
            $coche->setFechaCompra(new \DateTime($data['fecha_compra']));
        }

        $em->flush();

        return new JsonResponse(['status' => 'Coche actualizado']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Coche $coche, EntityManagerInterface $em): JsonResponse {
        $em->remove($coche);
        $em->flush();

        return new JsonResponse(['status' => 'Coche eliminado']);
    }

    #[Route('/{id}/borrarVelocidad', methods: ['DELETE'], name: 'delete_velocidad_maxima')]
    public function borrarVelocidadMaxima(Coche $coche, EntityManagerInterface $em): JsonResponse {
        $coche->setVelocidadMaxima(null);
        $em->persist($coche);
        $em->flush();

        return new JsonResponse(['status' => 'Velocidad Maxima Eliminada del ' . $coche->getMarca() . " " . $coche->getModelo()]);
    }
}
