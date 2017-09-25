<?php

namespace HotellerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HotellerieController extends Controller
{
    /**
     * @Route("/", name="hotellerie_hotellerie_index")
     */
    public function indexAction()
    {
        return $this->render('HotellerieBundle:hotellerie:index.html.twig');
    }


	
}