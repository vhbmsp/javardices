<?php
class CustomersController extends Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    $request = new \Phalcon\Http\Request();
    $count = $request->get('count');

	$customer = new Customers();
	$customer->start($count);
	$customers = $customer->find_all();

	$this->view->setVar('customers', $customers);
    }
}
