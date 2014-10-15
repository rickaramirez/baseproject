<?php

namespace ensemble01\siteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class siteController extends Controller {

	public function indexAction() {
		$data = array();
		$data['name'] = "anonyme";
		return $this->render('ensemble01siteBundle:pages:homepage.html.twig', $data);
	}

	public function pagewebAction($page = null, $dossier = null) {
		$data = array();
		$data['page'] = $page;
		return $this->render($this->verifVersionPage($data['page']), $data);
	}

	public function menuAction($route, $routeparams) {
		$data = array();
		$data['route'] = $route;
		$data['routeparams'] = urldecode($routeparams);
		return $this->render('ensemble01siteBundle:menus:menuprincipal.html.twig', $data);
	}



	//////////////////////////
	// Autres fonctions
	//////////////////////////

	private function verifVersionPage($page, $dossier = "pages") {
		if(!$this->get('templating')->exists("ensemble01siteBundle:".$dossier.":".$page.".html.twig")) {
			// si la page n'existe pas, on prend le template de la version par défaut
			$page = 'error404';
		}
		return "ensemble01siteBundle:".$dossier.":".$page.".html.twig";
	}

}
