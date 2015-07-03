<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Table;

class Database
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param Connection $connection
     */
    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $tableName
     * @return Table
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

    public function getAllTables()
    {
        $tables = $this->getConnection()->getSchemaManager()->listTables();

        return $tables;
    }

    public function getTables(array $tableNames)
    {
        $tables = [];
        foreach ($tableNames as $tableName) {
            $tables[] = $this->getTable($tableName);
        }

        return $tables;
    }

}
