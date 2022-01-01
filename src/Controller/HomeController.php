<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use TwentyI\API\Services;
use function Symfony\Config\Monolog\headers;

class HomeController extends AbstractController
{
    private $client;
    const OAUTH = 'c83d9a27d81a326a4';

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $response = $this->client->request('GET', 'https://api.20i.com/domain', [

            //'auth_bearer' => 'YzQ4OWZlNjIyYjk3OWM3YTg=',

        ]);

        dump($response->getContent());

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
