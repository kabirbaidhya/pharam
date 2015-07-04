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

    const HASH_TAG_EMAIL = 'email';
    const HASH_TAG_PASSWORD = 'password';
    const HASH_TAG_HIDDEN = 'hidden';

    /**
     * @param Column $column
     * @return bool
     */
    public function isTextArea(Column $column)
    {
        return ($column->getType() instanceof TextType);
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isString(Column $column)
    {
        return ($column->getType() instanceof StringType);
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isBoolean(Column $column)
    {
        return ($column->getType() instanceof BooleanType);
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isEmail(Column $column)
    {
        return (
            $this->isString($column)
            && (
                $this->hasCommentTag($column, self::HASH_TAG_EMAIL) ||
                $this->nameContains($column, 'email')
            )
        );
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isPassword(Column $column)
    {
        return (
            $this->isString($column)
            && (
                $this->hasCommentTag($column, self::HASH_TAG_PASSWORD) ||
                $this->nameContains($column, 'password')
            )
        );
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isDate(Column $column)
    {
        return ($column->getType() instanceof DateType);
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isDateTime(Column $column)
    {
        return ($column->getType() instanceof DateTimeType);
    }

    /**
     * @param Column $column
     * @param $name
     * @return bool
     */
    public function nameContains(Column $column, $name)
    {
        $pos = stripos($column->getName(), $name);

        return ($pos !== false);
    }

    /**
     * @param Column $column
     * @return bool
     */
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

    /**
     * @param Column $column
     * @param array $fks
     * @return bool
     */
    public function isSelect(Column $column, array $fks)
    {
        return in_array($column->getName(), $fks);
    }

    /**
     * @param Column $column
     * @param $tag
     * @return bool
     */
    public function hasCommentTag(Column $column, $tag)
    {
        $pos = stripos($column->getComment(), '#' . $tag);

        return ($pos !== false);
    }

    /**
     * @param Column $column
     * @return bool
     */
    public function isHidden(Column $column)
    {
        return (
            $column->getAutoincrement() ||
            $this->hasCommentTag($column, self::HASH_TAG_HIDDEN)
        );
    }
}
