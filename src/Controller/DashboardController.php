<?php

namespace App\Controller;

use App\Controller\PageCrudController;
use App\Controller\PageKsn135CrudController;
use App\Controller\PageTheoD02CrudController;
use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('homepage.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EasyAdmin Column Chooser Test');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('No column sort', 'fas fa-list', Page::class)->setController(PageCrudController::class);
        yield MenuItem::linkToCrud('KSN135 example<br><span class="text-muted">(with configureFields)</span>', 'fas fa-list', Page::class)->setController(PageKsn135CrudController::class);
        yield MenuItem::linkToCrud('TheoD02 example<br><span class="text-muted">(without configureFields)</span>', 'fas fa-list', Page::class)->setController(PageTheoD02CrudController::class);
    }
}
