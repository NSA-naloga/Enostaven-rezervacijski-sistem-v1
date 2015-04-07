<?php

namespace NSA\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name){

        return $this->render('NSABundle:Default:index.html.twig', array('name' => $name));
    }

    public function testingAction(){

    	return $this->render('NSABundle:Default:bootstrap_testing.html.twig');
    }
}
