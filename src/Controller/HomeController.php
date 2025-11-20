<?php

namespace App\Controller;

use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ContentRepository $repository): Response
    {
        $posts = $repository->findBy(['approved' => true]);
        return $this->render('home/index.html.twig', [
            "posts" => $posts,
        ]);
    }
}
