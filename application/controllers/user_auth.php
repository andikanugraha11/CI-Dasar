<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth extends CI_Controller{

	public function index()
	{

		// $clientId ='627484450598-bif69q62j2tv83762o8n468m13df5he0.apps.googleusercontent.com';
		// $clientSecret ='woLIQbgXvQu6BY4YRZ3bK0gS';
		// $redirectUrl = 'http://localhost/belajarRD/user_auth';
		$this->load->library('google');

		$client = new Google_Client();
		// $client->setApplicationName('Login sob');
		$client->setAuthConfig(APPPATH."/libraries/google-api-php-client/credential.json");
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");

		// $client->setClientId($clientId);
		// $client->setClientSecret($clientSecret);
		// $client->setRedirectUri($redirectUrl);
		$service = new Google_Service_Oauth2($client);

		// Add Access Token to Session
		if (isset($_GET['code']))
		{
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			//header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
		}

		// Set Access Token to make Request
		if (isset($_SESSION['access_token']) && $_SESSION['access_token'])
		{
			$client->setAccessToken($_SESSION['access_token']);
		}

		// Get User Data from Google and store them in $data
		if ($client->getAccessToken())
		{
			$userData = $service->userinfo->get();
			$data['userData'] = $userData;
			$_SESSION['access_token'] = $client->getAccessToken();
			} else {
			$authUrl = $client->createAuthUrl();
			$data['authUrl'] = $authUrl;
		}

		$this->load->view('auth', $data);
}

		// Unset session and logout
		public function logout() {
		unset($_SESSION['access_token']);
		redirect(base_url());
		}

}