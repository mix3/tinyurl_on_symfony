<?php

/**
 * admin actions.
 *
 * @package    myproject
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tiny_url_list = Doctrine::getTable('TinyUrl')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tiny_url = Doctrine::getTable('TinyUrl')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->tiny_url);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TinyUrlForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TinyUrlForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tiny_url = Doctrine::getTable('TinyUrl')->find(array($request->getParameter('id'))), sprintf('Object tiny_url does not exist (%s).', array($request->getParameter('id'))));
    $this->form = new TinyUrlForm($tiny_url);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($tiny_url = Doctrine::getTable('TinyUrl')->find(array($request->getParameter('id'))), sprintf('Object tiny_url does not exist (%s).', array($request->getParameter('id'))));
    $this->form = new TinyUrlForm($tiny_url);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tiny_url = Doctrine::getTable('TinyUrl')->find(array($request->getParameter('id'))), sprintf('Object tiny_url does not exist (%s).', array($request->getParameter('id'))));
    $tiny_url->delete();

    $this->redirect('admin/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $tiny_url = $form->save();

      $this->redirect('admin/edit?id='.$tiny_url->getId());
    }
  }
}
