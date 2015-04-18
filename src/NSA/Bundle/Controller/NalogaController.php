<?php

namespace NSA\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NSA\Bundle\Entity\Naloga;
use NSA\Bundle\Form\NalogaType;

/**
 * Naloga controller.
 *
 * @Route("/naloga")
 */
class NalogaController extends Controller
{

    /**
     * Lists all Naloga entities.
     *
     * @Route("/", name="naloga")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NSABundle:Naloga')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Naloga entity.
     *
     * @Route("/", name="naloga_create")
     * @Method("POST")
     * @Template("NSABundle:Naloga:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Naloga();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('naloga_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Naloga entity.
     *
     * @param Naloga $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Naloga $entity)
    {
        $form = $this->createForm(new NalogaType(), $entity, array(
            'action' => $this->generateUrl('naloga_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Naloga entity.
     *
     * @Route("/new", name="naloga_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Naloga();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Naloga entity.
     *
     * @Route("/{id}", name="naloga_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NSABundle:Naloga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Naloga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Naloga entity.
     *
     * @Route("/{id}/edit", name="naloga_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NSABundle:Naloga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Naloga entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Naloga entity.
    *
    * @param Naloga $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Naloga $entity)
    {
        $form = $this->createForm(new NalogaType(), $entity, array(
            'action' => $this->generateUrl('naloga_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Naloga entity.
     *
     * @Route("/{id}", name="naloga_update")
     * @Method("PUT")
     * @Template("NSABundle:Naloga:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NSABundle:Naloga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Naloga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('naloga_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Naloga entity.
     *
     * @Route("/{id}", name="naloga_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NSABundle:Naloga')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Naloga entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('naloga'));
    }

    /**
     * Creates a form to delete a Naloga entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('naloga_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
