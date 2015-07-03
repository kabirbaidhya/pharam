<?php
namespace Pharam\Test;

class HumanReadableTest extends TestCase
{
    public function testHumanReadableUnderscore()
    {
        $result = human_readable('first_name');
        $this->assertEquals('First Name', $result);
    }

    public function testHumanReadableCamel()
    {
        $result = human_readable('firstName');
        $this->assertEquals('First Name', $result);
    }

    public function testHumanReadablePascal()
    {
        $result = human_readable('LastName');
        $this->assertEquals('Last Name', $result);
    }

    public function testHumanReadableNumber()
    {
        $result = human_readable('address1');
        $this->assertEquals('Address 1', $result);
    }

}
