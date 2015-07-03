<?php

namespace Pharam\Generator;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\BooleanType;

class ColumnHelper
{
    public function isText(Column $column)
    {
        return ($column->getType() instanceof TextType);
    }

    public function isString(Column $column)
    {
        return ($column->getType() instanceof StringType);
    }

    public function isBoolean(Column $column)
    {
        return ($column->getType() instanceof BooleanType);
    }

    public function isEmail(Column $column)
    {
        return (
            $this->isString($column)
            && (
                $this->hasCommentTag($column, 'email') ||
                $this->nameContains($column, 'email')
            )
        );
    }

    public function isPassword(Column $column)
    {
        return (
            $this->isString($column)
            && (
                $this->hasCommentTag($column, 'password') ||
                $this->nameContains($column, 'password')
            )
        );
    }

    public function isDate(Column $column)
    {
        return ($column->getType() instanceof DateType);
    }

    public function isDateTime(Column $column)
    {
        return ($column->getType() instanceof DateTimeType);
    }

    public function nameContains(Column $column, $name)
    {
        $pos = stripos($column->getName(), $name);

        return ($pos !== false);
    }

    public function isNumeric(Column $column)
    {
        return (
            ($column->getType() instanceof IntegerType) ||
            ($column->getType() instanceof BigIntType) ||
            ($column->getType() instanceof DecimalType) ||
            ($column->getType() instanceof FloatType) ||
            ($column->getType() instanceof SmallIntType)
        );
    }

    public function isSelect(Column $column, array $fks)
    {
        return in_array($column->getName(), $fks);
    }

    public function hasCommentTag(Column $column, $tag)
    {
        $pos = stripos($column->getComment(), '#' . $tag);

        return ($pos !== false);
    }
}
