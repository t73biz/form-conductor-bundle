<?php
namespace T73Biz\Bundle\FormConductorBundle\Service;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

/**
* The conductor service that is the endpoint handler for the formstack api
* @link http://developers.formstack.com/
*/
class Conductor
{

	/**
	 * The access token used by the formstack api
	 * @var string
	 */
	private $accessToken;

	/**
	 * The guzzle client base uri for the formstack api
	 * @var string
	 */
	private $baseUri;

	/**
	 * The guzzle client itself
	 * @var GuzzleHttp\Cleint
	 */
	private $client;

	/**
	 * The class constructor
	 * @param string $accessToken Parameter supplied access token
	 */
	public function __construct($accessToken, $baseUri)
	{
		$this->accessToken = $accessToken;
		$this->baseUri = $baseUri;
		$this->client = new GuzzleClient();
	}

	/**
	 * Get all of your form attached to your account\
	 * @link http://developers.formstack.com/docs/form-get
	 * @return Std\Object The object from the resonse
	 */
	public function getForms()
	{
		return $this->getResponse('/form.json');
	}

	/**
	 * Get a specific form by id
	 * @link http://developers.formstack.com/docs/form-id-get
	 * @param  integer $id The form id
	 * @return Std\Object The object from the response
	 */
	public function getForm($id)
	{
		return $this->getResponse('/form/' . $id . '.json');
	}

	/**
	 * Private function to perform the requests and return a standard object on success.
	 * @param  string $subPath The subpath of the url to use in the api
	 * @return Std\Obj The object from the response
	 */
	private function getResponse($subPath)
	{
		try {
			$response = $this->client->request(
				'GET',
				$this->baseUri . $subPath . "?oauth_token=" . $this->accessToken
			);
		} catch (ClientException $e) {
			echo 'There was a caught exception. The client responded with: ',  $e->getMessage(), "\n";

			die();
		}

		$obj =  json_decode($response->getBody());

		return $obj;
	}
}