<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginDate
 *
 * @ORM\Table(name="login_date")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LoginDateRepository")
 */
class LoginDate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_login", type="integer")
     */
    private $idLogin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idLogin
     *
     * @param integer $idLogin
     *
     * @return LoginDate
     */
    public function setIdLogin($idLogin)
    {
        $this->idLogin = $idLogin;

        return $this;
    }

    /**
     * Get idLogin
     *
     * @return int
     */
    public function getIdLogin()
    {
        return $this->idLogin;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return LoginDate
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

