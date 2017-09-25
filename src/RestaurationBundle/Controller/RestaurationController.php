<?php

namespace RestaurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



/**
* @Route("/")
*/
class RestaurationController extends Controller
{
	/**
     * @Route("/", name="restauration_restauration_index")
     */
    public function indexAction()
    {
        return $this->render('RestaurationBundle:restauration:index.html.twig');
    }

}

