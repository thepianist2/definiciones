<?php

/**
 * RegistroPalabra form base class.
 *
 * @method RegistroPalabra getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegistroPalabraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idPalabra'      => new sfWidgetFormInputHidden(),
      'textoAnterior'  => new sfWidgetFormInputText(),
      'textoPosterior' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idPalabra'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idPalabra')), 'empty_value' => $this->getObject()->get('idPalabra'), 'required' => false)),
      'textoAnterior'  => new sfValidatorPass(),
      'textoPosterior' => new sfValidatorPass(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('registro_palabra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RegistroPalabra';
  }

}
