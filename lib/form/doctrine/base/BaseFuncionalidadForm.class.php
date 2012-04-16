<?php

/**
 * Funcionalidad form base class.
 *
 * @method Funcionalidad getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFuncionalidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'idModulo'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'), 'add_empty' => false)),
      'credencial'  => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'aplicacion'  => new sfWidgetFormChoice(array('choices' => array('administracion' => 'administracion', 'frontend' => 'frontend'))),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idModulo'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'))),
      'credencial'  => new sfValidatorString(array('max_length' => 50)),
      'descripcion' => new sfValidatorPass(),
      'aplicacion'  => new sfValidatorChoice(array('choices' => array(0 => 'administracion', 1 => 'frontend'))),
    ));

    $this->widgetSchema->setNameFormat('funcionalidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Funcionalidad';
  }

}
