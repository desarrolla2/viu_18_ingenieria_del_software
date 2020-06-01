<?php

/*
 * This file is part of the devtia package
 *
 * Copyright (c) 2016-2020 Daniel González
 * All right reserved
 *
 * @author Daniel González <daniel@devtia.com>
 */

namespace VIUBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller
{
    /**
     * @Route("/calendar", name="_viu.calendar.index")
     * @Template()
     */
    public function indexAction()
    {
    }
}
