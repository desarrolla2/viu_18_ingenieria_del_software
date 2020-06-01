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

class StudentController extends Controller
{
    /**
     * @Route("/student", name="_viu.student.index")
     * @Template()
     */
    public function indexAction()
    {
        $faker = $this->get('faker');
        $items = [];
        for ($i = 1; $i <= 20; $i++) {
            $items[] = ['name' => $faker->firstName, 'lastName' => $faker->lastName];
        }
        
        return ['items' => $items];
    }
}
