<?php

namespace BoutiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


//
use BoutiqueBundle\Entity\Article;
use BoutiqueBundle\Form\ArticleType;

/**
* @Route("/article")
*/
class ArticleController extends Controller
{
	/**
	* @Route("/", name="boutique_article_index")
	*/
	public function indexAction(){
		return $this->redirect( $this->generateUrl('boutique_article_list'));
	}

	/**
	* @Route("/new", name="boutique_article_new")
	*/
	public function newAction(){

		$article = new Article;

		//link entite et formulaire
		$form = $this->createForm(new ArticleType, $article);

		$request = $this->get("request");

		if($request->getMethod() == 'POST'){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($article);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_article_list'));
			}
			else{

				return $this->redirectToRoute('boutique_article_new');
			}

		}
		else{

			return $this->render("BoutiqueBundle:article:new.html.twig", array("form" => $form->createView()));

		}
		
	}

	/**
	* @Route("/show/{id}", name="boutique_article_show", requirements={"id" = "\d+"}, defaults={"id" = 1})
	*/
	public function showAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$article = $em->getRepository("BoutiqueBundle:Article")->find($id);

		return $this->render("BoutiqueBundle:article:show.html.twig", 
			array(
				"article" => $article
			)
		);
	}

	/**
	* @Route("/update/{id}", name="boutique_article_update", requirements={"id" = "\d+"})
	*/
	public function updateAction($id){

		$em = $this->getDoctrine()->getEntityManager();

		$article = $em->getRepository("BoutiqueBundle:Article")->find($id);

		//link entite et formulaire
		$form = $this->createForm(new ArticleType, $article);

		$request = $this->get("request");

		if($request->getMethod() == "POST"){
			
			$form->bind($request);

			if( $form->isSubmitted() && $form->isValid() ){

				//persister les donnees
				$em->persist($article);
				$em->flush();

				return $this->redirect( $this->generateUrl('boutique_article_list'));
			}
			

		}
		else{

			return $this->render("BoutiqueBundle:article:update.html.twig", 
				array(
					"form" => $form->createView(),
					"article" => $article

				)
			);
		}

	}

	/**
	* @Route("/list", name="boutique_article_list")
	*/
	public function listAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$articles = $em->getRepository("BoutiqueBundle:Article")->findAll();

		return $this->render("BoutiqueBundle:article:list.html.twig", 
			array(
				"articles" => $articles
			)
		);
	}

	/**
	* @Route("/delete/{id}", name="boutique_article_delete", requirements={"id" = "\d+"})
	*/
	public function deleteAction($id){
		$em = $this->getDoctrine()->getManager();
		$article = $em->getRepository("BoutiqueBundle:Article")->find($id);
		if($article != null){
        	$em->remove($article);
        	$em->flush();
    	}

        return $this->redirectToRoute('boutique_article_list');
	}
}
