<?php

/**
 * Palabra form base class.
 *
 * @method Palabra getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePalabraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'idUsuario'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'idCategoria'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'textoPalabra'    => new sfWidgetFormInputText(),
      'textoDefinicion' => new sfWidgetFormInputText(),
      'borrado'         => new sfWidgetFormInputCheckbox(),
      'activo'          => new sfWidgetFormInputCheckbox(),
      'imagen'          => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idUsuario'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'idCategoria'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'))),
      'textoPalabra'    => new sfValidatorPass(),
      'textoDefinicion' => new sfValidatorPass(),
      'borrado'         => new sfValidatorBoolean(array('required' => false)),
      'activo'          => new sfValidatorBoolean(array('required' => false)),
      'imagen'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('palabra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Palabra';
  }

}
