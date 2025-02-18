<?php

namespace App\Controller;

use App\Entity\Cirujano;
use App\Form\CirujanoType;
use App\Repository\CirujanoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cirujano')]
final class CirujanoController extends AbstractController {
    #[Route(name: 'app_cirujano_index', methods: ['GET'])]
    public function index(CirujanoRepository $cirujanoRepository): Response {
        $list = $cirujanoRepository->findAll();
        $total = count($list);

        return $this->render('cirujano/index.html.twig', [
            'cirujanos' => $list,
            'total' => $total
        ]);
    }

    #[Route('/new', name: 'app_cirujano_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response {
        $cirujano = new Cirujano();
        $form = $this->createForm(CirujanoType::class, $cirujano);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cirujano);
            $entityManager->flush();

            return $this->redirectToRoute('app_cirujano_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cirujano/new.html.twig', [
            'cirujano' => $cirujano,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cirujano_show', methods: ['GET'])]
    public function show(Cirujano $cirujano): Response {
        return $this->render('cirujano/show.html.twig', [
            'cirujano' => $cirujano,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cirujano_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cirujano $cirujano, EntityManagerInterface $entityManager): Response {
        $form = $this->createForm(CirujanoType::class, $cirujano);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cirujano_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cirujano/edit.html.twig', [
            'cirujano' => $cirujano,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cirujano_delete', methods: ['POST'])]
    public function delete(Request $request, Cirujano $cirujano, EntityManagerInterface $entityManager): Response {
        if ($this->isCsrfTokenValid('delete' . $cirujano->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cirujano);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cirujano_index', [], Response::HTTP_SEE_OTHER);
    }
}
