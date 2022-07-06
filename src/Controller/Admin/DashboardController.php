<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Ship;
use App\Entity\ShipImages;
use App\Entity\Size;
use App\Entity\Type;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="user")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Zblurg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Ship', 'fas fa-newspaper', Ship::class);
        yield MenuItem::linkToCrud('Brand', 'fas fa-newspaper', Brand::class);
        yield MenuItem::linkToCrud('Size', 'fas fa-newspaper', Size::class);
        yield MenuItem::linkToCrud('Type', 'fas fa-newspaper', Type::class);
        yield MenuItem::linkToCrud('User', 'fas fa-newspaper', Users::class);
    }
}
