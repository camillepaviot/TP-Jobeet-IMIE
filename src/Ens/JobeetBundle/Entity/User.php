<?php

namespace Ens\JobeetBundle\Entity;
 
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * User
 */
class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;
 
    /**
     * @var string
     */
    private $username;
 
    /**
     * @var string
     */
    private $password;
 
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
 
    }
 
    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
 
    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
 
    }
 
    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * 
     * @return type
     */
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
    
    /**
     * 
     * @return type
     */
    public function getSalt()
    {
        return null;
    }
    
    public function eraseCredentials()
    {
 
    }
    
    /**
     * 
     * @param \Ens\JobeetBundle\Entity\User $user
     * @return type
     */
    public function equals(User $user)
    {
        return $user->getUsername() == $this->getUsername();
    }        
}