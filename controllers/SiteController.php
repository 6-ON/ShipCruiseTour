<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\NotFoundException;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\Cruise;
use app\models\Passage;
use app\models\Port;
use app\models\Product;
use app\models\Reservation;
use app\models\Room;
use app\models\Ship;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function about()
    {
        return $this->render('about-us');
    }

    public function ship(Request $request)
    {
        $ships = Ship::getAll();

        return $this->render('ship',
            [
                'ships' => $ships
            ]
        );
    }


    public function cruise(Request $request)
    {
        $filters = [];
        $idShip = $request->getBody()['ship'] ?? false;
        $idPort = $request->getBody()['port'] ?? false;
        $month = $request->getBody()['month'] ?? false;
        $page = $request->getBody()['page'] ?? false;
        $pagination = [];
        if ($page) {
            $pagination = [
                $page - 1,
                5
            ];
        }
        if ($month)
            $filters['startDate'] = [
                ['>', "$month-01"]
                , ['<', "$month-31"]
            ];
        else
            date('Y-m-d', time());


        if ($idShip)
            $filters['shipId'] = $idShip;
        if ($idPort)
            $filters['startPort'] = $idPort;

        $cruises = Cruise::getAll(true, $filters,$pagination);

        $ships = Ship::getAll();
        $ports = Port::getAll();

        return $this->render('cruise',
            [
                'cruises' => $cruises,
                'ships' => $ships,
                'ports' => $ports
            ]
        );

    }

    public function port(Request $request)
    {
        return $this->render('port', ['ports' => Port::getAll()]);
    }

    /**
     * @throws NotFoundException
     */
    public function room(Request $request)
    {
        $idCruise = $request->getBody()['cruise'] ?? throw new NotFoundException;
        $rooms = Room::getAll(true, ['cruiseId' => $idCruise]);


        return $this->render('room', ['rooms' => $rooms, 'idCruise' => $idCruise]);
    }

    public function reservation(Request $request, Response $response)
    {

        $uid = Application::$app->session->get('user');

        if ($uid === false) {
            $response->redirect('/login');
            return null;
        }
        $reservations = Reservation::getAll(true, ['userId' => $uid]);
        return $this->render('reservation', ['reservations' => $reservations]);
    }

    public function getCruise(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? false;
        if (!$id || is_int($id)) {
            throw new NotFoundException();
        }
        $cruise = Cruise::findOne(['id' => $id]) ?? throw new NotFoundException();
        $response->setContentType(Response::TYPE_JSON);
        return json_encode($cruise);
    }


}
