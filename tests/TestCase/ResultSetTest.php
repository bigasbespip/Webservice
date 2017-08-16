<?php

namespace Muffin\Webservice\Test\TestCase;

use Cake\TestSuite\TestCase;
use Muffin\Webservice\Model\Resource;
use Muffin\Webservice\Pagination;
use Muffin\Webservice\ResultSet;

class ResultSetTest extends TestCase
{

    /**
     * @var ResultSet
     */
    public $resultSet;

    /**
     * @inheritDoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->resultSet = new ResultSet(
            [
                new Resource([
                    'id' => 1,
                    'title' => 'Hello World'
                ]),
                new Resource([
                    'id' => 2,
                    'title' => 'New ORM'
                ]),
                new Resource([
                    'id' => 3,
                    'title' => 'Webservices'
                ])
            ],
            new Pagination(['count' => 6, 'current' => 6])
        );
    }

    public function testCount()
    {
        $this->assertEquals(3, $this->resultSet->count());
    }

    public function testTotal()
    {
        $this->assertEquals(6, $this->resultSet->total());
    }

    public function testSerialize()
    {
        $this->assertInternalType('string', serialize($this->resultSet));
    }

    public function testUnserialize()
    {
        $unserialized = unserialize(serialize($this->resultSet));

        $this->assertInstanceOf('\Muffin\Webservice\ResultSet', $unserialized);
    }

    public function testPagination()
    {
        $expected = [
            'finder' => 'all',
            'page' => 1,
            'current' => 6,
            'count' => 6,
            'perPage' => 20,
            'prevPage' => false,
            'nextPage' => false,
            'pageCount' => 1,
            'sort' => null,
            'direction' => false,
            'limit' => null,
            'sortDefault' => false,
            'directionDefault' => false,
            'scope' => null
        ];

        $this->assertEquals($expected, $this->resultSet->pagination());
    }

    /**
     * @inheritDoc
     */
    public function tearDown()
    {
        parent::tearDown();

        $this->resultSet = null;
    }
}
