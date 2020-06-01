<?php

/*
 * This file is part of the devtia package
 *
 * Copyright (c) 2016-2020 Daniel González
 * All right reserved
 *
 * @author Daniel González <daniel@devtia.com>
 */

namespace VIUBundle\Service\Menu;

use AppBundle\Entity\Role;
use Desarrolla2\MenuBundle\Menu\MenuInterface;

class MainMenu implements MenuInterface
{
    public function getMenu()
    {
        return [
            'class' => 'sidebar-menu',
            'items' => [
                [
                    'name' => 'Dashboard',
                    'icon' => 'fa fa-dashboard',
                    'route' => '_viu.default.index',
                ],
                [
                    'name' => 'Calendar',
                    'icon' => 'fa fa-calendar',
                    'route' => '_viu.calendar.index',
                ],
                [
                    'name' => 'Courses',
                    'icon' => 'fa fa-graduation-cap',
                    'route' => '_viu.course.index',
                ],
                [
                    'name' => 'Students',
                    'icon' => 'fa fa-users',
                    'route' => '_viu.student.index',
                ],
                [
                    'name' => 'Messages',
                    'icon' => 'fa fa-comments-o',
                    'route' => '_viu.message.index',
                    'active' => ['_viu.message[\w\_\.]+',],
                ],
                [
                    'name' => 'Documentation',
                    'icon' => 'fa fa-book',
                    'route' => '_viu.default.index',
                ],
            ],
        ];
    }
}
