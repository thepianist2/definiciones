<?php

/**
 * ImagenPiso form base class.
 *
 * @method ImagenPiso getObject() Returns the current form's model object
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseImagenPisoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'idPiso'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'), 'add_empty' => false)),
      'descripcion' => new sfWidgetFormInputText(),
      'imagen'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idPiso'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'))),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'imagen'      => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('imagen_piso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ImagenPiso';
  }

}
