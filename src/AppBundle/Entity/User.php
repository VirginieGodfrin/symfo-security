<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="user") 
 * @UniqueEntity(fields={"email"}, message="It looks like your already have an account!")
 * 
 */
class User implements UserInterface
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO") 
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Email()
	 */
	private $email;

	/**
	 * The encoded password
	 *
	 * @ORM\Column(type="string") 
	 */
	private $password;

	/**
	 * A non-persisted field that's used to create the encoded password.
	 * @var string
	 * @Assert\NotBlank()
	 */
	private $plainPassword;

	/**
	 * @ORM\Column(type="json_array")
	 */
	private $roles = [];

	public function getUsername() {

		return $this->email;

	}

	public function setPassword($password) {
		$this->password = $password; 
	}

	public function getPassword() {
		return $this->password;
	}

	public function getPlainPassword() {
		return $this->plainPassword; 
	}

	public function setPlainPassword($plainPassword) {
		$this->plainPassword = $plainPassword;
		// forces the object to look "dirty" to Doctrine. Avoids
		// Doctrine *not* saving this entity, if only plainPassword changes 
		$this->password = null;
	}

	public function getSalt() {
	}

	public function eraseCredentials() {
		$this->plainPassword = null;
	}

	public function setEmail($email) {
		$this->email = $email; 
	}

	public function getEmail() {
		return $this->email; 
	}

	public function setRoles(array $roles) {
		$this->roles = $roles; 
	}

	public function getRoles() {
		$roles = $this->roles;
		// give everyone ROLE_USER!
		if (!in_array('ROLE_USER', $roles)) { 
			$roles[] = 'ROLE_USER';
		}
		return $roles;
	}


}