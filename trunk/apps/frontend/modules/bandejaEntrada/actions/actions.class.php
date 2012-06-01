<?php

/**
 * bandejaEntrada actions.
 *
 * @package    definiciones
 * @subpackage bandejaEntrada
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bandejaEntradaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
    $this->bandeja_entradas = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId())      
      ->execute();
              }else{
                $this->bandeja_entradas=null;
         }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->bandeja_entrada = Doctrine_Core::getTable('BandejaEntrada')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->bandeja_entrada);
  }

  

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($bandeja_entrada = Doctrine_Core::getTable('BandejaEntrada')->find(array($request->getParameter('id'))), sprintf('Object bandeja_entrada does not exist (%s).', $request->getParameter('id')));
    $bandeja_entrada->delete();

    $this->redirect('bandejaEntrada/index');
  }

}
