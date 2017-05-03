<?php

namespace Beneylu\BeneyluBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beneylu\BeneyluBundle\Entity\Software;
use Beneylu\BeneyluBundle\Form\SoftwareType;

/**
 * Software controller.
 *
 */
class SoftwareController extends Controller
{

    /**
     * Lists all Software entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BeneyluBundle:Software')->findAll();

        return $this->render('BeneyluBundle:Software:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Software entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Software();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('software_show', array('id' => $entity->getId())));
        }

        return $this->render('BeneyluBundle:Software:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Software entity.
     *
     * @param Software $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Software $entity)
    {
        $form = $this->createForm(new SoftwareType(), $entity, array(
            'action' => $this->generateUrl('software_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Software entity.
     *
     */
    public function newAction()
    {
        $entity = new Software();
        $form   = $this->createCreateForm($entity);

        return $this->render('BeneyluBundle:Software:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Software entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Software')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Software entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Software:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Software entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Software')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Software entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BeneyluBundle:Software:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Software entity.
    *
    * @param Software $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Software $entity)
    {
        $form = $this->createForm(new SoftwareType(), $entity, array(
            'action' => $this->generateUrl('software_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Software entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeneyluBundle:Software')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Software entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('software_edit', array('id' => $id)));
        }

        return $this->render('BeneyluBundle:Software:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Software entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BeneyluBundle:Software')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Software entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('software'));
    }

    /**
     * Creates a form to delete a Software entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('software_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
