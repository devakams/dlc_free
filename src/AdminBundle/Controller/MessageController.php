<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
* @Route("/message")
*/
class MessageController extends Controller
{
	/**
	* @Route("/", name="admin_message_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('admin_message_list'));
	}

	/**
	* @Route("/new", name="admin_message_new")
	*/
	public function newAction(){

		$message = new Message;

		//link entite et formulaire
		$form = $this->createForm(new MessageType, $message);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($message);
				$em->flush();

				return $this->redirect( $this->generateUrl('admin_message_list'));
			}
			else{

				return $this->redirectToRoute('admin_message_new');
			}

		}
		else{

			return $this->render("AdminBundle:message:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="admin_message_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$message = $em->getRepository("AdminBundle:Message")->find($id);

		return $this->render("AdminBundle:message:show.html.twig", 
			array(
				"message" => $message
			)
		);
	}

	/**
	* @Route("/update/{id}", name="admin_message_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$message = $em->getRepository("AdminBundle:Message")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new MessageType, $message);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($message);
				$em->flush();

				return $this->redirect( $this->generateUrl('admin_message_list'));
			}
			

		}
		else{

			return $this->render("AdminBundle:message:update.html.twig", 
				array(
					"form" => $form->createView(),
					"message" => $message

				)
			);
		}

	}

	/**
	* @Route("/list", name="admin_message_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$messages = $em->getRepository("AdminBundle:Message")->findAll();

		return $this->render("AdminBundle:message:list.html.twig", 
			array(
				"messages" => $messages
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="admin_message_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$message = $em->getRepository("AdminBundle:Message")->find($id);
		if($message != null){
        	$em->remove($message);
        	$em->flush();
    	}

        return $this->redirectToRoute('admin_message_list');
	}
}
