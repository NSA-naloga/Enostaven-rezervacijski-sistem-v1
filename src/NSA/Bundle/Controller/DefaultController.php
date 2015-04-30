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


	public function pokaziNalogoAction($id) {
      $naloga = $this->getDoctrine()
            ->getRepository('NSABundle:Naloga')
            ->find($id);
      if (!$naloga) {
        throw $this->createNotFoundException('Naloga z ID-jem ' . $id.' ne obstaja');
      }
    
      $build['naloga_item'] = $naloga;
      return $this->render('NSABundle:Default:pokazi_nalogo.html.twig', $build);
    }

   public function vseNalogeAction(){
   		$naloga = $this->getDoctrine()
            ->getRepository('NSABundle:Naloga')
            ->findAll();
      if (!$naloga) {
        throw $this->createNotFoundException('Ni najdenih nalog.');
      }
    
      $build['naloga'] = $naloga;
      return $this->render('NSABundle:Default:vseNaloge.html.twig', $build);
   }

   public function pokaziProfesorjaAction($id) {
    $profesor = $this->getDoctrine()->getRepository('NSABundle:Profesor')->find($id);
    if (!$profesor) {
      throw $this->createNotFoundException('Profesor z ID-jem ' . $id . 'ne obstaja');
    }

    $build['profesor_item'] = $profesor;
    return $this->render('NSABundle:Default:pokazi_profesorja.html.twig', $build);
   } 

   public function vsiProfesorjiAction() {
    $profesor = $this->getDoctrine()->getRepository('NSABundle:Profesor')->findAll();
    if (!$profesor) {
      throw $this->createNotFoundException('Ni najdenih profesorjev');
    }

    $build['profesor'] = $profesor;
    return $this->render('NSABundle:Default:vsiProfesorji.html.twig', $build);
   }

}