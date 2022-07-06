<?php

namespace App\Controller\Front;

use App\Data\SearchData;
use App\Form\SearchType;
use App\Entity\User;
use App\Repository\ShipRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/", name="homepage")
     */
    public function homepage(): Response
    {

        return $this->render('main/homepage.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function shipSearch(ShipRepository $shipRepo, Request $request)
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1); 
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $ships = $shipRepo->findSearch($data);
        if ($request->get('ajax')) {
            return new JsonResponse([
                'content' => $this->renderView('main/_ship.html.twig', ['ship_list' => $ships]),
                'pagination' => $this->renderView('main/_pagination.html.twig', ['ship_list' => $ships]),
                'pages' => ceil($ships->getTotalItemCount() / $ships->getItemNumberPerPage())
            ]);
        }

        return $this->render('main/homepage.html.twig', [
            'ship_list' => $ships,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route ("/legal_notice", name="legal_notice")
     */
    public function legal(): Response
    {
        return $this->render('main/legal_notice.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
