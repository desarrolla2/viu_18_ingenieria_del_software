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

class MessageController extends Controller
{
    /**
     * @Route("/message", name="_viu.message.index")
     * @Template()
     */
    public function indexAction()
    {
        $faker = $this->get('faker');
        $items = [];
        for ($i = 1; $i <= 20; $i++) {
            $items[] = ['name' => $faker->firstName, 'lastName' => $faker->lastName, 'text' => $faker->realText, 'title'=> $faker->catchPhrase];
        }

        return ['items' => $items];
    }

    /**
     * @Route("/message/new", name="_viu.message.new")
     * @Template()
     */
    public function newAction()
    {
    }

    /**
     * @Route("/message/view", name="_viu.message.view")
     * @Template()
     */
    public function viewAction()
    {
    }
}
