<?php

namespace UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

//
use UtilisateurBundle\Entity\Client;
use UtilisateurBundle\Form\ClientType;

/**
* @Route("/client")
*/
class BaseClientController extends Controller
{
	

	/**
	* @Route("/register", name="utilisateur_baseclient_new")
	*/
	public function registerAction(){

		$client = new Client;

		//link entite et formulaire
		$form = $this->createForm(new ClientType, $client);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($client);
				$em->flush();

				return $this->redirect( $this->generateUrl('utilisateur_baseclient_show', array('id' => $client->getId())));
			}
			else{

				return $this->redirectToRoute('utilisateur_baseclient_new', array("form" => $form->createView()));
			}

		}
		else{

			return $this->render("UtilisateurBundle:baseclient:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/profil/{id}", name="utilisateur_baseclient_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$client = $em->getRepository("UtilisateurBundle:Client")->find($id);

		return $this->render("UtilisateurBundle:baseclient:show.html.twig", 
			array(
				"client" => $client
			)
		);
	}

	/**
	* @Route("/update/{id}", name="utilisateur_baseclient_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$client = $em->getRepository("UtilisateurBundle:Client")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new ClientType, $client);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($client);
				$em->flush();

				return $this->redirect( $this->generateUrl('utilisateur_baseclient_list'));
			}
			

		}
		else{

			return $this->render("UtilisateurBundle:baseclient:update.html.twig", 
				array(
					"form" => $form->createView(),
					"client" => $client

				)
			);
		}

	}


	/**
	* @Route("/login", name="utilisateur_baseclient_login")
	*/
	public function loginAction(){

	}

}
