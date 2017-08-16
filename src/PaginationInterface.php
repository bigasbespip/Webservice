<?php

namespace Muffin\Webservice;

interface PaginationInterface
{
    /**
     * Get an array of pagination parameters
     *
     * @return array
     */
    public function getPagingParams();

    /**
     * Get the total number of records in the query
     *
     * @return int
     */
    public function getTotal();
}
