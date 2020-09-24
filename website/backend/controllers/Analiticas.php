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
                $result['exception'] = 'No data available.';
            }
        }
        else{
            $result['exception'] = 'No data available.';
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
                $result['exception'] = 'No data available..';
            }
        }
        else{
            $result['exception'] = 'No data available.';
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
                $result['exception'] = 'No data available.';
            }
        }
        else{
            $result['exception'] = 'Enter a valid date';
        }
        return $result;
    }

    public function graficoTop5Medicamentos()
    {
        $result = $this->r;
            if($result['dataset'] = $this->model->graficoTop5Medicamentos()){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No data available.';
            }
        return $result;
    }

    public function graficoEstadoUsuarios()
    {
        $result = $this->r;
            if($result['dataset'] = $this->model->graficoEstadoUsuarios()){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No data available.';
            }
        return $result;
    }

    public function graficoUsuariosFecha($data)
    {
        $result = $this->r;
        $data = \Helpers\Validation::trimForm($data);
        $fechaInicio = isset($data['fechaInicio2']) ? $data['fechaInicio2'] : null;
        $fechaFin = isset($data['fechaFin2']) ? $data['fechaFin2'] : null;
        if ($fechaInicio !=null && $fechaFin !=null) {
            if($result['dataset'] = $this->model->graficoUsuariosFecha($fechaInicio, $fechaFin)){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No data available.';
            }
        }
        else{
            $result['exception'] = 'Enter a valid date';
        }
        return $result;
    }

    public function graficoUsuariosPrivFecha($data)
    {
        $result = $this->r;
        $data = \Helpers\Validation::trimForm($data);
        $fechaInicio = isset($data['fechaInicio3']) ? $data['fechaInicio3'] : null;
        $fechaFin = isset($data['fechaFin3']) ? $data['fechaFin3'] : null;
        if ($fechaInicio !=null && $fechaFin !=null) {
            if($result['dataset'] = $this->model->graficoUsuariosPrivFecha($fechaInicio, $fechaFin)){
                $result['status'] = 1;
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'No data available.';
            }
        }
        else{
            $result['exception'] = 'Enter a valid date';
        }
        return $result;
    }

    public function getCountries(){
        $result = $this->r;
        $result['dataset']= $this->model->getCountries();
        return $result;
    }

    public function graficoParaCondicionMedica()
    {
            $result = $this->model->graficoCondicionMedica();
            return $result;
    }

    public function graficoParaProcedimientoMedicoo()
    {
            $result = $this->model->graficoProdecimientoMedico();
            return $result;
    }

    public function reporteUsuariosPais()
    {
        $result = $this->r;
        $output = __DIR__.'/../../public/reports/analytics';

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteUsuariosPais.jrxml';
            $input = __DIR__.'/../reports/reporteUsuariosPais.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'email' => $_SESSION['p_user_email']
                ],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => DB_USER,
                    'password' => DB_PASSWORD,
                    'host' => DB_HOST,
                    'database' => DB_NAME,
                    'port' => DB_PORT
                ]
            ];

            $jasper = new \PHPJasper\PHPJasper;

            $jasper->compile($jrxml)->execute();

            $jasper->process(
            $input,
            $output,
            $options
            )->execute();

            $file = $output.'/reporteUsuariosPais.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'The pdf has been generated correctly';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'Report could not be generated';
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'The directory could not be created.';
        }
        return $result;
    }

    public function reporteUsuariosPrivilegiados()
    {
        $result = $this->r;

        $output = __DIR__.'/../../public/reports/analytics';

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteUsuariosPrivilegiados.jrxml';
            $input = __DIR__.'/../reports/reporteUsuariosPrivilegiados.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'usuariocreador' => $_SESSION['p_user_email']
                ],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => DB_USER,
                    'password' => DB_PASSWORD,
                    'host' => DB_HOST,
                    'database' => DB_NAME,
                    'port' => DB_PORT
                ]
            ];

            $jasper = new \PHPJasper\PHPJasper;

            $jasper->compile($jrxml)->execute();

            $jasper->process(
            $input,
            $output,
            $options
            )->execute();

            $file = $output.'/reporteUsuariosPrivilegiados.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'The pdf has been generated correctly';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'Report could not be generated';
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'The directory could not be created.';
        }
        return $result;
    }
}
