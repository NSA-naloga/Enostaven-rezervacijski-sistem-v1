<?php

namespace NSA\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NSA\Bundle\Entity\Naloga;
use NSA\Bundle\Entity\Profesor;

class DefaultController extends Controller
{
    public function prvaAction(){

        return $this->render('NSABundle:Default:index.html.twig');
    }

    public function successAction(){

        return $this->render('NSABundle:Default:success.html.twig');
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

   public function dodajNalogoAction(Request $request){
    $Naloga=new Naloga();

    $form=$this->createFormBuilder($Naloga)
        ->add('naslov','text')
        ->add('opis','textarea')
        ->add('kljucnebesede','textarea')
        ->add('steviloKandidatov','integer')
        ->add('zacetniDatum','datetime')
        ->add('datumOddaje','date',array('years'=>range(date('Y'),date('Y')+2)))
		->add('save','submit')
        ->getForm();
    $Naloga->setdatumKreiranja(new \DateTime()); // Sam doda datum dodajanja
    $Naloga->setdatumObjave(new \DateTime()); // Sam doda datum dodajanja
    $Naloga->setProfesor('1'); // SAMO ZA TEST
    $form->handleRequest($request);
    if($form->isValid()){
      $em=$this->getDoctrine()->getManager();
      $em->persist($Naloga);
      $em->flush();
      return $this->redirect($this->generateUrl('nsa_success'));
    }
    //$build['form']= $form->createView();
     return $this->render('NSABundle:Default:dodaj_nalogo.html.twig',array('form' => $form->createView()));
 
}


}