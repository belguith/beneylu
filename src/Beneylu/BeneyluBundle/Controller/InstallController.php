<?php

namespace Beneylu\BeneyluBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beneylu\BeneyluBundle\Entity\Install;
use Beneylu\BeneyluBundle\Form\InstallType;

/**
 * Install controller.
 *
 */
class InstallController extends Controller
{

    /**
     * Lists all Install entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BeneyluBundle:Install')->findAll();

        return $this->render('BeneyluBundle:Install:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Install entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Install();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('install_show', array('id' => $entity->getId())));
        }

        return $this->render('BeneyluBundle:Install:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Install entity.
     *
     * @param Install $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Install $entity)
    {
        $form = $this->createForm(new InstallType(), $entity, array(
            'action' => $this->generateUrl('install_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Install entity.
     *
     */
    public function newAction()
    {
        $entity = new Install();
        $form   = $this->createCreateForm($entity);

        return $this->render('BeneyluBundle:Install:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Install entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Install')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Install entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Install:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Install entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Install')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Install entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Install:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Install entity.
    *
    * @param Install $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Install $entity)
    {
        $form = $this->createForm(new InstallType(), $entity, array(
            'action' => $this->generateUrl('install_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Install entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Install')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Install entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('install_edit', array('id' => $id)));
        }

        return $this->render('BeneyluBundle:Install:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Install entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BeneyluBundle:Install')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Install entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('install'));
    }

    /**
     * Creates a form to delete a Install entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('install_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
