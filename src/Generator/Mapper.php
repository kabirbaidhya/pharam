<?php

namespace Pharam\Generator;

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
     * @var Table
     */
    protected $table;

    /**
     * @param Table $table
     */
    public function setTable(Table $table)
    {
        $this->table = $table;
    }

    public function getElements()
    {
        if (!($this->table instanceof Table)) {
            throw new \Exception('Table not set');
        }

        $elements = [];
        foreach ($this->table->getColumns() as $column) {
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
            'id' => str_replace('_', '-', $column->getName()),
            'class' => null
        ];

        if ($column->getType() instanceof TextType) {
            $element = new TextArea($attributes);
        } elseif ($column->getType() instanceof StringType) {
            $attributes['length'] = $column->getLength();
            $element = new Text($attributes);
        } else {
            // TODO
            $element = new Text($attributes);
        }

        $element->setRequired($column->getNotnull());

        return $element;
    }
}
