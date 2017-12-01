<?php

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * sujet
 *
 * @ORM\Table(name="sujet")
 * @ORM\Entity
 */
class Sujet
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(name="contenu", type="string", length=20000)
     */
    private $contenu;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set contenu
     *
     * @param string $contenu
     * @return sujet
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }


    public function __construct()
    {
    }
}
