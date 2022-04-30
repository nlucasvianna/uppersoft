<?php

namespace App\Controller;

use App\Entity\Igreja;
use App\Form\IgrejaType;
use App\Repository\IgrejaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/igreja')]
class IgrejaController extends AbstractController
{
    #[Route('/', name: 'app_igreja_index', methods: ['GET'])]
    public function index(IgrejaRepository $igrejaRepository): Response
    {
        return $this->render('igreja/index.html.twig', [
            'igrejas' => $igrejaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_igreja_new', methods: ['GET', 'POST'])]
    public function new(Request $request, IgrejaRepository $igrejaRepository): Response
    {
        $igreja = new Igreja();
        $form = $this->createForm(IgrejaType::class, $igreja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $igrejaRepository->add($igreja);
            return $this->redirectToRoute('app_igreja_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('igreja/new.html.twig', [
            'igreja' => $igreja,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_igreja_show', methods: ['GET'])]
    public function show(Igreja $igreja): Response
    {
        return $this->render('igreja/show.html.twig', [
            'igreja' => $igreja,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_igreja_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Igreja $igreja, IgrejaRepository $igrejaRepository): Response
    {
        $form = $this->createForm(IgrejaType::class, $igreja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $igrejaRepository->add($igreja);
            return $this->redirectToRoute('app_igreja_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('igreja/edit.html.twig', [
            'igreja' => $igreja,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_igreja_delete', methods: ['POST'])]
    public function delete(Request $request, Igreja $igreja, IgrejaRepository $igrejaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$igreja->getId(), $request->request->get('_token'))) {
            $igrejaRepository->remove($igreja);
        }

        return $this->redirectToRoute('app_igreja_index', [], Response::HTTP_SEE_OTHER);
    }
}
