<?php

namespace SEC\SolicitudesBundle\controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception;
use SEC\SolicitudesBundle\Entity\Asignacion;
use SEC\SolicitudesBundle\Form\AsignacionType;

class AsignacionController extends Controller {


    
    public function newAction() {

        $asignacion = new Asignacion;
        $form = $this->get('form.factory')->create(new AsignacionType, $asignacion);

        return $this->render('SECSolicitudesBundle:Asignacion:new.html.twig', array(
                    'Asignacion' => $asignacion,
                    'form' => $form->createView()
                ));
    }

    public function createAction() {

        $asignacion = new Asignacion;
        $request = $this->get('request');
        $form = $this->createForm(new AsignacionType, $asignacion);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {

                $session = $this->getRequest()->getSession();

                $em = $this->getDoctrine()->getEntityManager();
                

                $em->persist($asignacion);
                try {
                    $em->flush();

                    $session->setFlash('success', 'La persona fue asignada al proceso');
                    return $this->redirect($this->generateURL('proceso_list'));
                } catch (\Exception $e) {

                    if ($e <> null) {
                        $session->setFlash('info', 'Ocurrio un error al asignar el proceso.');
                    }
                }
            }
        }

        return $this->render('SECSolicitudesBundle:Asignacion:new.html.twig', array(
                    'Asignacion' => $asignacion,
                    'form' => $form->createView()
                ));
    
            
}



}

?>
