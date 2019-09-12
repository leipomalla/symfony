<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EsimerkitController extends AbstractController {
    //Kontrollerit tulee tänne
    /**
 * @Route("esimerkki/laskePalkka/{slug}")
 */public function laskePalkka($slug) {
        $nettopalkka = $slug * 0.7;
        // Pyydetään Response-oliota näyttämään tulos
        /*return new Response('<h2>Bruttopalkasi on 4500€ ja nettopalkkasi
        on <strong>' . $nettopalkka . '<strong></h2>');*/
        return $this->render('esimerkit/palkka.html.twig', [
            'nettopalkka' => $nettopalkka,
            'bruttopalkka' => $slug
        ]
        );
    }

    public function tarkistaKarkausvuosi() {
        $vuosi = 2101;

        if ($vuosi % 4 == 0) {
            $txt = 'on';
            return $this->render('esimerkit/karkausvuosi.html.twig', [
                'vuosi' => $vuosi,
                'txt ' => $txt,
            ]
            );

            //return new Response('<p>' . $vuosi . ' on karkausvuosi</p>');
        } else {
            $txt = 'ei ole';
            return $this->render('esimerkit/karkausvuosi.html.twig', [
                'vuosi' => $vuosi,
                'txt ' => $txt,
            ]
            );
        }
    }

    public function laskePH() {
        $x = 2.13 * pow(10, -5);
        $pH = -(log10($x));
        /*return new Response('<p>Kun vesiliuoksen vetyioni-konsenraatio on ' .
        $x . ' mol/l sen pH on ' . number_format($pH,1) . '.</p>');*/
        return $this->render('esimerkit/ph.html.twig', [
            'x' => $x,
            'pH' => number_format($pH),
        ]
        );
    }

    public function heitaNoppaa() {
        $randomNumber = rand(1, 6);
        //return new Response('<p>Satunnaisluku on ' . $randomNumber . '.</p>');
        return $this->render('esimerkit/noppa.html.twig', [
            'random' => $randomNumber,
        ]
        );
    }

    public function naytaJson() {
        //Henkilö -taulukko
        $nimet = [
            'Etunimi' => 'Pekka',
            'Sukunimi' => 'Puupaa',
        ];
        //return new JsonResponse($nimet);
        return $this->render('esimerkit/json.html.twig', [
            'nimet' => json_encode($nimet),
        ]
        );
    }

    /**
     * @Route("esimerkki/esim6")
     */
    public function lihapiirakka() {
        $rahaa = 2;
        $lihapiirakanHinta = 2.50;

        return $this->render('esimerkit/lihapiirakka.html.twig', [
            'rahaa' => $rahaa,
            'hinta' => $lihapiirakanHinta,
        ]
        );
        /*if ($rahaa - $lihapiirakanHinta > 0){

    return new Response('Koska sinulla on ' . $rahaa .'€ voit ostaa lihapiirakan,
    jonka hinta on ' . number_format($lihapiirakanHinta,2) . '€. Sinulle jää rahaa ' . number_format($rahaa - $lihapiirakanHinta,2) . '€');
    } else {
    return new Response('Koska sinulla on vain ' . $rahaa .'€ et voi ostaa lihapiirakaa,
    jonka hinta on ' . number_format($lihapiirakanHinta,2) . '€.');*/

    }

    /**
     * @Route ("esimerkki/esim7")
     */
    public function laskePakkaspaivat() {
        $summa = 0;
        $pakkaspaivat = 0;
        $tekija = "päivystävä meteorologi";
        $mittausViikko = 35;
        $keskiarvo1 = 0;
        $keskiarvo2 = 0;

        $pakkasasteet = [
            'ma' => 6,
            'ti' => -2,
            'ke' => 3,
            'to' => -4,
            'pe' => 1,
            'la' => 0,
            'su' => -5,
        ];

        foreach ($pakkasasteet as $pakkasaste) {
            if ($pakkasaste > 0) {
                $summa += 1;
            }
        }
//lasketaan pakkaspäivien keskiarvo yhdellä desimaalilla
        if ($pakkaspaivat != 0) {
            $keskiarvo1 = number_format(($summa / $pakkaspaivat), 1);
        }
//lasketaan koko viikon keskilämpötila yhdellä desimaalilla
        $keskiarvo2 = number_format(array_sum($pakkasasteet) / count($pakkasasteet), 1);

//Kutsutaan tätä näkymää ja lähetetään sille dataa sisältävät muuttujat
        return $this->render('esimerkit/pakkasasteet.html.twig', [
            'pakkasasteet' => $pakkasasteet,
            'keskiarvo1' => $keskiarvo1,
            'keskiarvo2' => $keskiarvo2,
            'viikko' => $mittausViikko,
            'tekija' => $tekija,
        ]
        );

    }
    /**
     * @Route("esimerkki/uutiset/{slug}")
     */
public function nayta ($slug) {
    $kommentit = [
         'Muropaketin arvostelun mukaan Control on viiden tähden täysosuma!',
'Apple Arcade toimii iPhoneilla ja iPadeillä sekä Macilla ja Apple TV:llä!',
 'PlayStation Blog on jälleen listannut viikon suurimmat PS4-julkaisut!'
    ];
    return $this->render('esimerkit/nayta.html.twig', [
        'otsikko' => $slug,
        'kommentit' =>$kommentit
    ]);
    
}
/**
 * @Route("esimerkki/kuntopisteet/{holkka},{hiihto},{kavely}")
 */
public function kuntoPisteet($holkka, $hiihto, $kavely){
    $holkkapisteet = $holkka * 4;
    $hiihtopisteet = $hiihto * 2;
    $kuntopisteet = $holkkapisteet + $hiihtopisteet + $kavely;
    $nimi = 'Arvid Lee';

    return $this->render('esimerkit/kuntopisteet.html.twig', [
        'nimi' => $nimi,
        'holkka' => $holkka,
        'hiihto' =>$hiihto,
        'kavely' =>$kavely,
        'holkkapisteet' =>$holkkapisteet,
        'hiihtopisteet' =>$hiihtopisteet,
        'kuntopisteet' =>$kuntopisteet
    ]
    );
}

}