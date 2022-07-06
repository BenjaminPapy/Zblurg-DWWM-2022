<?php

namespace App\Controller\Front;

use App\Entity\Brand;
use App\Entity\Logo;
use App\Repository\BrandRepository;
use App\Form\BrandType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/brand")
 */
class BrandController extends AbstractController
{
    /**
     * @Route("/", name="admin_brand_index", methods={"GET"})
     */
    public function index(BrandRepository $brandRepository): Response
    {
        return $this->render('admin/brand/index.html.twig', [
            'brands' => $brandRepository->findAll(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="admin_brand_show", methods={"GET"})
     */
    public function show($id): Response
    {
        $repo= $this->getDoctrine()->getRepository(Brand::class);

        $brand = $repo->$this->findAll($id);

        return $this->render('admin/brand/show.html.twig', [
            'brand' => $brand,
        ]);
    }
}
