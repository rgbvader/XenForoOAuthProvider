<?php
namespace Rgbvader\OAuth;

use League\OAuth2\Client\Provider\GenericProvider;

class XenForoProvider extends GenericProvider
{
    const ACCESS_TOKEN_RESOURCE_OWNER_ID = 'user_id';

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
     * Generate a random state, but do it publicly
     * @param int $length
     * @return string
     */
    public function getRState($length = 32)
    {
        return parent::getRandomState($length);
    }

    /**
     * Use a space to force http_build_query to use '+'.
     * @return string
     */
    protected function getScopeSeparator()
    {
        return ' ';
    }
}