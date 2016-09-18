<?php

namespace League\OAuth2\Client\Provider;

/**
 * Overrides the generic service provider that may be used to interact with any
 * OAuth 2.0 service provider, using Bearer token authentication.
 * This class adds certification path (cert) in $options
 */

class WegovnowProvider extends GenericProvider
{
    protected function getAllowedClientOptions(array $options)
    {
        $client_options = ['timeout', 'proxy', 'cert'];

        return $client_options;
    }
}