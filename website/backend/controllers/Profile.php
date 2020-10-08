<?php

class Profile extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('Perfil');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }
    public function newUser($userData)
    {
        $result = $this->r;
        if($this->usersModel->countProfilesUser($_SESSION['user_id']) == 0) {
            $userData = \Helpers\Validation::trimForm($userData);
            $nombres = $userData['nombres'];
            $apellidos = $userData['apellidos'];
            $tel = $userData['tel'];

            $profile = new Perfil;
            $errors = [];
            $errors = $profile->setNombres($nombres) === true ? $errors : array_merge($errors, $profile->setNombres($nombres));
            $errors = $profile->setApellidos($apellidos) === true ? $errors : array_merge($errors, $profile->setApellidos($apellidos));

            $user = $this->loadModel('Usuario');
            $errors = $user->setTelefono($tel) === true ? $errors : array_merge($errors, $user->setTelefono($tel));

            $idUsuario = $_SESSION['user_id'];
            //If there aren't any errors
            if (!boolval($errors)) {
                if ($idPerfil = ($this->usersModel->newProfile($idUsuario))->id_perfil_medico ){
                    $rUsuario =$user->updateUserParam('id_perfil_medico', $idPerfil, $idUsuario);
                    $rNombres = $this->usersModel->updateProfileParam('nombres', $nombres, $idPerfil);
                    $rApellidos = $this->usersModel->updateProfileParam('apellidos', $apellidos, $idPerfil);
                    $rTelefono = $tel ? $user->updateUserParam('telefono', $tel, $idUsuario) : true;

                    if ($rUsuario && $rNombres && $rApellidos && $rTelefono) {
                        $_SESSION['user_profile'] = $idPerfil;
                        $result['status'] = 1;
                        $result['message'] = 'Usuario registrado correctamente';
                        $result['id_perfil_medico'] = $idPerfil;
                    }
                    else {
                        $result['status'] = -1;
                        $result['exception'] = \Common\Database::$exception;
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = \Common\Database::$exception;
                }
            } else {
                $result['status'] = 0;
                $result['exception'] = 'Error en uno de los campos';
                $result['errors'] = $errors;
            }
        }
        else {
            $result['status'] = -2;
            $result['exception'] = 'Ya existe un perfil médico. Redirigiendo a perfiles...';
        }
        return $result;
    }
    public function perfilesUsuario()
    {
        $result = $this->r;
        if ($result['dataset'] = $this->usersModel->getPerfilesUsuario($_SESSION['user_id'])) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay ningun perfil médico';
        }
        return $result;
    }

    public function getProfile(){
        $result = $this->r;
        $result = $this->usersModel->getProfileInformation();
        return $result;
    }

    public function getBlood(){
        $result = $this->r;
        $result = $this->usersModel->loadBlood();
        return $result;
    }

    public function getIssEstatus(){
        $result = $this->r;
        $result = $this->usersModel->loadIsssEstatus();
        return $result;
    }

    public function getCountry(){
        $result = $this->r;
        $result = $this->usersModel->loadCountry();
        return $result;
    }

    public function getCity($param){
        $result = $this->r;
        $result = $this->usersModel->loadCity($param);
        return $result;
    }

    public function getInformation($id){
        $idSesssion = $_SESSION['user_id'];
        $result = $this->r;
        $result = $this->usersModel->getProfileInformationToUpdate($id);
        return $result;
    }

    public function createNewProfile(){
        #session_start();
        $idSesssion = $_SESSION['user_id'];
        $result = $this->r;
        $result = $this->usersModel->newProfile($idSesssion);
        return $result;
    }

    public function updatePro($info){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($info);
        $user = new Perfil;
        return $this->usersModel->updateProfile($info);
    }

    public function getProfileByUid(){
        $result = $this->r;
        $result = $this->usersModel->searchProfileWithUid($_GET['uid']);
        return $result;
    }

    public function crateContact($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->createNewContact($info);
    }

    public function showContact($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->getProfileContact($info);
    }

    public function addDoctor($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->addContactDoctor($info);
    }

    public function getDoctor($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->getContactDoctor($info);
    }

    public function getMedication($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->getMed($info);
    }

    public function addMedication($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->addMed($info);
    }

    public function addNCondition($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->addConditionModel($info);
    }

    public function loadCondition($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->loadCondition($info);
    }

    public function deleteContact($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->deleteContactModel($info);
    }

    public function deleteContactDoctor($contact){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($contact);
        $user = new Perfil;
        return $this->usersModel->deleteContactDoctorModel($info);
    }

    public function reporteInformacionPerfil($data)
    {
        $result = $this->r;
        $data =  \Helpers\Validation::trimForm($data);

        $id = $data['id'];
        $uid = $this->usersModel->getProfileUID($data['id'])->uid;
        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']).'/'.$uid;

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteInformacionPerfil.jrxml';
            $input = __DIR__.'/../reports/reporteInformacionPerfil.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'id_perfil_medico' => $id,
                    'email' => $_SESSION['user_email']
                ],
                'db_connection' => [
                    'driver' => 'postgres',
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

            $file = $output.'/reporteInformacionPerfil.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['message'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

    public function reporteCondicionesMedicas($data)
    {
        $result = $this->r;
        $data =  \Helpers\Validation::trimForm($data);

        $id = $data['id'];
        $uid = $this->usersModel->getProfileUID($data['id'])->uid;
        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']).'/'.$uid;

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteCondicionesMedicas.jrxml';
            $input = __DIR__.'/../reports/reporteCondicionesMedicas.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'id' => $id,
                    'email' => $_SESSION['user_email']
                ],
                'db_connection' => [
                    'driver' => 'postgres',
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

            $file = $output.'/reporteCondicionesMedicas.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['message'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

    public function reporteContactosEmergencia($data)
    {
        $result = $this->r;
        $data =  \Helpers\Validation::trimForm($data);

        $id = $data['id'];
        $uid = $this->usersModel->getProfileUID($data['id'])->uid;
        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']).'/'.$uid;

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteContactosEmergencia.jrxml';
            $input = __DIR__.'/../reports/reporteContactosEmergencia.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'id' => $id,
                    'email' => $_SESSION['user_email']
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

            $file = $output.'/reporteContactosEmergencia.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

    public function reportePerfilesUsuario()
    {
        $result = $this->r;

        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']);

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reportePerfilesUsuario.jrxml';
            $input = __DIR__.'/../reports/reportePerfilesUsuario.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'idUsuario' => $_SESSION['user_id'],
                    'email' => $_SESSION['user_email']
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

            $file = $output.'/reportePerfilesUsuario.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

    public function reporteContactosDoctor($data)
    {
        $result = $this->r;
        $data =  \Helpers\Validation::trimForm($data);

        $id = $data['id'];
        $uid = $this->usersModel->getProfileUID($data['id'])->uid;
        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']).'/'.$uid;

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteContactosDoctor.jrxml';
            $input = __DIR__.'/../reports/reporteContactosDoctor.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'id_profile' => $id,
                    'email' => $_SESSION['user_email']
                ],
                'db_connection' => [
                    'driver' => 'postgres',
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

            $file = $output.'/reporteContactosDoctor.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['message'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

    public function reporteMedicamentos($data)
    {
        $result = $this->r;
        $data =  \Helpers\Validation::trimForm($data);

        $id = $data['id'];
        $uid = $this->usersModel->getProfileUID($data['id'])->uid;
        $output = __DIR__.'/../../public/reports/'.intval($_SESSION['user_id']).'/'.$uid;

        if ($this->pathExists($output)) {
            $jrxml = __DIR__.'/../reports/reporteMedicamentos.jrxml';
            $input = __DIR__.'/../reports/reporteMedicamentos.jasper';
            $options = [
                'format' => ['pdf'],
                'locale' => 'es',
                'params' => [
                    'id_perfil_medico' => $id,
                    'usuariocreador' => $_SESSION['user_email']
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

            $file = $output.'/reporteMedicamentos.pdf';

            if(file_exists($file)){
                $result['status'] = 1;
                $result['message'] = 'El pdf se ha generado correctamente';
                $result['file'] = $file;
            }
            else {
                $result['exception'] = 'No se pudo generar el reporte';
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'No se ha podido crear el directorio.';
        }
        return $result;
    }

}


?>
