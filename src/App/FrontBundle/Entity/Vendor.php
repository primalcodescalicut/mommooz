<?php

namespace App\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professional
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\FrontBundle\Entity\UserRepository")
 */
class Vendor extends User
{
    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_VENDOR', 'ROLE_USER', 'ROLE_'.strtoupper($this->getUsername()));
    }
}
