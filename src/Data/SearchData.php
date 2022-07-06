<?php

namespace App\Data;

class SearchData
{
    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var string
     */
    public $q = '';

    /**
     * @var Type[]
     */
    public $type = [];

    /**
     * @var Brand[]
     */
    public $brand = [];

    /**
     * @var Size[]
     */
    public $size = [];

    /**
     * @var boolean
     */
    public $premium = false;
}