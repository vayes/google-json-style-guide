<?php

namespace Vayes\GoogleJsonStyleGuide;

class ApiResponseParams
{
    /**
     * @var array|null
     */
    private $searchParams;

    /**
     * @var array|null
     */
    private $filterParams;

    /**
     * @var array|null
     */
    private $sortParams;

    /**
     * @var array|null
     */
    private $paginationParams;

    public function getSearchParams(): ?array
    {
        return $this->searchParams;
    }

    /**
     * @param array|null $searchParams
     */
    public function setSearchParams(?array $searchParams): void
    {
        $this->searchParams = $searchParams;
    }

    public function getFilterParams(): ?array
    {
        return $this->filterParams;
    }

    /**
     * @param array|null $filterParams
     */
    public function setFilterParams(?array $filterParams): void
    {
        $this->filterParams = $filterParams;
    }

    public function getSortParams(): ?array
    {
        return $this->sortParams;
    }

    /**
     * @param array|null $sortParams
     */
    public function setSortParams(?array $sortParams): void
    {
        $this->sortParams = $sortParams;
    }

    /**
     * @return array|null
     */
    public function getPaginationParams(): ?array
    {
        return $this->paginationParams;
    }

    /**
     * @param array|null $paginationParams
     */
    public function setPaginationParams(?array $paginationParams): void
    {
        $this->paginationParams = $paginationParams;
    }
}
