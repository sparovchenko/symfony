<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{
    #[Route('/')]
    public function home(): Response
    {
        return new Response('Hi hello!');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if (is_null($slug)) {
            $title = 'All';
        } else {
            $title = u(str_replace('-', ' ', $slug))->title(true);
        }
        return new Response($title);
    }
}
