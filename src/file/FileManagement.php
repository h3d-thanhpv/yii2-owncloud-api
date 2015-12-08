<?php

namespace owncloud\api\file;

use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;

class FileManagement extends Filesystem
{
    /**
     * FileManagement constructor.
     * @param string $host
     * @param string $username
     * @param string $password
     * @param array $settings
     */
    public function __construct($host, $username, $password, $settings = array())
    {
        $settings['baseUri'] = $host;
        $settings['userName'] = $username;
        $settings['password'] = $password;
        $client = new \Sabre\DAV\Client($settings);
        $adapter = new WebDAVAdapter($client, 'remote.php/webdav/');
        parent::__construct($adapter);
    }
}