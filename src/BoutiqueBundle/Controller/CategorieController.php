<?php

namespace BoutiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

//
use BoutiqueBundle\Entity\Categorie;
use BoutiqueBundle\Form\CategorieType;

/**
* @Route("/categorie")
*/
class CategorieController extends Controller
{

	/**
	* @Route("/", name="boutique_categorie_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('boutique_categorie_list'));
	}

	/**
	* @Route("/new", name="boutique_categorie_new")
	*/
	public function newAction(){

		$categorie = new Categorie;

		//link entite et formulaire
		$form = $this->createForm(new CategorieType, $categorie);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($categorie);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_categorie_list'));
			}
			else{

				return $this->redirectToRoute('boutique_categorie_new');
			}

		}
		else{

			return $this->render("BoutiqueBundle:categorie:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="boutique_categorie_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$categorie = $em->getRepository("BoutiqueBundle:Categorie")->find($id);

		return $this->render("BoutiqueBundle:categorie:show.html.twig", 
			array(
				"categorie" => $categorie
			)
		);
	}

	/**
	* @Route("/update/{id}", name="boutique_categorie_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$categorie = $em->getRepository("BoutiqueBundle:Categorie")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new CategorieType, $categorie);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($categorie);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_categorie_list'));
			}
			

		}
		else{

			return $this->render("BoutiqueBundle:categorie:update.html.twig", 
				array(
					"form" => $form->createView(),
					"categorie" => $categorie

				)
			);
		}

	}

	/**
	* @Route("/list", name="boutique_categorie_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$categories = $em->getRepository("BoutiqueBundle:Categorie")->findAll();

		return $this->render("BoutiqueBundle:categorie:list.html.twig", 
			array(
				"categories" => $categories
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="boutique_categorie_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$categorie = $em->getRepository("BoutiqueBundle:Categorie")->find($id);
		if($categorie != null){
        	$em->remove($categorie);
        	$em->flush();
    	}

        return $this->redirectToRoute('boutique_categorie_list');
	}
}
