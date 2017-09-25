<?php

namespace RestaurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use RestaurationBundle\Entity\Restaurant;
use RestaurationBundle\Form\RestaurantType;

/**
* @Route("/admin/restaurant")
*/
class RestaurantController extends Controller
{

	/**
	* @Route("/new", name="restauration_restaurant_new")
	*/
	public function newAction(){

		$restaurant = new Restaurant;

		//link entite et formulaire
		$form = $this->createForm(new RestaurantType, $restaurant);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($restaurant);
				$em->flush();

				return $this->redirect( $this->generateUrl('restauration_restaurant_list'));
			}
			else{

				return $this->redirectToRoute('restauration_restaurant_new');
			}

		}
		else{

			return $this->render("RestaurationBundle:restaurant:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="restauration_restaurant_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$restaurant = $em->getRepository("RestaurationBundle:Restaurant")->find($id);

		return $this->render("RestaurationBundle:restaurant:show.html.twig", 
			array(
				"restaurant" => $restaurant
			)
		);
	}

	/**
	* @Route("/update/{id}", name="restauration_restaurant_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$restaurant = $em->getRepository("RestaurationBundle:Restaurant")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new RestaurantType, $restaurant);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($restaurant);
				$em->flush();

				return $this->redirect( $this->generateUrl('restauration_restaurant_list'));
			}
			

		}
		else{

			return $this->render("RestaurationBundle:restaurant:update.html.twig", 
				array(
					"form" => $form->createView(),
					"restaurant" => $restaurant

				)
			);
		}

	}

	/**
	* @Route("/list", name="restauration_restaurant_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$restaurants = $em->getRepository("RestaurationBundle:Restaurant")->findAll();

		return $this->render("RestaurationBundle:restaurant:list.html.twig", 
			array(
				"restaurants" => $restaurants
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="restauration_restaurant_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$restaurant = $em->getRepository("RestaurationBundle:Restaurant")->find($id);
		if($restaurant != null){
        	$em->remove($restaurant);
        	$em->flush();
    	}

        return $this->redirectToRoute('restauration_restaurant_list');
	}
}
