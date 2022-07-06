<?php

namespace App\Controller\Front;

use App\Data\SearchData;
use App\Entity\Ship;
use App\Entity\Brand;
use App\Entity\ShipImage;
use App\Entity\ShipImages;
use App\Form\SearchType;
use App\Form\ShipImageType;
use App\Form\PremiumType;
use App\Form\ShipType;
use App\Repository\ShipRepository;
use App\Repository\BrandRepository;
use App\Repository\ShipImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ship")
 */
class ShipController extends AbstractController
{
    /**
     * @Route("/", name="admin_ship_index", methods={"GET"})
     */
    public function index(ShipRepository $shipRepository, Request $request): Response
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $ships = $shipRepository->findSearch($data);
        if($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'content' => $this->renderView('main/_ship.html.twig', ['ship_list' => $ships]),
                'pagination' => $this->renderView('main/_pagination.html.twig', ['ship_list' => $ships]),
                'pages' => ceil($ships->getTotalItemCount() / $ships->getItemNumberPerPage())
            ]);
        }

        return $this->render('admin/ship/index.html.twig', [
            'ship_list' => $ships,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/premium_info", name="premium_info", methods={"GET", "POST"})
     */
    public function premiumInfo(ShipRepository $ship, Request $request): Response
    {
        $premiumShips = $ship->findAll();
        $user = $this->getUser();
        $form = $this->createForm(PremiumType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('main/info_premium.html.twig', [
            'premiumShip' => $premiumShips,
            'premiumForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/show/{id}", name="admin_ship_show", methods={"GET"})
     */
    public function shipShow($id, ShipRepository $repo): Response
    {
        $ship = $repo->find($id);

        return $this->render('admin/ship/show.html.twig', [
            'ship' => $ship,
        ]);
    }
}
