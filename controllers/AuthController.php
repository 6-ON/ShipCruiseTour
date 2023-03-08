<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\ForbiddenException;
use app\core\exception\NotFoundException;
use app\core\middlewares\AuthMiddleware;
use app\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Cruise;
use app\models\LoginForm;
use app\models\Passage;
use app\models\Port;
use app\models\Reservation;
use app\models\Ship;
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

        if (!move_uploaded_file($_FILES['image']['tmp_name'], Application::$ROOT_DIR . '/public/assets/image/' . $_FILES['image']['name'])) {
            echo 'error uploading image';
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
        $data = array_merge($request->getBody(), $request->getNamesOfFiles());
        $nights = date_diff(new \DateTime($data['endDate']), new \DateTime($data['startDate']))->d;
        if ($nights)
            $data['nights'] = $nights;
        else
            $data['nights'] = 1;

        $data['startDate'] = date('Y-m-d', strtotime($data['startDate']));
        $cruise->loadData($data);

        try {
            $this->uploadImage();
            Application::$app->db->exec('SET FOREIGN_KEY_CHECKS=0;');
            Application::$app->db->pdo->beginTransaction();
            if ($cruise->validate() && $cruise->save()) {

                $idCruise = Application::$app->db->pdo->lastInsertId();

                foreach ($data['visiting'] as $idPort) {
                    $passage = new Passage();
                    $passage->loadData(
                        [
                            'portId' => $idPort,
                            'cruiseId' => $idCruise
                        ]
                    );
                    $passage->save();

                }

                Application::$app->db->pdo->commit();
            } else {
                Application::$app->session->setFlash('errors', $cruise->errors);
            }
            $response->redirect('/cruise');
        } catch (\PDOException $e) {
            Application::$app->db->pdo->rollBack();
            throw $e;
            exit;
        }


    }


    public function createShip(Request $request, Response $response)
    {
        $ship = new Ship();
        $data = array_merge($request->getBody(), $request->getNamesOfFiles());

        $ship->loadData($data);

        if ($ship->validate()) {
            $this->uploadImage();
            if ($ship->save()) {
                $response->redirect('/ship');
            }
        }

    }


    public function createPort(Request $request, Response $response)
    {
        $port = new Port();
        $data = array_merge($request->getBody(), $request->getNamesOfFiles());
        $port->loadData($data);
        if ($port->validate()) {
            $this->uploadImage();
            if ($port->save()) {
                $response->redirect('/port');
            }
        }

    }


    /**
     * @throws ForbiddenException
     */
    public function deleteCruise(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? throw new ForbiddenException();
        if (Cruise::delete(['id' => $id])) {
            $response->redirect('/cruise');
        }
    }

    public function deletePort(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? throw new ForbiddenException();
        if (Port::delete(['id' => $id])) {
            $response->redirect('/port');
        }
    }

    public function deleteShip(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? throw new ForbiddenException();
        if (Ship::delete(['id' => $id])) {
            $response->redirect('/ship');
        }
    }


    public function reserveRoom(Request $request, Response $response)
    {
        $idRoom = $request->getBody()['roomId'] ?? false;
        $idCruise = $request->getBody()['cruiseId'] ?? false;
        $uid = Application::$app->session->get('user');

        if ($uid && $idRoom && $idCruise) {
            $reservation = new Reservation();
            $data = $request->getBody();
            $data['userId'] = $uid;
            $reservation->loadData($data);
            if ($reservation->validate() && $reservation->save()) {
                $response->redirect('/reservation');
            }

        } else {
            throw new ForbiddenException();
        }
    }

    public function reserveCancel(Request $request, Response $response)
    {
        $uid = Application::$app->session->get('user');
        $resId = $request->getBody()['id'] ?? false;

        if ($uid && $resId) {
            $conditions = [
                'userId' => $uid,
                'reservationId' => $resId
            ];
            $reservation = Reservation::findOne($conditions, true);
            $current_date = date('Y-m-d', time());
            if ($reservation) {
                if (date_diff(new \DateTime($current_date), new \DateTime($reservation->startDate))->d > 2) {
                    Reservation::delete($conditions);
                    Application::$app->session->setFlash('success-r', 'Reservation cancelled');
                } else {
                    $response->redirect('/reservation');
                    Application::$app->session->setFlash('error-r', 'You can\'t cancel this reservation');
                }

            }
            $response->redirect('/reservation');
        } else {
            throw new ForbiddenException();
        }
    }

}
