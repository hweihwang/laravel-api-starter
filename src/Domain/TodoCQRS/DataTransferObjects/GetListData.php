<?php

namespace Domain\TodoCQRS\DataTransferObjects;

use Illuminate\Pagination\Paginator;

abstract class GetListData extends DTO
{
    /**
     * @var mixed
     */
    private mixed $curPage = 1;

    /**
     * @var mixed
     */
    private mixed $perPage;

    /**
     * @var mixed
     */
    private mixed $search;

    /**
     * @var mixed
     */
    private mixed $sort;

    /**
     * @var mixed
     */
    private mixed $filters;

    /**
     * @var mixed
     */
    private mixed $selectedFields;

    //Apply builder pattern here

    /**
     * @return mixed
     */
    public function getCurPage(): mixed
    {
        return $this->curPage;
    }

    /**
     * @return mixed
     */
    public function getPerPage(): mixed
    {
        return $this->perPage;
    }

    /**
     * @return mixed
     */
    public function getSearch(): mixed
    {
        return $this->search;
    }

    /**
     * @return mixed
     */
    public function getSort(): mixed
    {
        return $this->sort;
    }

    /**
     * @return mixed
     */
    public function getFilters(): mixed
    {
        return $this->filters;
    }

    /**
     * @return mixed
     */
    public function getSelectedFields(): mixed
    {
        return $this->selectedFields;
    }

    /**
     * @param mixed $curPage
     * @return GetListData
     */
    public function setCurPage(mixed $curPage): self
    {
        $this->curPage = $curPage;

        //Resolve current page
        if ($curPage) {
            Paginator::currentPageResolver(static function () use ($curPage) {
                return $curPage;
            });
        }

        return $this;
    }

    /**
     * @param mixed $perPage
     * @return GetListData
     */
    public function setPerPage(mixed $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @param mixed $search
     * @return GetListData
     */
    public function setSearch(mixed $search): self
    {
        $this->search = $search;

        return $this;
    }

    /**
     * @param mixed $sort
     * @return GetListData
     */
    public function setSort(mixed $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param mixed $filters
     * @return GetListData
     */
    public function setFilters(mixed $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @param mixed $selectedFields
     * @return GetListData
     */
    public function setSelectedFields(mixed $selectedFields): self
    {
        $this->selectedFields = $selectedFields;

        return $this;
    }
}
