<?php

namespace App\Controller;

use App\Entity\Guest;
use App\Entity\Menu;
use App\Form\GuestType;
use App\Repository\GuestRepository;
use App\Repository\MenuRepository;
use App\Service\MenuFilterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/guest")
 */
class GuestController extends AbstractController
{
    /**
     * @Route("/", name="guest_index", methods={"GET"})
     */
    public function index(GuestRepository $guestRepository): Response
    {
        return $this->render('guest/index.html.twig', [
            'guests' => $guestRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="guest_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $guest = new Guest();
        $form = $this->createForm(GuestType::class, $guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($guest);
            $entityManager->flush();

            return $this->redirectToRoute('guest_index');
        }

        return $this->render('guest/new.html.twig', [
            'guest' => $guest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="guest_show", methods={"GET"})
     */
    public function show(Guest $guest, MenuRepository $menuRepository, MenuFilterService $menuFilterService): Response
    {
        $dishes = [];

        foreach ($menuRepository->findAll() as $menu) {
            if(!isset($dishes[$menu->getName()])) {
                $dishes[$menu->getName()] = [];
            }
            foreach($menuFilterService->filterMenu($guest, $menu) as $dish) {
                $dishes[$menu->getName()][] = $dish;
            }
        }

        return $this->render('guest/show.html.twig', [
            'guest' => $guest,
            'dishes' => $dishes
        ]);
    }

    /**
     * @Route("/{id}/edit", name="guest_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Guest $guest): Response
    {
        $form = $this->createForm(GuestType::class, $guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('guest_index');
        }

        return $this->render('guest/edit.html.twig', [
            'guest' => $guest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="guest_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Guest $guest): Response
    {
        if ($this->isCsrfTokenValid('delete' . $guest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($guest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('guest_index');
    }
}
