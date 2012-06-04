<?php

/**
 * documento actions.
 *
 * @package    definiciones
 * @subpackage documento
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class documentoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
    $this->documentos = Doctrine_Core::getTable('Documento')
      ->createQuery('a')
      ->Where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
      ->execute();
            }else{
                $this->documentos=null;
            }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->documento);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DocumentoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DocumentoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentoForm($documento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentoForm($documento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $documento->delete();
    $this->getUser()->setFlash('mensajeTerminado','Documento eliminado.');

    $this->redirect('documento/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $errorTitulo=false;
   $valores = $request->getParameter($form->getName());
   $titulo = $valores['titulo'];
   $idUsuario = $valores['idUsuario'];
   $errorTitulo=false;
   
   
            if($form->getObject()->isNew() or $form->getObject()->titulo != $valores['titulo'] or $form->getObject()->idUsuario != $valores['idUsuario'] )
        {
            if(Doctrine_Core::getTable('Documento')->verificarExiste($idUsuario,$titulo))
            {
                 $errorTitulo=true;}
                
        }
    
    
    
    if ($form->isValid())
    {
      $documento = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Documento guardado.');

      $this->redirect('documento/index');
    }else
    {
       if($errorTitulo){
            $this->getUser()->setFlash('mensajeError','Este título ya existe');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
  
  
  
  /**
	 * Executes exportar a PDF action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeExportarPdf(sfWebRequest $request)
	{
            
            $documento = $this->getRoute()->getObject();

		$config = sfTCPDFPluginConfigHandler::loadConfig();

                
                                //obtenemos los datos del currículum
                $contenido=html_entity_decode(ucfirst(strtolower($documento->getTexto())), ENT_COMPAT , 'UTF-8');

		// pdf object
		$pdf = new sfTCPDF();
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Seria');
                $pdf->SetSubject('Documento');

		
		$titulo_cabecera = ucfirst($documento->getTitulo());



		// settings
		$pdf->SetFont("FreeSerif", "", 12);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,$titulo_cabecera,"Fuente: Seria Allel");
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// init pdf doc
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$letra_normal = array('FreeSerif','',11);
		$letra_negrita = array('FreeSerif','B',11);
		$letra_titulo = array('FreeSerif','UB',11);

		$pdf->SetFont($letra_normal[0], $letra_normal[1], $letra_normal[2]);

		$sin_bordes = 0;
		$borde_inferior = 'B';
		$ancho_linea = 180;
		$alto_linea = 5;

		// Empezamos a escribir
		$pdf->Ln($alto_linea);
		$pdf->writeHTML($contenido);



		$pdf->Ln($alto_linea);
		
	// output
		$pdf->Output('documento.pdf');

		// Stop symfony process
		throw new sfStopException();
	}
    
}
