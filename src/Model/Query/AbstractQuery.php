<?php

declare(strict_types=1);

namespace App\Model\Query;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractQuery.
 */
abstract class AbstractQuery
{
    protected const PER_PAGE = 20;
    protected const FIRST_PAGE = 1;

    /**
     * @var int|null
     *
     * @Assert\GreaterThanOrEqual(1)
     */
    protected $page;

    /**
     * @var int|null
     *
     * @Assert\Range(min="1", max="100")
     */
    protected $perPage;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page ?? static::FIRST_PAGE;
    }

    /**
     * @param int $page
     */
    public function setPage(?int $page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage ?? static::PER_PAGE;
    }

    /**
     * @param int|null $perPage
     *
     * @return $this
     */
    public function setPerPage(?int $perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstResult(): int
    {
        return $this->getPerPage() * ($this->getPage() - 1);
    }
}
