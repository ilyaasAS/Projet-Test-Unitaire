<?php

/**
 * Namespaces
 */

use PHPUnit\Framework\TestCase;

/**
 * Requires
 */
require_once __DIR__ . "/../controllers/Calculator.php";

class CalculatorTest extends TestCase
{

    private $calculator;

    protected function setUp(): void
    {
        //Initialiser une nouvelle instance de Calculator avant chaque test.
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $this->setUp();
        $result = $this->calculator::add(1, 2);
        $this->assertEquals(3, $result);
        $this->tearDown();
    }

    public function testMultiply()
    {
        $this->setUp();
        $result = $this->calculator::multiply(4, 3);
        $this->assertEquals(12, $result);
        $this->tearDown();
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAddGroup(int $a, int $b, int $expected)
    {
        $this->setUp();
        $result = $this->calculator::add($a, $b);
        $this->assertEquals($expected, $result);
        $this->tearDown();
    }

    public static function additionProvider()
    {
        return [
            [1, 2, 3],
            [0, 0, 0],
            [-1, 1, 0],
            // [12 , 85, 6],
            [3, 3, 6],
        ];
    }

    public function testCalculateAdvancedOperation(): void {
        $externalServiceMock = $this->createMock(ExternalCalculatorService::class);

        $externalServiceMock
        ->expects($this->once())
        ->method("performComplexCalculation")
        ->with([1, 9, 9])
        ->willReturn(42);

        $calculator = new Calculator(ex)
    }

    protected function tearDown(): void
    {
        // Nettoyer les ressources pour libérer la mémoire après chaque test.
        unset($this->calculator);
    }

    public function testDivideByZeroThrowsException()
    {
        $this->setUp();
        /**
         * On teste une division par zéro
         */
        $this->tearDown();
    }

    public static function throwExceptionCalculator()
    {
        throw new Exception("Cette méthode retourne une exception !");
    }
}
