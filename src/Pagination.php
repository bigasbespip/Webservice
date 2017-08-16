<?php

namespace Muffin\Webservice;

/**
 * Pagination
 *
 * Represent the pagination data returned by a query to a webservice
 */
class Pagination implements PaginationInterface
{
    /**
     * Core pagination fields
     *
     * @var array
     */
    private $paginationFields = [
        'finder',
        'page',
        'current',
        'count',
        'perPage',
        'prevPage',
        'nextPage',
        'pageCount',
        'sort',
        'direction',
        'limit',
        'sortDefault',
        'directionDefault',
        'scope',
    ];

    /**
     * Name of the finder used
     *
     * @var string
     */
    protected $finder = 'all';

    /**
     * Current page number
     *
     * @var int
     */
    protected $page = 1;

    /**
     * Number of records on this page
     *
     * @var int
     */
    protected $current = 0;

    /**
     * Total number of records in the whole result set
     *
     * @var int
     */
    protected $count = 0;

    /**
     * Number of results per page
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Is there a previous page
     *
     * @var bool
     */
    protected $prevPage = false;

    /**
     * Is there a next page
     *
     * @var bool
     */
    protected $nextPage = false;

    /**
     * Total number of pages
     *
     * @var int
     */
    protected $pageCount = 1;

    /**
     * The field the results are sorted by
     *
     * @var string|null
     */
    protected $sort = null;

    /**
     * The direction of the sorting
     *
     * @var string|bool
     */
    protected $direction = false;

    /**
     * The limit to the number of records
     *
     * @var int|null
     */
    protected $limit = null;

    /**
     * Default sorting field
     *
     * @var string|bool
     */
    protected $sortDefault = false;

    /**
     * Default direction for the sorting
     *
     * @var string|bool
     */
    protected $directionDefault = false;

    /**
     * The scope of the pagination
     *
     * @var string|null
     */
    protected $scope = null;

    /**
     * Pagination constructor.
     *
     * @param array $pagination
     */
    public function __construct(array $pagination = [])
    {
        foreach ($this->paginationFields as $field) {
            if (!empty($pagination[$field])) {
                $this->{$field} = $pagination[$field];
            }
        }
    }

    /**
     * Get an array of pagination parameters
     *
     * @return array
     */
    public function getPagingParams()
    {
        return [
            'finder' => $this->finder,
            'page' => $this->page,
            'current' => $this->current,
            'count' => $this->getTotal(),
            'perPage' => $this->perPage,
            'prevPage' => $this->prevPage,
            'nextPage' => $this->nextPage,
            'pageCount' => $this->pageCount,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'limit' => $this->limit,
            'sortDefault' => $this->sortDefault,
            'directionDefault' => $this->directionDefault,
            'scope' => $this->scope
        ];
    }

    /**
     * Get the total number of records in the query
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->count;
    }
}
