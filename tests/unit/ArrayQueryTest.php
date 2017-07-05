<?php
/**
 *
 * ArrayQueryTest
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
namespace dosamigos\arrayquery\tests;

use dosamigos\arrayquery\conditions\GreaterThan;
use dosamigos\arrayquery\conditions\GreaterThanOrEqual;
use dosamigos\arrayquery\conditions\LessThan;
use dosamigos\arrayquery\conditions\LessThanOrEqual;

class ArrayQueryTest extends \PHPUnit_Framework_TestCase
{
    protected $array;
    protected $query;

    protected function setUp()
    {
        $this->array = [
            [
                'name' => 'Antonio',
                'surname' => 'Ramirez',
                'age' => 42,
                'parents' => [
                    'father' => [
                        'name' => 'Antonio',
                        'surname' => 'FirstA SecondA'
                    ],
                    'mother' => [
                        'name' => 'Antonia',
                        'surname' => 'FirstB SecondB'
                    ]
                ]
            ],
            [
                'name' => 'John',
                'surname' => 'Doe',
                'age' => 18,
                'parents' => [
                    'father' => [
                        'name' => 'John',
                        'surname' => 'FirstA SecondA'
                    ],
                    'mother' => [
                        'name' => 'Janet',
                        'surname' => 'FirstB SecondB'
                    ]
                ]
            ],
        ];

        $this->query = new \dosamigos\arrayquery\ArrayQuery($this->array);
    }

    public function testBadOperationIsEqual()
    {
        $result = $this->query->addCondition('name', 'Antonio')->find();
        $this->assertEquals("Antonio", $result[0]['name']);

        $result = $this->query->addCondition('name', 'badName')->one();
        $this->assertEmpty($result);
    }

    public function testNoConditions()

    {
        $result = $this->query->find();
        $this->assertEquals($this->array, $result);
    }

    public function testOrConditions()
    {
        $result = $this->query->addCondition('name', 'Antonio')->addCondition('name', 'John', 'or')->find();
        $this->assertCount(2, $result);
    }

    public function testTokenizer()
    {
        $paths = $this->query->tokenize($this->array);
        $this->assertArrayHasKey('parents.father.name', $paths);

        $obj = new \stdClass();
        $obj->name = "Antonio";
        $obj->father = new \stdClass();
        $obj->father->name = "Antonio";
        $paths = $this->query->tokenize($obj);
        $this->assertArrayHasKey('father.name', $paths);
    }

    public function testCheckType()
    {
        $result = $this->query->addCondition('age', '>string')->find();
        $this->assertCount(0, $result);
    }

    public function testEqual()
    {
        $result = $this->query->addCondition('name', 'John')->find();
        $this->assertCount(1, $result);
        $this->assertEquals("John", $result[1]['name']);
    }

    public function testNotEqual()
    {
        $result = $this->query->addCondition('name', '<>John')->find();
        $this->assertCount(1, $result);
        $this->assertEquals("Antonio", $result[0]['name']);
        $this->assertNotEquals("John", $result[0]['name']);
    }

    public function testGreaterThan()
    {
        $result = $this->query->addCondition('age', '>30')->one();
        $this->assertEquals("Antonio", $result['name']);

        $condition = new GreaterThan(20);

        $this->assertTrue($condition->matches(30));

        $this->assertFalse($condition->matches(10));

        // less than
        $condition->reverse();

        $this->assertTrue($condition->matches(30));


    }

    public function testGreaterThanOrEqual()
    {
        $result = $this->query->addCondition('age', '>=42')->one();
        $this->assertEquals("Antonio", $result['name']);


        $condition = new GreaterThanOrEqual(10);

        // less than or equal
        $condition->reverse();
        $this->assertTrue($condition->matches(20));
    }

    public function testLessThan()
    {
        $result = $this->query->addCondition('age', '<30')->one();
        $this->assertEquals("John", $result['name']);

        $condition = new LessThan(10);

        // greater than
        $condition->reverse();

        $this->assertTrue($condition->matches(5));
    }

    public function testLessThanOrEqual()
    {
        $result = $this->query->addCondition('age', '<=30')->one();
        $this->assertEquals("John", $result['name']);

        $condition = new LessThanOrEqual(10);

        // Greater than or equal
        $condition->reverse();
        $this->assertTrue($condition->matches(5));
    }

    public function testLike()
    {
        $result = $this->query->addCondition('name', '~toni')->one();
        $this->assertEquals("Antonio", $result['name']);
        $result = $this->query->addCondition('name', 'like toni')->one();
        $this->assertEquals("Antonio", $result['name']);
    }

    public function testNotLike()
    {
        $result = $this->query->addCondition('name', 'n~toni')->one();
        $this->assertEquals("John", $result['name']);
        $result = $this->query->addCondition('name', 'nlike toni')->one();
        $this->assertEquals("John", $result['name']);
    }

    public function testOne()
    {
        $result = $this->query->addCondition('name', 'Antonio')->one();
        $this->assertEquals('Ramirez', $result['surname']);
    }
}
