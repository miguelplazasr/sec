<?php

namespace SEC\SolicitudesBundle\controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception;

use SEC\SolicitudesBundle\Entity\Proceso;
use SEC\SolicitudesBundle\Form\ProcesoType;

class ProcesoController extends Controller {


    public function indexAction() {

        return $this->render('SolicitudesBundle:Proceso:list.html.twig');
    
}

public function listAction() {

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        //$breadcrumbs->addItem("Proceso", $this->get("router")->generate("_homepage"));
        $breadcrumbs->addItem("Some text without link");


        $em = $this->get('doctrine')->getEntityManager();
        $procesos = $em->getRepository('SECSolicitudesBundle:Proceso')->findAll();

        //$paginator = $this->get('knp_paginator');
        //$pagination = $paginator->paginate(
        //        $procesos, $this->get('request')->query->get('page', 1), 2
        //);

        
        return $this->render('SECSolicitudesBundle:Proceso:list.html.twig', array(
                    'pagination' => $procesos,
                    'breadcrumbs' => $breadcrumbs
                ));
    }

public function newAction() {

    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Home", $this->get("router")->generate("_homepage"));
    
    $proceso = new Proceso;
    $form = $this->get('form.factory')->create(new ProcesoType, $proceso);

    return $this->render('SECSolicitudesBundle:Proceso:new.html.twig', array(
                'proceso' => $proceso,
                'form' => $form->createView()
            ));
}

public function createAction() {

    $proceso = new Proceso;
    
    $request = $this->get('request');
    $request->isXmlHttpRequest();
    
    $form = $this->createForm(new ProcesoType(), $proceso);

    if ($request->getMethod() == 'POST') {
        $form->bindRequest($request);
        if ($form->isValid()) {

            $session = $this->getRequest()->getSession();
            $em = $this->getDoctrine()->getEntityManager();
            
            $em->persist($proceso);
            try {
                $em->flush();

                $session->setFlash('success', 'Mesaje ok, almacenado');
                return $this->redirect($this->generateURL('proceso_list'));
            } catch (\Exception $e) {

                if ($e <> null) {
                    $session->setFlash('error', $e);
                }
            }
        }
    }

    return $this->render('SECSolicitudesBundle:Proceso:new.html.twig', array(
                'proceso' => $proceso,
                'form' => $form->createView()
            ));

            
}

    public function editAction($id)
    {
        $proceso = $this->get('request');
        $em = $this->get('doctrine')->getEntityManager();

        if (null == $proceso = $em->find('SECSolicitudesBundle:Proceso', $id)) {
            throw new NotFoundHttpException('No existe el proceso que se quiere modificar');
        }

        $form = $this->get('form.factory')->create(new ProcesoType());
        $form->setData($proceso);

        if ($this->get('request')->getMethod() == 'POST') {
            $form->bindRequest($this->get('request'));

            if ($form->isValid()) {
                $session = $this->getRequest()->getSession();
                $em->persist($proceso);
                try {
                $em->flush();

                $session->setFlash('success', 'El registro fue actualizado');
                return $this->redirect($this->generateURL('proceso_list'));
            } catch (\Exception $e) {

                if ($e <> null) {
                    $session->setFlash('error', $e);
                }
            }

                return $this->redirect($this->generateUrl('proceso_list'));
            }
        }

        return $this->render('SECSolicitudesBundle:Proceso:edit.html.twig', array(
            'form' => $form->createView(),
            'proceso'   => $proceso
        ));
    }



}

?>
