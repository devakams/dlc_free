<?php

namespace HotellerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use HotellerieBundle\Entity\Hotel;
use HotellerieBundle\Form\HotelType;


/**
 * @Route("/hotel")
 */
class HotelController extends Controller
{
    /**
     * @Route("/", name="hotellerie_hotellerie_index")
     */
    public function indexAction()
    {
        return $this->render('HotellerieBundle:hotellerie:index.html.twig');
    }


	/**
	* @Route("/new", name="hotellerie_hotel_new")
	*/
	public function newAction(){

		$hotel = new Hotel;

		//link entite et formulaire
		$form = $this->createForm(new HotelType, $hotel);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($hotel);
				$em->flush();

				return $this->redirect( $this->generateUrl('hotellerie_hotel_list'));
			}
			else{

				return $this->redirectToRoute('hotellerie_hotel_new');
			}

		}
		else{

			return $this->render("HotellerieBundle:hotel:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="hotellerie_hotel_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$hotel = $em->getRepository("HotellerieBundle:Hotel")->find($id);

		return $this->render("HotellerieBundle:hotel:show.html.twig", 
			array(
				"hotel" => $hotel
			)
		);
	}

	/**
	* @Route("/update/{id}", name="hotellerie_hotel_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$hotel = $em->getRepository("HotellerieBundle:Hotel")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new HotelType, $hotel);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($hotel);
				$em->flush();

				return $this->redirect( $this->generateUrl('hotellerie_hotel_list'));
			}
			

		}
		else{

			return $this->render("HotellerieBundle:hotel:update.html.twig", 
				array(
					"form" => $form->createView(),
					"hotel" => $hotel

				)
			);
		}

	}

	/**
	* @Route("/list", name="hotellerie_hotel_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$hotels = $em->getRepository("HotellerieBundle:Hotel")->findAll();

		return $this->render("HotellerieBundle:hotel:list.html.twig", 
			array(
				"hotels" => $hotels
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="hotellerie_hotel_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$hotel = $em->getRepository("HotellerieBundle:Hotel")->find($id);
		if($hotel != null){
        	$em->remove($hotel);
        	$em->flush();
    	}

        return $this->redirectToRoute('hotellerie_hotel_list');
	}
}