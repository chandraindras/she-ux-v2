<?php

namespace App\Extensions\OAuth2;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class RapensiaOAuthProvider extends AbstractProvider implements ProviderInterface
{

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://app.rapensia.com/oauth/authorize', $state);
    }

    protected function getTokenUrl()
    {
        return 'https://app.rapensia.com/oauth/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get('https://app.rapensia.com/api/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }
}
