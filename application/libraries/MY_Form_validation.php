<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
  //protected $CI;
  private $last_error = null;

  public function __construct($rules = array())
  {
    parent::__construct($rules);
    // Your own constructor code
  }

  public function validar_formulario($data, $rules)
  {
    $this->set_data($data);
    $this->set_rules($rules);

    //mesajes de respuesta en espaniol
    $this->set_message('required', "El campo %s es obligatorio.");
    $this->set_message('isset', "El campo %s debe contener un valor.");
    $this->set_message('valid_email', "El campo %s debe contener una dirección de correo válida.");
    $this->set_message('valid_emails', "El campo %s debe contener todas las direcciones de correo válidas.");
    $this->set_message('valid_url', "El campo %s debe contener una URL válida.");
    $this->set_message('valid_ip', "El campo %s debe contener una dirección IP válida.");
    $this->set_message('min_length', "El campo %s debe contener al menos %s caracteres de longitud.");
    $this->set_message('max_length', "El campo %s no debe exceder los %s caracteres de longitud.");
    $this->set_message('exact_length', "El campo %s debe tener exactamente %s carácteres.");
    $this->set_message('alpha', "El campo %s sólo puede contener carácteres alfabéticos.");
    $this->set_message('alpha_numeric', "El campo %s sólo puede contener carácteres alfanuméricos.");
    $this->set_message('alpha_dash', "El campo %s sólo puede contener carácteres alfanuméricos, guiones bajos '_' o guiones '-'.");
    $this->set_message('numeric', "El campo %s sólo puede contener números.");
    $this->set_message('is_numeric', "El campo %s sólo puede contener carácteres numéricos.");
    $this->set_message('integer', "El campo %s debe contener un número entero.");
    $this->set_message('regex_match', "El campo %s no tiene el formato correcto.");
    $this->set_message('matches', "El campo %s no concuerda con el campo %s .");
    $this->set_message('is_natural', "El campo %s debe contener sólo números positivos.");
    $this->set_message('is_natural_no_zero', "El campo %s debe contener un número mayor que 0.");
    $this->set_message('decimal', "El campo %s debe contener un número decimal.");
    $this->set_message('less_than', "El campo %s debe contener un número menor que %s.");
    $this->set_message('greater_than', "El campo %s debe contener un número mayor que %s.");
    /* Added after 2.0.2 */
    $this->set_message('is_unique', "El campo %s debe contener un valor único.");

    if (!$this->run()) {
      //transforma la respuesta html a array
      $errors = array_map("strip_tags", array_filter(explode("\n", validation_errors())));
      $response = ['mensaje' => 'Error de validación verifique los datos', 'errors' => $errors];
      $this->last_error = $response;
      return false;
    }
    return true;
  }

  public function get_ultimo_error()
  {
    return $this->last_error;
  }
}
