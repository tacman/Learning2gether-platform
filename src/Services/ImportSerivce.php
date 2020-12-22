<?php

namespace App\Services;

use Bitbucket\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImportSerivce
{

    private ParameterBagInterface $bag;

    public function __construct(ParameterBagInterface $bag)
    {

        $this->bag = $bag;
    }
    public function importFromBitbucket()
    {

        $client = new Client();

        $client->authenticate(
            Client::AUTH_HTTP_PASSWORD,
            $this->bag->get('bitbucket_username'),
            $this->bag->get('bitbucket_app_password')
        );

        // https://api.bitbucket.org/2.0/workspaces/catlikecodingunitytutorials/projects

        $username = 'catlikecodingunitytutorials';
        $repository = $client->repositories()
            ->workspaces($username)
            ->list();
//            ->show('stash-example-plugin')
        ;

        dd($client->getLastResponse(), $repository);

        dd($client->repositories()->list());

        $repos = $client->repositories()->list();
        dd($repos);

        //
//        $client->authenticate(
//            Client::AUTH_OAUTH_TOKEN,
//            $this->bag->get('bitbucket_auth')
//        );


        dd($client);
    }
}
