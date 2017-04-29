<?php
namespace Rgbvader\OAuth;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class XenForoProvider extends AbstractProvider
{
    const ACCESS_TOKEN_RESOURCE_OWNER_ID = 'user_id';
    const DEFAULT_SCOPES = [ 'read' ];

    public $baseUrl;

    /**
     * @param string $url
     * @param string $query
     * @return string
     */
    protected function appendQuery($url, $query)
    {
        if (substr($url, strlen($url)- 1, 1) == '&')
        {
            return $url.$query;
        }
        return parent::appendQuery($url, $query);
    }

    /**
     * Use a space to force http_build_query to use '+'.
     * @return string
     */
    protected function getScopeSeparator()
    {
        return ' ';
    }

    public function getBaseAuthorizationUrl()
    {
        // TODO: Implement getBaseAuthorizationUrl() method.
        return $this->baseUrl.'oauth/authorize&';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->baseUrl.'oauth/token&';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return $this->baseUrl.'users/me';
    }

    protected function getDefaultScopes()
    {
        return self::DEFAULT_SCOPES;
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        // TODO: Implement
        var_dump($response);
        die();
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new User($response);
    }
}