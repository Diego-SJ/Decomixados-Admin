<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Login_model");
		if($this->session->userdata('USERA_ID') != '' && $this->session->userdata('USERA_AT') == '0') {  
            redirect(base_url().'admin');  
        } 
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function forgot_password()
	{
		$this->load->view('forgot/forgot_password');
	}

	public function resetPassword($token){
		if(isset($token)){
			if($this->Login_model->verifyToken($token)){
				$dataToken = array('tokenD' => $token, );
				$this->load->view('forgot/change_password',$dataToken);
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}

	public function start(){

		$user_email = trim($this->input->post("log_user"));
		$password_log = trim($this->input->post("log_password"));

		if($this->Login_model->getLogin($user_email)){
			$row = $this->Login_model->getLogin($user_email);

			$id        = $row['iduser'];
			$name      = $row['name'];
			$user      = $row['user'];
			$password  = $row['password'];
			$status    = $row['status'];
			$acces_type = $row['access_type'];

			if (password_verify(
					base64_encode(
						hash('sha256', $password_log, true)
					),
					$password
			)){
				//SESSIONS STRAT
				$session_data = array(
					'USERA_ID'      => $id,
					'USERA_NAME'    => $name,
					'USERA_USER'    => $user,
					'USERA_PASS'    => $password,
					'USERA_STATUS'  => $status,
					'USERA_AT' => $acces_type,
				);
				$this->session->set_userdata($session_data);
				if($this->session->userdata('USERA_ID') != null){
					echo "ok";				
				} else {
					echo "Algo salió mal, intenta más tarde.";
				}
			} else {
				echo "Contraseña incorrecta.";
			}
		} else {
			echo "Correo o nombre de usuario incorrectos.";
		}

	}

	public function logout(){  
		//SESSIONS DESTROY
		$session_data = array(
			'USERA_ID',
			'USERA_NAME',
			'USERA_NAME_C',
			'USERA_USER',
			'USERA_PASS',
			'USERA_PHONE',
			'USERA_STATUS',
			'USERA_AT',
		);
		$this->session->unset_userdata($session_data); 
	    redirect(base_url()); 
	}

	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1){
			return true;
		} else {
			return false;
		}		
	}

	public function resetLink(){

		$email   = trim($this->input->post("email_reset"));

		if(!$this->Login_model->emailExist($email)){
         	$error = 'El correo '.$email.', no esta registrado en la plataforma';
			echo $error;
        } else if ($this->Login_model->emailExist($email)){
        	$token_pass = md5(uniqid());
			$token_updt = array('token_password' => $token_pass, );

        	if($this->Login_model->updateUserTokenPass($email,$token_updt)){
        		if($this->enviarEmail(trim($this->input->post("email_reset")),$token_pass)){
        			$exito = 'Envío exitoso, revisa tu cuenta de '.$email.' para continuar con la recuperación de tu contraseña.';
        			echo $exito;
	        	} else {
	        		$error = 'No hemos podido enviar el correo a '.$email.', intenta m&aacute;s tarde.';
        			echo $error;
	        	}
        	} else {
        		$error = 'Ocurrio un error en el sistema, intenta más tarde.';
    			echo $error;
        	}
        } 
	}

	public function updatePassword($token){
		$token_user     = $token;
		if(strlen(trim($token_user)) > 0){
			$new_password_r = password_hash(base64_encode(hash('sha256', 
						$this->input->post("new_password_repeat"), true)),PASSWORD_DEFAULT);

			$data = array('password' => $new_password_r, );

			if($this->Login_model->forgetPassword($token_user,$data)){
				$deleteToeknPass = array('token_password' => '', );
				if($this->Login_model->deleteUserTokenPass($token_user,$deleteToeknPass)){
					$exito = '¡Contraseña actualizada! Inicia sesión para entrar a la plataforma.';
        			echo $exito;
				} else {
					$error = 'Ocurrio un error, intenta más tarde.';
					echo $error;
				}
			} else {
				$error = 'Ocurrio un error, intenta más tarde.';
    			echo $error;
			}
		} else {
			$error = 'Ocurrio un error, intenta más tarde.';
			echo $error;
		}
	}

	public function enviarEmail($email, $token_pass){
		
		// Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $nameapp = $this->config->item('app_name');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        try {
   			$mail->isSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls'; //Modificar
			$mail->Host = 'smtp.gmail.com'; //Modificar
			$mail->Port = 587; //Modificar

            $mail->Username = 'appweblecturas@gmail.com'; //Modificar
			$mail->Password = '2tamalitosxd'; //Modificar
			
			$mail->setFrom('correo emisor','nombre'); //Modificar
			$mail->addAddress($email,'Casa Geek');

            $mail->isHTML(true);

            $asunto = 'Restablecer contraseña';
			$mail->Subject = utf8_decode($asunto);

			$message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
						<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns=\"http://www.w3.org/1999/xhtml\">
						  <head>
						    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
						    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
						    <title>Restablecer la contraseña</title>
						    
						    
						  </head>
						  <body style=\"-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;\" bgcolor=\"#F2F4F6\"><style type=\"text/css\">
						body {
						width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;
						}
						@media only screen and (max-width: 600px) {
						  .email-body_inner {
						    width: 100% !important;
						  }
						  .email-footer {
						    width: 100% !important;
						  }
						}
						@media only screen and (max-width: 500px) {
						  .button {
						    width: 100% !important;
						  }
						}
						</style>
						    <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\" bgcolor=\"#F2F4F6\">
						      <tr>
						        <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						          <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\">
						            <tr>
						              <td class=\"email-masthead\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;\" align=\"center\">
						                <a href=\"\" class=\"email-masthead_name\" style=\"box-sizing: border-box; color: #bbbfc3; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;\">
						        ".$nameapp."
						      </a>
						              </td>
						            </tr>
						            
						            <tr>
						              <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;\" bgcolor=\"#FFFFFF\">
						                <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;\" bgcolor=\"#FFFFFF\">
						                  
						                  <tr>
						                    <td class=\"content-cell\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">
						                      <h1 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;\" align=\"left\">Hola</h1>
						                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Recientemente solicitó restablecer su contraseña para su cuenta. Use el botón de abajo para continuar.</p>
						                      
						                      <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;\">
						                        <tr>
						                          <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                            
						                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;\">
						                              <tr>
						                                <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                                  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;\">
						                                    <tr>
						                                      <td style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                                        <a href='".base_url()."login/resetPassword/".$token_pass."' class=\"button button--green\" target=\"_blank\" style=\"-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; text-decoration: none;\">Restablecer contraseña</a>
						                                      </td>
						                                    </tr>
						                                  </table>
						                                </td>
						                              </tr>
						                            </table>
						                          </td>
						                        </tr>
						                      </table>
						                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Gracias
						                        <br />".$nameapp."</p>
						                    </td>
						                  </tr>
						                </table>
						              </td>
						            </tr>
						            <tr>
						              <td style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                <table class=\"email-footer\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;\">
						                  <tr>
						                    <td class=\"content-cell\" align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">
						                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">© ".$nameapp.". Todos los derechos reservados.</p>
						                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">
						                        <br />ITSOEH - Mixquiahuala de Juarez
						                        <br />
						                      </p>
						                    </td>
						                  </tr>
						                </table>
						              </td>
						            </tr>
						          </table>
						        </td>
						      </tr>
						    </table>
						  </body>
						</html>";

			$mail->Body    = $message;

            if ($mail->send()) {
                return true;
            } else {
                return false;
                
            }
        } catch (Exception $e) {
            return false;
        }
	}
}
