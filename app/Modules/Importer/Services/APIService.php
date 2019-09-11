<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 12:07 PM
 */

namespace App\Modules\Importer\Services;

use App\Modules\Importer\Services\Contracts\APIServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class APIService
 * @package App\Modules\Importer\Services
 */
class APIService implements APIServiceInterface
{
    /**
     * @var Client $client
     */
    protected $client;

    /**
     * @var mixed $apiUrl
     */
    private $apiUrl;

    /**
     * @var $header
     */
    private $header;

    /**
     * APIService constructor.
     *
     * @param Client $client
     * @param $apiUrl
     */
    public function __construct(Client $client, $apiUrl)
    {
        $this->client = $client;
        $this->apiUrl = $apiUrl;

        $this->header = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ];
    }

    /**
     * Get response from the API provider
     *
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    public function get()
    {
        $response = $this->client->request('GET', $this->apiUrl, $this->header);
        $response = json_decode($response->getBody());

        return $response;
    }
}
