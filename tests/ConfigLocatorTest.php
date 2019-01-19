<?php


namespace Deployee\Components\Config;


use PHPUnit\Framework\TestCase;

class ConfigLocatorTest extends TestCase
{
    public function testLocate()
    {
        $locator = new ConfigLocator();
        $ds = DIRECTORY_SEPARATOR;

        $expectedResult = sprintf('%1$s%2$stest_config%2$s%3$s', __DIR__,  $ds, '.deployee.yml');
        $this->assertSame($expectedResult, $locator->locate([__DIR__ . '/test_config']));
        $this->assertSame($expectedResult, $locator->locate([__DIR__ . '/test_config'], 'weiredenv'));

        $expectedResult = sprintf('%1$s%2$stest_config%2$s%3$s', __DIR__,  $ds, '.deployee.test.yml');
        $this->assertSame($expectedResult, $locator->locate([__DIR__ . '/test_config'], 'test'));
    }
}