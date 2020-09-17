<?php
class Analiticas extends \Common\Controller
{
    public function __construct()
    {
        $this->model = $this->loadModel('Graficos');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }

    public function graficoTipoSangre($data)
    {
        $result = $this->r;
        $data = \Helpers\Validation::trimForm($data);
        $selectedValue = $data['select'];
        if ($selectedValue!=null) {
            switch ($selectedValue) {
                case '1':
                    $value = true;
                    break;
                case '2':
                    $value = false;
                    break;
                case '3':
                    $value = null;
                    break;
                default:
                    $value = null;
            }
            if($result['dataset'] = $this->model->graficoTipoSangre($value)){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No hay datos disponibles.';
            }
        }
        else{
            $result['exception'] = 'No hay datos disponibles.';
        }
        return $result;
    }

    public function graficoPerfilesPais($data)
    {
        $result = $this->r;
        $data = \Helpers\Validation::trimForm($data);
        $selectedValue = $data['select'];
        if ($selectedValue!=null) {
            if($result['dataset'] = $this->model->graficoPerfilesPais($selectedValue)){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No hay datos disponibles.';
            }
        }
        else{
            $result['exception'] = 'No hay datos disponibles.';
        }
        return $result;
    }

    public function graficoPerfilesFecha($data)
    {
        $result = $this->r;
        $data = \Helpers\Validation::trimForm($data);
        $fechaInicio = isset($data['fechaInicio']) ? $data['fechaInicio'] : null;
        $fechaFin = isset($data['fechaFin']) ? $data['fechaFin'] : null;
        if ($fechaInicio !=null && $fechaFin !=null) {
            if($result['dataset'] = $this->model->graficoPerfilesFecha($fechaInicio, $fechaFin)){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No hay datos disponibles.';
            }
        }
        else{
            $result['exception'] = 'Ingresa una fecha válida';
        }
        return $result;
    }

    public function getCountries(){
        $result = $this->r;
        $result['dataset']= $this->model->getCountries();
        return $result;
    }
}
