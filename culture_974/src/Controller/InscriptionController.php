<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\InscriptionRepository;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/inscription')]
final class InscriptionController extends AbstractController
{
    #[Route(name: 'app_inscription_index', methods: ['GET'])]
    public function index(InscriptionRepository $inscriptionRepository): Response
    {
        return $this->render('inscription/index.html.twig', [
            'inscriptions' => $inscriptionRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_inscription_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $inscription = new Inscription();
    //     $form = $this->createForm(InscriptionType::class, $inscription);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($inscription);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('inscription/new.html.twig', [
    //         'inscription' => $inscription,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_inscription_show', methods: ['GET'])]
    // public function show(Inscription $inscription): Response
    // {
    //     return $this->render('inscription/show.html.twig', [
    //         'inscription' => $inscription,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_inscription_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Inscription $inscription, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(InscriptionType::class, $inscription);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('inscription/edit.html.twig', [
    //         'inscription' => $inscription,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_inscription_delete', methods: ['POST'])]
    // public function delete(Request $request, Inscription $inscription, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$inscription->getId(), $request->getPayload()->getString('_token'))) {
    //         $entityManager->remove($inscription);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
    // }

    #[Route('/{eventId}', name: 'app_inscription', methods: ['GET', 'POST'])]
    public function inscription(
        int $eventId,
        Request $request,
        EventRepository $eventRepository,
        EntityManagerInterface $entityManager
    ): Response {
        // On récupère l'événement
        $event = $eventRepository->find($eventId);
        
        if (!$event) {
            throw $this->createNotFoundException('L\'événement n\'existe pas');
        }

        // Ici l'utilisateur s'inscrit à l'événement
        $inscription = new Inscription();
        $inscription->setEvent($event);
        $inscription->setCreatedAt(new \DateTimeImmutable());

        // Création d'un InscriptionType
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        // Les conditions isSubmitted et isValid sont nécessaires pour vérifier que le formulaire a été soumis et que les données sont valides
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($inscription);
            $entityManager->flush();

            // Message de confirmation
            $this->addFlash('success', 'Votre inscription a bien été enregistrée !');

            // Redirection vers la page de l'événement
            return $this->redirectToRoute('app_event_show', ['id' => $eventId]);
        }

        return $this->render('inscription/new.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }
}
