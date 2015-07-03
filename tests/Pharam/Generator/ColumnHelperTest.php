<?php
namespace Pharam\Test\Generator;

use Doctrine\DBAL\Schema\Column;
use Pharam\Test\TestCase;
use Pharam\Generator\ColumnHelper;

class ColumnHelperTest extends TestCase
{
    public function testNameContains()
    {
        $helper = new ColumnHelper();

        $column = $this->getMockBuilder(Column::class)->disableOriginalConstructor()->getMock();
        $column->expects($this->at(0))->method('getName')->willReturn('user_email');
        $column->expects($this->at(1))->method('getName')->willReturn('email_sdfsd');
        $column->expects($this->at(2))->method('getName')->willReturn('userEmail');
        $column->expects($this->at(3))->method('getName')->willReturn('ffemail');

        $result = $helper->nameContains($column, 'email');
        $this->assertTrue($result);
        $result = $helper->nameContains($column, 'email');
        $this->assertTrue($result);
        $result = $helper->nameContains($column, 'email');
        $this->assertTrue($result);
        $result = $helper->nameContains($column, 'email');
        $this->assertTrue($result);
    }

    public function testHasCommentTag()
    {
        $helper = new ColumnHelper();

        $column = $this->getMockBuilder(Column::class)->disableOriginalConstructor()->getMock();
        $column->expects($this->at(0))->method('getComment')->willReturn(' slkdjflskdj flskdjfl skdjfs ldkf #email');
        $column->expects($this->at(1))->method('getComment')->willReturn('#email slkdfjs lkdjfl skdjflsk');
        $column->expects($this->at(2))->method('getComment')->willReturn('skdjfls dkjf #email ggg');
        $column->expects($this->at(3))->method('getComment')->willReturn('ffemail');

        $result = $helper->hasCommentTag($column, 'email');
        $this->assertTrue($result);
        $result = $helper->hasCommentTag($column, 'email');
        $this->assertTrue($result);
        $result = $helper->hasCommentTag($column, 'email');
        $this->assertTrue($result);
        $result = $helper->hasCommentTag($column, 'email');
        $this->assertFalse($result);
    }
}
