<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\TextType;
use Pharam\Generator\Element\Text;
use Doctrine\DBAL\Types\StringType;
use Pharam\Generator\Element\TextArea;
use Pharam\Generator\Element\ElementInterface;

class Mapper
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var Table
     */
    protected $table;


    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $tableName
     */
    public function readTable($tableName)
    {
        $this->table = $this->connection->getSchemaManager()->listTableDetails($tableName);
    }

    public function getElements()
    {
        if (!($this->table instanceof Table)) {
            throw new \Exception('Table not set');
        }

        $columns = $this->table->getColumns();
        $elements = [];
        foreach ($columns as $column) {
            $elements[] = $this->mapColumn($column);
        }

        return $elements;
    }

    /**
     * @param Column $column
     * @return ElementInterface
     */
    protected function mapColumn(Column $column)
    {
        $attributes = [
            'name' => $column->getName(),
            'id' => human_readable($column->getName()),
            'class' => null
        ];

        if ($column->getType() instanceof TextType) {
            $element = new TextArea($attributes);
        } elseif ($column->getType() instanceof StringType) {
            $element = new Text($attributes);
        } else {
            // TODO
            $element = new Text($attributes);
        }

        return $element;
    }

}
