<?php

/**
 * Piso filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePisoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idUsuario'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'direccion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coordenadaX'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coordenadaY'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'metro'                 => new sfWidgetFormFilterInput(),
      'linea'                 => new sfWidgetFormFilterInput(),
      'pais'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contacto'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'caracteristicasPrecio' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dormitorios'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banios'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idUsuario'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'direccion'             => new sfValidatorPass(array('required' => false)),
      'coordenadaX'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'coordenadaY'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'metro'                 => new sfValidatorPass(array('required' => false)),
      'linea'                 => new sfValidatorPass(array('required' => false)),
      'pais'                  => new sfValidatorPass(array('required' => false)),
      'contacto'              => new sfValidatorPass(array('required' => false)),
      'caracteristicasPrecio' => new sfValidatorPass(array('required' => false)),
      'dormitorios'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'banios'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio'                => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('piso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Piso';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'idUsuario'             => 'ForeignKey',
      'direccion'             => 'Text',
      'coordenadaX'           => 'Number',
      'coordenadaY'           => 'Number',
      'metro'                 => 'Text',
      'linea'                 => 'Text',
      'pais'                  => 'Text',
      'contacto'              => 'Text',
      'caracteristicasPrecio' => 'Text',
      'dormitorios'           => 'Number',
      'banios'                => 'Number',
      'precio'                => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
