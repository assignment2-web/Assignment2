<?php


class HomeController extends Controller {
    function __construct(){
        parent::__construct();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
		}
        $this->loadModel('home');
        $this->index();
       
    }
    
    function index(){
        $data = $this->model->getAllExamLatest();
        $most = $this->model->getAllExamMostView();
        $this->view->data = $data;
        $this->view->most = $most;
        $this->view->render('index');
    }
    function login(){
        $this->view->render('user/login');
    }
    function logout(){
        Session::destroy();
        $this->view->redirect('home');
    }
}