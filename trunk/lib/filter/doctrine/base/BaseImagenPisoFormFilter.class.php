<?php

/**
 * ImagenPiso filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseImagenPisoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idPiso'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'), 'add_empty' => true)),
      'descripcion' => new sfWidgetFormFilterInput(),
      'imagen'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idPiso'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Piso'), 'column' => 'id')),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'imagen'      => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('imagen_piso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ImagenPiso';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'idPiso'      => 'ForeignKey',
      'descripcion' => 'Text',
      'imagen'      => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
