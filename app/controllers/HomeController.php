<?php
namespace App\controllers;

use App\QueryBulider;
use Aura\SqlQuery\Exception;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;
use \Delight\Auth\Auth;
use PDO;

class HomeController {
    public $QueryBulider;
    private $templates;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=rabota', 'root', 'root');
        $this->templates = new Engine('../app/views');
        $this->QueryBulider = new QueryBulider();
        $this->auth = new Auth($this->pdo);
    }

    public function index($vars){

//         $this->login_check();

//        $this->auth->logout();

//        if ($this->auth->isLoggedIn()) {
//            echo 'User is signed in';
//        }
//        else {
//            echo 'User is not signed in yet';
//        }

        $results = $this->QueryBulider->getAll('tasks');
        $count = count($results);

        $items = $this->QueryBulider->selectAll($_GET['page'],'tasks');
//        d($items);

        echo $this->templates->render('homepage', ['results'=> $results, 'count' => $count, 'items'=>$items]);
    }

    public function about($vars){
        echo $this->templates->render('about', ['name'=>'Tolebi']);
    }
    public function add_page($vars){
        echo $this->templates->render('add_page');
    }

    public function add_task($vars){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $task = $_POST['task'];

        $results = $this->QueryBulider->insert(['username'=>$username, 'email'=>$email,'task'=>$task], 'tasks');

        header('Location: /home');
    }

    public function admin_login()
    {
        echo $this->templates->render('login');
    }
    function admin_logout(){
        $this->auth->logout();

        header('Location: /home');
    }

    function login_check(){
        $email = $_POST['email'];
        $password = $_POST['password'];

         $results = $this->QueryBulider->getAll('tasks');
         $count = count($results);

         $items = $this->QueryBulider->selectAll($_GET['page'],'tasks');

         try {
             $this->auth->login($email, $password);

//             echo 'User is logged in';

             echo $this->templates->render('admin_dashboard', ['results'=> $results, 'count' => $count, 'items'=>$items]);
         }
         catch (\Delight\Auth\InvalidEmailException $e) {
             die('Wrong email address');
         }
         catch (\Delight\Auth\InvalidPasswordException $e) {
             die('Wrong password');
         }
         catch (\Delight\Auth\EmailNotVerifiedException $e) {
             die('Email not verified');
         }
         catch (\Delight\Auth\TooManyRequestsException $e) {
             die('Too many requests');
         }

    }

    function edit($vars){
        $id = $vars['id'];
        $results = $this->QueryBulider->getOne('tasks',$id);

        echo $this->templates->render('edit', ['results'=> $results]);
//        $results = $this->QueryBulider->update(['task'=>'Арман'], $id ,'tasks');
    }

    function edit_task($vars){
        $id = $_POST['id'];
        $task = $_POST['task'];

        $results = $this->QueryBulider->update(['task'=>$task], $id ,'tasks');

        $results = $this->QueryBulider->getAll('tasks');

        echo $this->templates->render('admin_dashboard', ['results'=> $results]);
    }
}


//$results = $QueryBulider->getAll('task_9');

//$results = $QueryBulider->insert(['text'=>'Толеби'], 'task_9');

//$results = $QueryBulider->update(['text'=>'Арман'], 2,'task_9');

//$results = $QueryBulider->delete(2,'task_9');