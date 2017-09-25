<?php

namespace UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

//
use UtilisateurBundle\Entity\Client;
use UtilisateurBundle\Form\ClientType;

/**
* @Route("/admin/client")
*/
class ClientController extends Controller
{
	/**
	* @Route("/", name="utilisateur_client_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('utilisateur_client_list'));
	}

	/**
	* @Route("/new", name="utilisateur_client_new")
	*/
	public function newAction(){

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

				return $this->redirect( $this->generateUrl('utilisateur_client_list'));
			}
			else{

				return $this->redirectToRoute('utilisateur_client_new');
			}

		}
		else{

			return $this->render("UtilisateurBundle:client:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="utilisateur_client_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$client = $em->getRepository("UtilisateurBundle:Client")->find($id);

		return $this->render("UtilisateurBundle:client:show.html.twig", 
			array(
				"client" => $client
			)
		);
	}

	/**
	* @Route("/update/{id}", name="utilisateur_client_update", requirements={"id" = "\d+"})
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

				return $this->redirect( $this->generateUrl('utilisateur_client_list'));
			}
			

		}
		else{

			return $this->render("UtilisateurBundle:client:update.html.twig", 
				array(
					"form" => $form->createView(),
					"client" => $client

				)
			);
		}

	}

	/**
	* @Route("/list", name="utilisateur_client_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$clients = $em->getRepository("UtilisateurBundle:Client")->findAll();

		return $this->render("UtilisateurBundle:client:list.html.twig", 
			array(
				"clients" => $clients
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="utilisateur_client_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$client = $em->getRepository("UtilisateurBundle:Client")->find($id);
		if($client != null){
        	$em->remove($client);
        	$em->flush();
    	}

        return $this->redirectToRoute('utilisateur_client_list');
	}
}
