<?php

namespace BoutiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

//
use BoutiqueBundle\Entity\Produit;
use BoutiqueBundle\Form\ProduitType;

/**
* @Route("/produit")
*/
class ProduitController extends Controller
{
	/**
	* @Route("/", name="boutique_produit_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('boutique_produit_list'));
	}

	/**
	* @Route("/new", name="boutique_produit_new")
	* @Method({"POST"})
	*/
	public function newAction(){

		$produit = new Produit;

		//link entite et formulaire
		$form = $this->createForm(new ProduitType, $produit);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($produit);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_produit_list'));
			}
			else{

				return $this->redirectToRoute('boutique_produit_new');
			}

		}
		else{

			return $this->render("BoutiqueBundle:produit:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="boutique_produit_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	* @Method({"POST"})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$produit = $em->getRepository("BoutiqueBundle:Produit")->find($id);

		return $this->render("BoutiqueBundle:produit:show.html.twig", 
			array(
				"produit" => $produit
			)
		);
	}

	/**
	* @Route("/update/{id}", name="boutique_produit_update", requirements={"id" = "\d+"})
	* @Method({"POST"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$produit = $em->getRepository("BoutiqueBundle:Produit")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new ProduitType, $produit);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($produit);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_produit_list'));
			}
			

		}
		else{

			return $this->render("BoutiqueBundle:produit:update.html.twig", 
				array(
					"form" => $form->createView(),
					"produit" => $produit

				)
			);
		}

	}

	/**
	* @Route("/list", name="boutique_produit_list")
	* @Method({"GET", "POST"})
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$produits = $em->getRepository("BoutiqueBundle:Produit")->findAll();

		return $this->render("BoutiqueBundle:produit:list.html.twig", 
			array(
				"produits" => $produits
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="boutique_produit_delete", requirements={"id" = "\d+"})
	* @Method({"POST"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$produit = $em->getRepository("BoutiqueBundle:Produit")->find($id);
		if($produit != null){
        	$em->remove($produit);
        	$em->flush();
    	}

        return $this->redirectToRoute('boutique_produit_list');
	}
}
