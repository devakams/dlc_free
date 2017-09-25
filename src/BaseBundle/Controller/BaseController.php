<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AdminBundle\Entity\Message;
use AdminBundle\Form\MessageType;

/**
* @Route("/")
*/
class BaseController extends Controller
{

	/**
	* @Route("/", name="base_base_index")
	* @Method({"GET"})
	*/
	public function indexAction(){
		return $this->render("BaseBundle:base:index.html.twig");
	}

	/**
	* @Route("/contact", name="base_base_contact")
	* @Method({"POST", "GET"})
	*/
	public function contactAction(){
		$message = new Message;

		//link entite et formulaire
		$form = $this->createForm(new MessageType, $message);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($message);
				$em->flush();

				return $this->redirect( $this->generateUrl('base_base_message', array("id" => $message->getId())) );
			}
			else{

				return $this->redirectToRoute('base_base_contact', array("form" => $form->createView()));
			}

		}
		else{

			return $this->render("BaseBundle:base:contact.html.twig", array("form" => $form->createView()));

		}
	}


	/**
	* @Route("/message/{id}", name="base_base_message", requirements={"id" = "\d+"})
	* @Method({"POST", "GET"})
	*/
	public function messageAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$message = $em->getRepository("AdminBundle:Message")->find($id);

		return $this->render("BaseBundle:message:show.html.twig", 
			array(
				"message" => $message
			)
		);
	}
	
}
