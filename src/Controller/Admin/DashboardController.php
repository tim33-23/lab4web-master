<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Post;
use App\Entity\Comment;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Админ-панель LiveBlog');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Пользователи', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Записи', 'fas fa-list', Post::class);
        yield MenuItem::linkToCrud('Комментарии', 'fas fa-list', Comment::class);
        yield MenuItem::linkToRoute('Вернуться на главную', 'fa fa-home', 'about');
    }
}
