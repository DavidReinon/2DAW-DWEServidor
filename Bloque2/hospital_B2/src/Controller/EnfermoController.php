<?php

namespace App\Controller;

use App\Entity\Enfermo;
use App\Form\EnfermoType;
use App\Repository\EnfermoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/enfermo')]
final class EnfermoController extends AbstractController {
    #[Route(name: 'app_enfermo_index', methods: ['GET'])]
    public function index(EnfermoRepository $enfermoRepository): Response {
        $list = $enfermoRepository->findAll();
        $total = count($list);

        return $this->render('enfermo/index.html.twig', [
            'enfermos' => $list,
            'total' => $total
        ]);
    }

    #[Route('/new', name: 'app_enfermo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response {
        $enfermo = new Enfermo();
        $form = $this->createForm(EnfermoType::class, $enfermo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enfermo);
            $entityManager->flush();

            return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enfermo/new.html.twig', [
            'enfermo' => $enfermo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enfermo_show', methods: ['GET'])]
    public function show(Enfermo $enfermo): Response {
        return $this->render('enfermo/show.html.twig', [
            'enfermo' => $enfermo,
        ]);
    }

    #[Route('/{id}/duplicar', name: 'app_enfermo_duplicate', methods: ['GET'])]
    public function duplicate(Enfermo $enfermo, EntityManagerInterface $entityManager): Response {
        //Uso clone para duplicar todos los atributos, menos id,
        $newEnfermo = clone $enfermo;

        $entityManager->persist($newEnfermo);
        $entityManager->flush();

        return $this->redirectToRoute('app_enfermo_show', ['id' => $newEnfermo->getId()]);
    }

    #[Route('/{id}/edit', name: 'app_enfermo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enfermo $enfermo, EntityManagerInterface $entityManager): Response {
        $form = $this->createForm(EnfermoType::class, $enfermo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enfermo/edit.html.twig', [
            'enfermo' => $enfermo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enfermo_delete', methods: ['POST'])]
    public function delete(Request $request, Enfermo $enfermo, EntityManagerInterface $entityManager): Response {
        if ($this->isCsrfTokenValid('delete' . $enfermo->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($enfermo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
    }
}
