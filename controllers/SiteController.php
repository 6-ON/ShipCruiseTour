<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Category;
use app\models\Cruise;
use app\models\Passage;
use app\models\Product;

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
        return $this->render('ship');
    }

    public function cruise(Request $request)
    {
        $cruises = Cruise::getAll(true);

        return $this->render('cruise',
            [
                'cruises' => $cruises
            ]
        );

    }

    public function port(Request $request)
    {
        return $this->render('port');

    }
}
