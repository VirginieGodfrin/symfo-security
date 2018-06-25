<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
	public function getCredentials(Request $request)
	{
		private $formFactory;

		public function __construct(FormFactoryInterface $formFactory)
		{
			$this->formFactory = $formFactory;
		}

		$isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');

		if (!$isLoginSubmit) {
			return; 
		}

		$form = $this->formFactory->create(LoginForm::class);

		$form->handleRequest($request);

		$data = $form->getData();

		return $data;

	}

	public function getUser($credentials, UserProviderInterface $userProvider)
	{

	}

	public function checkCredentials($credentials, UserInterface $user)
	{

	}

	protected function getLoginUrl() 
	{
	}

	protected function getDefaultSuccessRedirectUrl() 
	{
	}
}