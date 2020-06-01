<?php

/*
 * This file is part of the devtia package
 *
 * Copyright (c) 2016-2020 Daniel González
 * All right reserved
 *
 * @author Daniel González <daniel@devtia.com>
 */

namespace VIUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="fos_user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    use TimestampableEntity;
    use BlameableEntity;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $state = '';

    /**
     * @ORM\Column(type="string")
     */
    private $position = '';

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $hash = '';

    public function __construct()
    {
        $this->hash = hash('sha256', uniqid(get_called_class(), true));

        parent::__construct();
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getFullName()
    {
        return $this->getProfile()->getFullName();
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setHash($hash)
    {
        $this->hash = (string) $hash;
    }
}
