<?php

namespace UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


//
use UtilisateurBundle\Entity\Utilisateur;
use UtilisateurBundle\Form\UtilisateurType;

/**
* @Route("/admin/user")
*/
class UtilisateurController extends Controller
{
	/**
	* @Route("/", name="utilisateur_user_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('utilisateur_user_list'));
	}

	/**
	* @Route("/new", name="utilisateur_user_new")
	*/
	public function newAction(){

		$user = new Utilisateur;

		//link entite et formulaire
		$form = $this->createForm(new UtilisateurType, $user);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($user);
				$em->flush();

				return $this->redirect( $this->generateUrl('utilisateur_user_list'));
			}
			else{

				return $this->redirectToRoute('utilisateur_user_new');
			}

		}
		else{

			return $this->render("UtilisateurBundle:user:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="utilisateur_user_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$user = $em->getRepository("UtilisateurBundle:Utilisateur")->find($id);

		return $this->render("UtilisateurBundle:user:show.html.twig", 
			array(
				"user" => $user
			)
		);
	}

	/**
	* @Route("/update/{id}", name="utilisateur_user_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$user = $em->getRepository("UtilisateurBundle:Utilisateur")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new UtilisateurType, $user);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($user);
				$em->flush();

				return $this->redirect( $this->generateUrl('utilisateur_user_list'));
			}
			

		}
		else{

			return $this->render("UtilisateurBundle:user:update.html.twig", 
				array(
					"form" => $form->createView(),
					"user" => $user

				)
			);
		}

	}

	/**
	* @Route("/list", name="utilisateur_user_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$users = $em->getRepository("UtilisateurBundle:Utilisateur")->findAll();

		return $this->render("UtilisateurBundle:user:list.html.twig", 
			array(
				"users" => $users
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="utilisateur_user_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository("UtilisateurBundle:Utilisateur")->find($id);
		if($user != null){
        	$em->remove($user);
        	$em->flush();
    	}

        return $this->redirectToRoute('utilisateur_user_list');
	}
}
