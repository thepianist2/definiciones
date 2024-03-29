<?php

/**
 * RegistroPalabra filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRegistroPalabraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'textoPalabraAnterior'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'textoPalabraPosterior'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'textoDefinicionAnterior'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'textoDefinicionPosterior' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'textoPalabraAnterior'     => new sfValidatorPass(array('required' => false)),
      'textoPalabraPosterior'    => new sfValidatorPass(array('required' => false)),
      'textoDefinicionAnterior'  => new sfValidatorPass(array('required' => false)),
      'textoDefinicionPosterior' => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('registro_palabra_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RegistroPalabra';
  }

  public function getFields()
  {
    return array(
      'idPalabra'                => 'Number',
      'textoPalabraAnterior'     => 'Text',
      'textoPalabraPosterior'    => 'Text',
      'textoDefinicionAnterior'  => 'Text',
      'textoDefinicionPosterior' => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
