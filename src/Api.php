<?php

namespace owncloud\api;

use owncloud\api\file\FileManagement;
use owncloud\api\file\FileSharing;

/**
 * Class Api
 * @package owncloud\api
 */
class Api
{
    /**
     * @var Client $client
     */
    private $client;
    /**
     * @var string $host
     */
    private $host;
    /**
     * @var string $username
     */
    private $username;
    /**
     * @var string $password
     */
    private $password;

    /**
     * Api constructor.
     * @param string $host
     * @param string $username
     * @param string $password
     * @param array $config
     */
    public function __construct($host, $username, $password, $config = array())
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $config['base_url'] = $host;
        $config['defaults']['auth'] = [$username, $password];
        $this->client = new Client($config);
    }

    /**
     * @return FileSharing
     */
    public function fileSharing()
    {
        return new FileSharing($this->client);
    }

    /**
     * @return FileManagement
     */
    public function fileManagement()
    {
        return new FileManagement($this->host, $this->username, $this->password);
    }
}