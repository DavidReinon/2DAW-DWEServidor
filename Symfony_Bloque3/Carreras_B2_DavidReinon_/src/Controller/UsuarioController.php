<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/usuarios', name: 'usuarios_controller')]
final class UsuarioController extends AbstractController {
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(UsuarioRepository $usuarioRepository): JsonResponse {
        $usuarios = $usuarioRepository->findAll();
        $data = [];

        foreach ($usuarios as $usuario) {
            $data[] = [
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre(),
                'apellidos' => $usuario->getApellidos(),
                'edad' => $usuario->getFechaNacimiento(),
                'DNI' => $usuario->getDNI(),
                'coches' => $usuario->getCoches() || "No tiene coches aun.",
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Usuario $usuario): JsonResponse {
        $data = [
            'id' => $usuario->getId(),
            'nombre' => $usuario->getNombre(),
            'apellidos' => $usuario->getApellidos(),
            'edad' => $usuario->getFechaNacimiento(),
            'DNI' => $usuario->getDNI(),
            'coches' => $usuario->getCoches() || "No tiene coches aun.",
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $usuario = new Usuario();
        $usuario->setNombre($data['nombre']);
        $usuario->setApellidos($data['apellidos']);
        $usuario->setFechaNacimiento(new \DateTime($data['edad']));
        $usuario->setDNI($data['DNI']);

        //$usuario->addCoch()

        $em->persist($usuario);
        $em->flush();

        return new JsonResponse(['status' => 'Usuario creado'], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, Usuario $usuario, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $usuario->setNombre($data['nombre']);
        $usuario->setApellidos($data['apellidos']);
        $usuario->setFechaNacimiento(new \DateTime($data['edad']));
        $usuario->setDNI($data['DNI']);

        $em->flush();

        return new JsonResponse(['status' => 'Usuario actualizado']);
    }

    #[Route('/{id}', methods: ['PATCH'], name: 'partial_update')]
    public function partialUpdate(Request $request, Usuario $usuario, EntityManagerInterface $em): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nombre'])) {
            $usuario->setNombre($data['nombre']);
        }
        if (isset($data['apellidos'])) {
            $usuario->setApellidos($data['apellidos']);
        }
        if (isset($data['edad'])) {
            $usuario->setFechaNacimiento(new \DateTime($data['edad']));

        }
        if (isset($data['DNI'])) {
            $usuario->setDNI($data['DNI']);
        }

        $em->flush();

        return new JsonResponse(['status' => 'Usuario actualizado']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Usuario $usuario, EntityManagerInterface $em): JsonResponse {
        $em->remove($usuario);
        $em->flush();

        return new JsonResponse(['status' => 'Usuario eliminado']);
    }

    #[Route('/{id}/basicView', name: 'basic_view_get', methods: ['GET'])]
    public function showBasicView(Usuario $usuario, EntityManagerInterface $em): JsonResponse {
        return new JsonResponse(['Usuario' => $usuario->getDNI() . "_" . $usuario->getNombre()]);
    }
}


