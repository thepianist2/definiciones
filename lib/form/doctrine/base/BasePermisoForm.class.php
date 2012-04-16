<?php

/**
 * Permiso form base class.
 *
 * @method Permiso getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePermisoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idPerfil'        => new sfWidgetFormInputHidden(),
      'idFuncionalidad' => new sfWidgetFormInputHidden(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idPerfil'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idPerfil')), 'empty_value' => $this->getObject()->get('idPerfil'), 'required' => false)),
      'idFuncionalidad' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idFuncionalidad')), 'empty_value' => $this->getObject()->get('idFuncionalidad'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permiso';
  }

}
