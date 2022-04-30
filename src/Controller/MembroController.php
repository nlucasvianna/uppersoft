<?php

namespace App\Controller;

use App\Entity\Membro;
use App\Form\MembroType;
use App\Repository\MembroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/membro')]
class MembroController extends AbstractController
{
    #[Route('/', name: 'app_membro_index', methods: ['GET'])]
    public function index(MembroRepository $membroRepository): Response
    {
        return $this->render('membro/index.html.twig', [
            'membros' => $membroRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_membro_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MembroRepository $membroRepository): Response
    {
        $membro = new Membro();
        $form = $this->createForm(MembroType::class, $membro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membroRepository->add($membro);
            return $this->redirectToRoute('app_membro_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('membro/new.html.twig', [
            'membro' => $membro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_membro_show', methods: ['GET'])]
    public function show(Membro $membro): Response
    {
        return $this->render('membro/show.html.twig', [
            'membro' => $membro,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_membro_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Membro $membro, MembroRepository $membroRepository): Response
    {
        $form = $this->createForm(MembroType::class, $membro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membroRepository->add($membro);
            return $this->redirectToRoute('app_membro_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('membro/edit.html.twig', [
            'membro' => $membro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_membro_delete', methods: ['POST'])]
    public function delete(Request $request, Membro $membro, MembroRepository $membroRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membro->getId(), $request->request->get('_token'))) {
            $membroRepository->remove($membro);
        }

        return $this->redirectToRoute('app_membro_index', [], Response::HTTP_SEE_OTHER);
    }
}
