<?php

/**
 * Usuario filter form base class.
 *
 * @package    definiciones
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idperfil'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'add_empty' => true)),
      'login'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos'  => new sfWidgetFormFilterInput(),
      'facebook'   => new sfWidgetFormFilterInput(),
      'twitter'    => new sfWidgetFormFilterInput(),
      'activo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'validado'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'borrado'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lang'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idperfil'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Perfil'), 'column' => 'id')),
      'login'      => new sfValidatorPass(array('required' => false)),
      'password'   => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'apellidos'  => new sfValidatorPass(array('required' => false)),
      'facebook'   => new sfValidatorPass(array('required' => false)),
      'twitter'    => new sfValidatorPass(array('required' => false)),
      'activo'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'validado'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'borrado'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lang'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'idperfil'   => 'ForeignKey',
      'login'      => 'Text',
      'password'   => 'Text',
      'email'      => 'Text',
      'nombre'     => 'Text',
      'apellidos'  => 'Text',
      'facebook'   => 'Text',
      'twitter'    => 'Text',
      'activo'     => 'Number',
      'validado'   => 'Number',
      'borrado'    => 'Number',
      'lang'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
