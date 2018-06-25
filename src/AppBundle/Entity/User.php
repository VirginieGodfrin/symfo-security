<?php 

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\Role;
 
class User implements UserInterface
{
	public function getUsername() {
	}

	public function getRoles() {
	}

	public function getPassword() {
	}

	public function getSalt() {
	}
	
	public function eraseCredentials() {
	}

}