<?php

namespace Beneylu\BeneyluBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beneylu\BeneyluBundle\Entity\Version;
use Beneylu\BeneyluBundle\Form\VersionType;

/**
 * Version controller.
 *
 */
class VersionController extends Controller
{

    /**
     * Lists all Version entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BeneyluBundle:Version')->findAll();

        return $this->render('BeneyluBundle:Version:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Version entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Version();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('version_show', array('id' => $entity->getId())));
        }

        return $this->render('BeneyluBundle:Version:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Version entity.
     *
     * @param Version $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Version $entity)
    {
        $form = $this->createForm(new VersionType(), $entity, array(
            'action' => $this->generateUrl('version_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Version entity.
     *
     */
    public function newAction()
    {
        $entity = new Version();
        $form   = $this->createCreateForm($entity);

        return $this->render('BeneyluBundle:Version:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Version entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Version')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Version:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Version entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Version')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Version:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Version entity.
    *
    * @param Version $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Version $entity)
    {
        $form = $this->createForm(new VersionType(), $entity, array(
            'action' => $this->generateUrl('version_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Version entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Version')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('version_edit', array('id' => $id)));
        }

        return $this->render('BeneyluBundle:Version:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Version entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BeneyluBundle:Version')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Version entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('version'));
    }

    /**
     * Creates a form to delete a Version entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('version_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
