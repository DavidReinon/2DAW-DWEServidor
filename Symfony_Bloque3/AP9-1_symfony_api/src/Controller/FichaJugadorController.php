<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\FichaJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/jugadores', name: 'api_jugadores')]
final class FichaJugadorController extends AbstractController {
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse {
        $jugadores = $em->getRepository(FichaJugador::class)->findAll();
        $data = [];

        foreach ($jugadores as $jugador) {
            $data[] = [
                'id' => $jugador->getId(),
                'nombre' => $jugador->getNombre(),
                'apellidos' => $jugador->getApellidos(),
                'edad' => $jugador->getEdad(),
                'equipo_actual' => $jugador->getEquipoActual(),
                'goles_marcados' => $jugador->getGolesMarcados(),
                'tarjetas_recibidas' => $jugador->getTarjetasRecibidas(),
                'fecha_nacimiento' => $jugador->getFechaNacimiento()->format('Y-m-d'),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(FichaJugador $jugador): JsonResponse {
        $data = [
            'id' => $jugador->getId(),
            'nombre' => $jugador->getNombre(),
            'apellidos' => $jugador->getApellidos(),
            'edad' => $jugador->getEdad(),
            'equipo_actual' => $jugador->getEquipoActual(),
            'goles_marcados' => $jugador->getGolesMarcados(),
            'tarjetas_recibidas' => $jugador->getTarjetasRecibidas(),
            'fecha_nacimiento' => $jugador->getFechaNacimiento()->format('Y-m-d'),
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $jugador = new FichaJugador();
        $jugador->setNombre($data['nombre']);
        $jugador->setApellidos($data['apellidos']);
        $jugador->setEdad($data['edad']);
        $jugador->setEquipoActual($data['equipo_actual']);
        $jugador->setGolesMarcados($data['goles_marcados']);
        $jugador->setTarjetasRecibidas($data['tarjetas_recibidas']);
        $jugador->setFechaNacimiento(new \DateTime($data['fecha_nacimiento']));

        $em->persist($jugador);
        $em->flush();

        return new JsonResponse(['status' => 'Jugador creado'], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, FichaJugador $jugador, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $jugador->setNombre($data['nombre']);
        $jugador->setApellidos($data['apellidos']);
        $jugador->setEdad($data['edad']);
        $jugador->setEquipoActual($data['equipo_actual']);
        $jugador->setGolesMarcados($data['goles_marcados']);
        $jugador->setTarjetasRecibidas($data['tarjetas_recibidas']);
        $jugador->setFechaNacimiento(new \DateTime($data['fecha_nacimiento']));

        $em->flush();

        return new JsonResponse(['status' => 'Jugador actualizado']);
    }

    #[Route('/{id}', methods: ['PATCH'], name: 'partial_update')]
    public function partialUpdate(Request $request, FichaJugador $jugador, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nombre'])) {
            $jugador->setNombre($data['nombre']);
        }
        if (isset($data['apellidos'])) {
            $jugador->setApellidos($data['apellidos']);
        }
        if (isset($data['edad'])) {
            $jugador->setEdad($data['edad']);
        }
        if (isset($data['equipo_actual'])) {
            $jugador->setEquipoActual($data['equipo_actual']);
        }
        if (isset($data['goles_marcados'])) {
            $jugador->setGolesMarcados($data['goles_marcados']);
        }
        if (isset($data['tarjetas_recibidas'])) {
            $jugador->setTarjetasRecibidas($data['tarjetas_recibidas']);
        }
        if (isset($data['fecha_nacimiento'])) {
            $jugador->setFechaNacimiento(new \DateTime($data['fecha_nacimiento']));
        }

        $em->flush();

        return new JsonResponse(['status' => 'Jugador actualizado']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(FichaJugador $jugador, EntityManagerInterface $em): JsonResponse {
        $em->remove($jugador);
        $em->flush();

        return new JsonResponse(['status' => 'Jugador eliminado']);
    }
}