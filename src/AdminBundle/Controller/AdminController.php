<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AdminController extends Controller
{
	/**
	* @Route("/", name="admin_admin_index")
	*/
	public function indexAction(){
		return $this->render("AdminBundle:admin:index.html.twig");
	}
}
