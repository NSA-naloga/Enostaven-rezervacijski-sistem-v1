<?php
namespace NSA\Bundle\Component\Authentication\Handler;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
	
	protected $router;
	protected $security;
	
	public function __construct(SecurityContext $security,Router $router)
	{
		$this->router = $router;
		$this->security = $security;
	}
	
	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		
		if ($this->security->isGranted('ROLE_USER'))
		{
			// redirect the user to where they were before the login process begun.
			$referer_url = $request->getSession()->get('_security.main.target_path');
			if($referer_url==NULL)
			$response = new RedirectResponse('/');
			else
			$response = new RedirectResponse($referer_url);
		}
			
		return $response;
	}
	
}