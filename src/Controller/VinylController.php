<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: 'GET')]
    public function home(): Response
    {
        $tracks = [
            'Gangsta\'s Paradise - Coolio',
            'Waterfalls - TLC',
            'Creep - TLC',
            'Kiss from a Rose - Seal',
            'On Bended Knee - Boyz II Men',
        ];

        return $this->render('vinyl/home.html.twig', [
            'title' => 'Awesome title',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse', methods: 'GET')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : 'All Genres';

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}
