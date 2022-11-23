<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SponsorController extends AbstractController
{
    #[Route(path: '/sponsoren', name: 'app_sponsors')]
    public function Sponsors(): Response
    {
        $sponsors = [
            $skrepr = [
                $stext = [
                    'Meetup Urk 03 - 11 - 2022',
                    'Meetup Urk 28 - 06 - 2022'
                ],
                $simage = [
                    'https://www.itlighthouse.nl/wp-content/uploads/2022/06/skrepr_logo_liggend.svg'
                ],
                $slink = [
                    'https://skrepr.com/'
                ]
            ],
            $janbakker = [
                $jtext = [
                    'Sponsoring 2021 en 2022'
                ],
                $jimage = [
                    'https://www.itlighthouse.nl/wp-content/uploads/2021/11/Jan-Bakker-Consulting.png'
                ],
                $jlink = [
                    'https://www.janbakkerconsulting.nl/'
                ]
            ],
            $rsh = [
                $rtext = [
                    'Oprichting van de Stichting',
                    'Meetup Urk 01-09-2020',
                    'Meetup Urk 01-09-2021',
                    'Opstartkosten 2020'
                ],
                $rimage = [
                    'https://www.itlighthouse.nl/wp-content/uploads/2021/07/RSH.webp'
                ],
                $rlink = [
                    'https://www.rsh.nl/'
                ]
            ]
        ];

        return $this->render('pages/sponsors.html.twig', [
            'sponsors' => $sponsors,
            'skrepr' => $skrepr,
            'janbakker' => $janbakker,
            'rsh' => $rsh,
            'stext' => $stext,
            'simage' => $simage,
            'slink' => $slink,
            'jtext' => $jtext,
            'jimage' => $jimage,
            'jlink' => $jlink,
            'rtext' => $rtext,
            'rimage' => $rimage,
            'rlink' => $rlink
        ]);
    }
}