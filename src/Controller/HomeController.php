<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function Home(): Response
    {
        $carouselBlocks = [
            $blockOne = [
                'ONS DOEL',
                'Wij willen Enterprise kennis graag bereikbaar maken voor het MKB. Daarvoor willen we een leergemeenschap creëren om kennis en innovatie rondom ICT en communicatie aan te jagen en te bevorderen.',
            ],
            $blockTwo = [
                'OVER ONS',
                'Na de eerste Meetup was het duidelijk dat wij kennis en behoefte aan elkaar kunnen koppelen. Vanuit onze ambitie en passie voor slimme IT oplossingen is de stichting geboren.',

            ],
            $blockThree = [
                'HELP MEE',
                'Wil je graag jou (IT) kennis delen? Wil je weten hoe we jouw organisatie kunnen ondersteunen? Wil je ons met middelen of financieel steunen? We komen graag in contact op "info (at) itlighthouse.nl"'
            ]
        ];

//        dd($carouselBlocks);

        return $this->render('pages/home.html.twig', [
            'carousel' => $carouselBlocks,
            'blockone' => $blockOne,
            'blocktwo' => $blockTwo,
            'blockthree' => $blockThree
        ]);
    }
}



//$carouselName = [
//    'ONS DOEL',
//    'OVER ONS',
//    'HELP MEE'
//],
//
//            $carouselDesc = [
//                'Wij willen Enterprise kennis graag bereikbaar maken voor het MKB. Daarvoor willen we een leergemeenschap creëren om kennis en innovatie rondom ICT en communicatie aan te jagen en te bevorderen.',
//                'Na de eerste Meetup was het duidelijk dat wij kennis en behoefte aan elkaar kunnen koppelen. Vanuit onze ambitie en passie voor slimme IT oplossingen is de stichting geboren.',
//                'Wil je graag jou (IT) kennis delen? Wil je weten hoe we jouw organisatie kunnen ondersteunen? Wil je ons met middelen of financieel steunen? We komen graag in contact op "info (at) itlighthouse.nl"'
//            ],