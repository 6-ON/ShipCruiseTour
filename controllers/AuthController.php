<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Cruise;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {

//        $this->registerMiddleware(new AdminMiddleware(['dashboard', 'createProduct', 'editProduct']));
//        $this->registerMiddleware(new AuthMiddleware([''], ['login', 'register']));
    }

    public function logout(Request $request, Response $response)
    {
        if ($request->isGet()) {
            Application::$app->logout();
            $response->redirect('/');
        }
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        $this->setLayout('empty');
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $this->setLayout('empty');
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Registration Done');
                Application::$app->response->redirect('/');
            }
            return $this->render('signup', [
                'model' => $user
            ]);
        }
        return $this->render('signup', [
            'model' => $user
        ]);
    }


    private function uploadImage()
    {

        if (!move_uploaded_file($_FILES['image']['tmp_name'], Application::$ROOT_DIR . '/public/uploads/' . $_FILES['image']['name'])) {
            exit;
        }
        return true;
    }

    /**
     * @throws \Exception
     */
    public function createCruise(Request $request, Response $response)
    {

        $cruise = new Cruise();
        $data = $request->getBody();
        $data['nights'] = date_diff(new \DateTime($data['endDate']) ,new \DateTime($data['startDate']))->d;

        $cruise->loadData($data);
        $cruise->validate();
        echo "<pre>";
        var_dump($cruise);
        echo "</pre>";
        exit();
    }
}
