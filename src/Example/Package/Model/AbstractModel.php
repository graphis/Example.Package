<?php
namespace Example\Package\Model;

use Aura\Sql\ConnectionLocator;

abstract class AbstractModel
{
    /**
     *
     * The connections to connect to database
     *
     * @var ConnectionLocator
     *
     */
    protected $connection_locator;

    /**
     *
     * Constructor
     *
     * @param ConnectionLocator $connection_locator Set the db connection
     *
     */
    public function __construct(ConnectionLocator $connection_locator)
    {
        $this->connection_locator = $connection_locator;
    }

    /**
     *
     * Returns an \Aura\Sql\Connection\AbstractConnection object
     *
     * @param string $type The type of connection. master / slave
     *
     * @param string $name The name of the connection for master / slave
     *
     * @return \Aura\Sql\Connection\AbstractConnection
     *
     */
    public function getConnection($type = null, $name = null)
    {
        switch ($type) {
            case 'master':
                $connection = 'getMaster';
                break;
            case 'slave':
                $connection = 'getSlave';
                break;
            default:
                $connection = 'getDefault';
                break;
        }
        return $this->connection_locator->$connection($name);
    }
}

