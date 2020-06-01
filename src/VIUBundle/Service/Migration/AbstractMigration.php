<?php

/*
 * This file is part of the devtia package
 *
 * Copyright (c) 2016-2020 Daniel González
 * All right reserved
 *
 * @author Daniel González <daniel@devtia.com>
 */

namespace VIUBundle\Service\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration as BaseMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractMigration extends BaseMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /** @var ContainerInterface */
    protected $container;

    /** @var EntityManager */
    protected $em;

    /** @var array */
    protected $random = [];

    public function down(Schema $schema)
    {
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getManager();
    }

    protected function getOutput()
    {
        return new ConsoleOutput();
    }


    protected function getParagraphs($number = 1)
    {
        $faker = $this->container->get('faker');
        $html = '';
        for ($i = 1; $i <= $number; ++$i) {
            $html .= '<p>'.$faker->paragraph().'</p>';
        }

        return $html;
    }

    protected function getRandomEntity($entityName)
    {
        $query = $this->em->createQuery(
            sprintf(
                ' SELECT e, RAND() as HIDDEN rand FROM %s e '.
                ' ORDER BY rand DESC ',
                $entityName
            )
        )
            ->setMaxResults(1);

        return $query->getSingleResult();
    }

    protected function getRandomEntityBy($entityName, array $criteria)
    {
        $key = sprintf('%s_%s', $entityName, md5(serialize($criteria)));
        if (!array_key_exists($key, $this->random)) {
            $this->random[$key] = array_values($this->em->getRepository($entityName)->findBy($criteria, [], 100));
        }
        $count = count($this->random[$key]);
        if (!$count) {
            return;
        }

        return $this->random[$key][rand(0, $count - 1)];
    }
}
