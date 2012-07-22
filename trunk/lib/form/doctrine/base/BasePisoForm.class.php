<?php

/**
 * Piso form base class.
 *
 * @method Piso getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePisoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'idUsuario'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'direccion'             => new sfWidgetFormInputText(),
      'coordenadaX'           => new sfWidgetFormInputText(),
      'coordenadaY'           => new sfWidgetFormInputText(),
      'metro'                 => new sfWidgetFormInputText(),
      'linea'                 => new sfWidgetFormInputText(),
      'pais'                  => new sfWidgetFormInputText(),
      'contacto'              => new sfWidgetFormInputText(),
      'caracteristicasPrecio' => new sfWidgetFormInputText(),
      'dormitorios'           => new sfWidgetFormInputText(),
      'banios'                => new sfWidgetFormInputText(),
      'precio'                => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idUsuario'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'direccion'             => new sfValidatorPass(),
      'coordenadaX'           => new sfValidatorNumber(),
      'coordenadaY'           => new sfValidatorNumber(),
      'metro'                 => new sfValidatorPass(array('required' => false)),
      'linea'                 => new sfValidatorPass(array('required' => false)),
      'pais'                  => new sfValidatorString(array('max_length' => 100)),
      'contacto'              => new sfValidatorPass(),
      'caracteristicasPrecio' => new sfValidatorPass(),
      'dormitorios'           => new sfValidatorInteger(array('required' => false)),
      'banios'                => new sfValidatorInteger(array('required' => false)),
      'precio'                => new sfValidatorString(array('max_length' => 100)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('piso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Piso';
  }

}
