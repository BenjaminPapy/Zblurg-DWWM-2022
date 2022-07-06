<?php

namespace App\Controller\Front;

use App\Entity\Size;
use App\Form\SizeType;
use App\Repository\SizeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/size")
 */
class SizeController extends AbstractController
{
    /**
     * @Route("/", name="admin_size_index", methods={"GET"})
     */
    public function index(SizeRepository $sizeRepository): Response
    {
        return $this->render('admin/size/index.html.twig', [
            'sizes' => $sizeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_size_show", methods={"GET"})
     */
    public function show(Size $size): Response
    {
        return $this->render('admin/size/show.html.twig', [
            'size' => $size,
        ]);
    }
}
