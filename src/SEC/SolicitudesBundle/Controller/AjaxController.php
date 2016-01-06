<?php

namespace SEC\SolicitudesBundle\controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller {

    public function getDiasHabilesAction() {
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {
            $fechaInicial = $request->get('fechaRecSDA');
            $diasrespuesta = $request->get('diasResponder');

            $respuesta = $this->getDiasHabiles($fechaInicial, $diasrespuesta);
        }



        return new Response(json_encode($respuesta));
    }

    public function getAlertaAction() {

        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {

            $fechaInicio = strtotime($request->get('fechaInicio'));
            $fechaFin = $this->getDiasHabiles($request->get('fechaInicio'), $request->get('dias'));
            $porcentajeAlerta = $request->get('porcentaje');
            
            $convert = explode('/', $fechaFin);
            
            $fechaFinConvert = strtotime($convert[1].'/'.$convert[0].'/'.$convert[2]);
            
            //$fechaFin = strtotime($fechaFin);
            
            //date_parse_from_format('m/d/Y', $fechaFin)
            
            $fechauno = $fechaFinConvert - $fechaInicio;
            $fechados = $fechauno * $porcentajeAlerta;
            $fechatres = $fechaInicio + $fechados;

            $alerta = date('d/m/Y', $fechatres);
        }

        return new Response(json_encode($alerta));
    }

    /**
     * Metodo getDiasHabiles
     *
     * Permite devolver el ultimo dia habil
     * segun los dias para contar
     *
     * @param string $fechainicio Fecha de inicio en formato d/m/Y
     * @param int $nodias Numero de dias a contar
     * @param array $diasferiados Arreglo de dias feriados en formato d/m/Y
     * @return array $diashabiles El ultimo dia habil
     */
    private function getDiasHabiles($fechainicio, $nodias, $diasferiados = array()) {

// Convirtiendo en timestamp las fechas
        $fechainicio = strtotime($fechainicio);
        $fechainicio = $fechainicio + (24 * 60 * 60);

        // Incremento en 1 dia
        $diainc = 24 * 60 * 60;
        $dia = 24 * 60 * 60;
        $nodias = $nodias * $diainc;

        // Arreglo de dias habiles, inicianlizacion
        $diashabiles = array();
        $diasferiados = array('03/06/2013');

        for ($dias = $fechainicio; $dia <= $nodias; $dias += $diainc) {
            // Si el dia indicado, no es sabado o domingo es habil
            if (!in_array(date('N', $dias), array(6, 7))) {
                // Si no es un dia feriado entonces es habil
                if (!in_array(date('d/m/Y', $dias), $diasferiados)) {

                    array_push($diashabiles, date('d/m/Y', $dias));
                    $dia += $diainc;
                }
            }
        }


        return end($diashabiles);
    }

}

?>
