<?php

namespace SEC\SolicitudesBundle\controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception;
use SEC\SolicitudesBundle\Entity\EnteControl;
use SEC\SolicitudesBundle\Form\EnteControlType;

class EnteControlController extends Controller {


    public function newAction() {

        $entecontrol = new EnteControl;
        
        $form = $this->get('form.factory')->create(new EnteControlType, $entecontrol);

        return $this->render('SECSolicitudesBundle:EnteControl:new.html.twig', array(
                    'EnteControl' => $entecontrol,
                    'form' => $form->createView()
                ));
    }

    public function createAction() {

        $entecontrol = new EnteControl;
        $request = $this->get('request');
        $form = $this->createForm(new EnteControlType, $entecontrol);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {

                $session = $this->getRequest()->getSession();

                $em = $this->getDoctrine()->getEntityManager();

                $em->persist($entecontrol);
                try {
                    $em->flush();

                    $session->setFlash('success', 'El ente de control fue creado');
                    return $this->redirect($this->generateURL('proceso_list'));
                } catch (\Exception $e) {

                    if ($e <> null) {
                        $session->setFlash('info', 'Ocurrio un error al crear el ente de control');
                    }
                }
            }
        }

        return $this->render('SECSolicitudesBundle:Entecontrol:new.html.twig', array(
                    'EnteControl' => $entecontrol,
                    'form' => $form->createView()
                ));
    
            
}



}

?>
