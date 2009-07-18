<?php

class tinyurlActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new TinyUrlForm();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new TinyUrlForm();

    $url = $this->processForm($request, $this->form);
    $this->setTemplate('create');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new TinyUrlForm();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $url = ereg_replace($request->getPathInfo(), '', $request->getUri());
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $get_url = $form->getValue('url');
      if(!ereg("^http:\/\/.*$", $get_url)){
        $form->setValue('url', 'http://'.$get_url);
      }
      $tiny_url = Doctrine::getTable('TinyUrl')->findOneByUrl($form->getValue('url'));
      if(!$tiny_url){
        $tiny_url = $form->save();
      }
      $this->getUser()->setFlash('url', $url.'/'.$tiny_url->getHash());
      $this->redirect('tinyurl/create');
    }
  }

  public function executeRedirect(sfWebRequest $request)
  {
    $path = substr($request->getPathInfo(), 1);
    $tiny_url = Doctrine::getTable('TinyUrl')->findOneByHash($path);
    if(!$tiny_url){
      return sfView::ERROR;
    }
    $this->redirect($tiny_url->getUrl());
  }
}
