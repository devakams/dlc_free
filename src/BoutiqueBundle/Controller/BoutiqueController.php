<?php

namespace BoutiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BoutiqueController extends Controller
{
	/**
	* @Route("/", name="boutique_boutique_index")
	*/
	public function indexAction(){
		return $this->render("BoutiqueBundle:boutique:index.html.twig");
	}
}
