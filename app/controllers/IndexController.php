<?php
class IndexController extends Phalcon\Mvc\Controller
{

    public function indexAction()
    {
	$response = new Phalcon\Http\Response();
	$response->redirect('customers/?count=20');
	$response->send();
    }
}
