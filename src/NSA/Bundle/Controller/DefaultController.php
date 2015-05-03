<?php

namespace NSA\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NSA\Bundle\Entity\Naloga;
use NSA\Bundle\Entity\Profesor;
use NSA\Bundle\Entity\Rezervacija;

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

   public function dodajProfesorjaAction(Request $request) {
    $profesor = new profesor();

    $form = $this->createFormBuilder($profesor)
      ->add('ime', 'text')
      ->add('priimek', 'text')
      ->add('save', 'submit')
      ->getForm();

      $form->handleRequest($request);
      if($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($profesor);
        $em->flush();
        return $this->redirect($this->generateUrl('nsa_success'));
      }

      return $this->render('NSABundle:Default:dodaj_profesorja.html.twig', array('form' => $form->createView()));
   }

 

   public function pokaziRezervacijoAction($id) {
    $rezervacija = $this->getDoctrine()
            ->getRepository('NSABundle:Rezervacija')
            ->find($id);
      if (!$rezervacija) {
        throw $this->createNotFoundException('Rezervacije z ID-jem ' . $id.' ni');
      }
    
      $build['rezervacija_item'] = $rezervacija;
      return $this->render('NSABundle:Default:pokazi_rezervacijo.html.twig', $build);
   }

   public function vseRezervacijeAction() {
    $rezervacija = $this->getDoctrine()->getRepository('NSABundle:Rezervacija')->findAll();
    if (!$rezervacija) {
      throw $this->createNotFoundException('Ni najdene rezervacije');
    }

    $build['rezervacija'] = $rezervacija;
    return $this->render('NSABundle:Default:vseRezervacije.html.twig', $build);
   }

   public function dodajRezervacijoAction(Request $request) {
    $rezervacija = new rezervacija();

    $form = $this->createFormBuilder($rezervacija)
      ->add('username', 'text')
      ->add('ime', 'text')
      ->add('priimek', 'text')
      ->add('razred', 'text')
      
      ->add('status', 'choice', array('choices' => array('dijak' => 'Dijak', 'profesor' => 'Profesor')))
      ->add('id_naloge', 'integer')
      ->add('datum_oddaje', 'datetime')
      ->add('save', 'submit')
      ->getForm();

      $form->handleRequest($request);
      if($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($rezervacija);
        $em->flush();
        return $this->redirect($this->generateUrl('nsa_success'));
      }

      return $this->render('NSABundle:Default:dodaj_rezervacijo.html.twig', array('form' => $form->createView()));
   }

}