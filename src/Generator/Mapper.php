<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\TextType;
use Pharam\Generator\Element\Date;
use Pharam\Generator\Element\Email;
use Pharam\Generator\Element\Numeric;
use Pharam\Generator\Element\Text;
use Doctrine\DBAL\Types\StringType;
use Pharam\Generator\Element\TextArea;
use Pharam\Generator\Element\Select;
use Pharam\Generator\Element\Boolean;
use Pharam\Generator\Element\ElementInterface;

class Mapper
{
    /**
     * @var ColumnHelper
     */
    private $helper;

    /**
     * @param ColumnHelper $helper
     */
    public function __construct(ColumnHelper $helper)
    {
        $this->helper = $helper;
    }

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
        $fks = [];
        $fk = $this->table->getForeignKeys();
        if (!empty($fk)) {
            foreach ($fk as $f) {
                $fks = array_merge($fks, $f->getLocalColumns());
            }
        };
        foreach ($this->table->getColumns() as $column) {
            $elements[] = $this->mapColumn($column, $fks);
        }

        return $elements;
    }

    /**
     * @param Column $column
     * @return ElementInterface
     */
    protected function mapColumn(Column $column, $fks)
    {
        $attributes = [
            'name' => $column->getName(),
            'id' => str_replace('_', '-', $column->getName()),
            'class' => null
        ];

        //dump($column);
        if ($this->helper->isText($column)) {
            $element = new TextArea($attributes);
        } elseif ($this->helper->isString($column)) {
            $attributes['maxlength'] = $column->getLength();
            $element = new Text($attributes);
        } elseif ($this->helper->isBoolean($column)) {
            $element = new Boolean($attributes);
        } elseif ($this->helper->isDate($column)) {
            $element = new Date($attributes);
        } elseif ($this->helper->isDateTime($column)) {
            // TODO DateTime
        } elseif ($this->helper->isEmail($column)) {
            $element = new Email($attributes);
        } elseif ($this->helper->isPassword($column)) {
            // TODO Password
        } elseif ($this->helper->isSelect($column, $fks)) {
            $element = new Select($attributes);
        } elseif ($this->helper->isNumeric($column)) {
            $element = new Numeric($attributes);
        } else {
            $element = new Text($attributes);
        }

        $element->setRequired($column->getNotnull());

        return $element;
    }

}
