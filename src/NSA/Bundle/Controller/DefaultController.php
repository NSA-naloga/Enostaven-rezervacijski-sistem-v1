<?php

namespace NSA\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NSA\Bundle\Entity\Naloga;
use NSA\Bundle\Entity\Profesor;
use NSA\Bundle\Entity\Prosnja;
use NSA\Bundle\Entity\Rezervacija;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\User;

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
            ->findBy(array(),array('datumKreiranja'=>'desc'));
      if (!$naloga) {
        throw $this->createNotFoundException('Ni najdenih nalog.');
      }
    
      $build['naloga'] = $naloga;
      return $this->render('NSABundle:Default:vseNaloge.html.twig',$build);
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
    $username=$this->get('security.token_storage')->getToken()->getUser()->getUserName();
    $Naloga->setprofesor($username);
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
    $rezervacija = $this->getDoctrine()->getRepository('NSABundle:Rezervacija')->findBy(array(),array('datumOddaje'=>'desc'));
    if (!$rezervacija) {
      throw $this->createNotFoundException('Ni najdene rezervacije');
    }

    $build['rezervacija'] = $rezervacija;
    return $this->render('NSABundle:Default:vseRezervacije.html.twig', $build);
   }

   public function dodajRezervacijoAction(Request $request,$id=null){ // ce ne dobi parametra id, je null) {
    $rezervacija = new rezervacija();

    $form = $this->createFormBuilder($rezervacija)
     // ->add('username', 'text')
     // ->add('ime', 'text')
     //->add('priimek', 'text')
     // ->add('razred', 'choice', array('choices' => array('e4a' => 'E4A', 'E4B' => 'E4B', 'E4C' => 'E4C', 'G4A' => 'G4A', 'G4B' => 'G4B', 'G4C' => 'G4C', 'R4A' => 'R4A', 'R4B' => 'R4B', 'R4C' => 'R4C')))
     // ->add('status', 'choice', array('choices' => array('dijak' => 'Dijak', 'profesor' => 'Profesor')))
     // ->add('id_naloge', 'integer')
     // ->add('datum_oddaje', 'datetime')
      ->add('Ponovno kliknite za oddajo rezervacije!', 'submit')
      ->getForm();
      $username=$this->get('security.token_storage')->getToken()->getUser()->getUserName();
      $rezervacija->setusername($username);
      $ime=$this->get('security.token_storage')->getToken()->getUser()->getIme();
      $rezervacija->setime($ime);
      $priimek=$this->get('security.token_storage')->getToken()->getUser()->getPriimek();
      $rezervacija->setpriimek($priimek);
      $rezervacija->setdatumoddaje(new \DateTime());
      $rezervacija->setidnaloge($id);

      $form->handleRequest($request);
      if($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($rezervacija);
        $em->flush();
        return $this->redirect($this->generateUrl('nsa_success'));
      }

      return $this->render('NSABundle:Default:dodaj_rezervacijo.html.twig', array('form' => $form->createView()));
   }

   public function pokaziProsnjoAction($id) {
      $prosnja = $this->getDoctrine()
            ->getRepository('NSABundle:Prosnja')
            ->find($id);
      if (!$prosnja) {
        throw $this->createNotFoundException('Prosnja z ID-jem ' . $id.' ne obstaja');
      }
    
      $build['prosnja_item'] = $prosnja;
      return $this->render('NSABundle:Default:pokazi_prosnjo.html.twig', $build);
    }

   public function vseProsnjeAction(){
   		$prosnja = $this->getDoctrine()
            ->getRepository('NSABundle:Prosnja')
            ->findAll();
      if (!$prosnja) {
        throw $this->createNotFoundException('Ni najdenih prosenj.');
      }
    
      $build['prosnja'] = $prosnja;
      return $this->render('NSABundle:Default:vseProsnje.html.twig', $build);
   }

    public function dodajProsnjoAction(Request $request){
    $Prosnja=new Prosnja();

    $form=$this->createFormBuilder($Prosnja)
        ->add('zeljeni_status','choice', array('choices' => array('dijak' => 'Dijak', 'profesor' => 'Profesor', 'Administrator' => 'Administrator')))
    	->add('komentar','textarea')
    	->add('save','submit')
        ->getForm();
        $username=$this->get('security.token_storage')->getToken()->getUser()->getUserName();
      	$Prosnja->setusername($username);
    $form->handleRequest($request);
    if($form->isValid()){
      $em=$this->getDoctrine()->getManager();
      $em->persist($Prosnja);
      $em->flush();
      return $this->redirect($this->generateUrl('nsa_success'));
    }
    //$build['form']= $form->createView();
     return $this->render('NSABundle:Default:dodaj_prosnjo.html.twig',array('form' => $form->createView()));
 
  }
}