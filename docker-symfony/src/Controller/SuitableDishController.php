<?php


namespace App\Controller;


use App\Entity\Guest;
use App\Entity\Menu;
use App\Repository\GuestRepository;
use App\Repository\MenuRepository;
use App\Service\MenuFilterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/suitableDish")
 */
class SuitableDishController extends AbstractController
{

    /**
     * @Route("/{guest_id}/{menu_id}", name="suitable_dishes_show", methods={"GET"})
     *
     * @ParamConverter("guest", options={"mapping": {"guest_id" : "id"}})
     * @ParamConverter("menu", options={"mapping": {"menu_id"   : "id"}})
     *
     */
    public function show(Guest $guest, Menu $menu, MenuFilterService $service): Response
    {
        $dishes = $service->filterMenu($guest,$menu);
        return $this->render('suitableDish/show.html.twig', [
            'menu' => $menu,
            'guest' => $guest,
            'dishes' => $dishes
        ]);
    }


}