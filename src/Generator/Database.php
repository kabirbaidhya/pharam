<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Table;

/**
 * Class Database
 * @package Pharam\Generator
 */
class Database
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * Initailize connection.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * Get Connection object
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Sets Connection object
     * @param Connection $connection
     */
    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Gets all details related to a particular DB table
     * @param $tableName
     * @return obj Table
     * @throws \Exception
     */
    public function getTable($tableName)
    {
        $exists = $this->getConnection()->getSchemaManager()->tablesExist([$tableName]);

        if (!$exists) {
            throw new \Exception(sprintf('Table %s does not exist', $tableName));
        }

        $table = $this->getConnection()->getSchemaManager()->listTableDetails($tableName);

        return $table;
    }

    /**
     * Get details from all the table present in a DB Table.
     * @return \Doctrine\DBAL\Schema\Table[]
     */
    public function getAllTables()
    {
        $tables = $this->getConnection()->getSchemaManager()->listTables();

        return $tables;
    }

    /**
     * Gets table details from specified table name.
     * @param array $tableNames
     * @return array
     * @throws \Exception
     */
    public function getTables(array $tableNames)
    {
        $tables = [];
        foreach ($tableNames as $tableName) {
            $tables[] = $this->getTable($tableName);
        }

        return $tables;
    }

}
