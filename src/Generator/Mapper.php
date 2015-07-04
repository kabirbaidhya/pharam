<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\Column;
use Pharam\Generator\Element\Hidden;
use Pharam\Generator\Element\Text;
use Pharam\Generator\Element\Date;
use Pharam\Generator\Element\Email;
use Pharam\Generator\Element\Select;
use Pharam\Generator\Element\Boolean;
use Pharam\Generator\Element\Numeric;
use Pharam\Generator\Element\TextArea;
use Pharam\Generator\Element\Password;
use Pharam\Generator\Element\ElementInterface;

/**
 * Class Mapper
 * @package Pharam\Generator
 */
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

    /**
     * Convert all the table columns into form elements
     *
     * @return array
     * @throws \Exception
     */
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
     * Maps an individual column in to a Form element
     *
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

        if ($this->helper->isEmail($column)) {
            $element = new Email($attributes);
        } elseif ($this->helper->isPassword($column)) {
            $element = new Password($attributes);
        } elseif ($this->helper->isHidden($column)) {
            $element = new Hidden($attributes);
        } elseif ($this->helper->isBoolean($column)) {
            $element = new Boolean($attributes);
        } elseif ($this->helper->isDate($column)) {
            $element = new Date($attributes);
        } elseif ($this->helper->isSelect($column, $fks)) {
            $element = new Select($attributes);
        } elseif ($this->helper->isTextArea($column)) {
            $element = new TextArea($attributes);
        } elseif ($this->helper->isString($column)) {
            $attributes['maxlength'] = $column->getLength();
            $element = new Text($attributes);
        } elseif ($this->helper->isNumeric($column)) {
            $element = new Numeric($attributes);
        } else {
            $element = new Text($attributes);
        }

        $element->setRequired($column->getNotnull());

        return $element;
    }

}
