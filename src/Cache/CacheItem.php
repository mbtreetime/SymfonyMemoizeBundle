<?php

namespace Rikudou\MemoizeBundle\Cache;

use DateInterval;
use DateTimeInterface;
use LogicException;
use Psr\Cache\CacheItemInterface;

final class CacheItem implements CacheItemInterface
{
    /**
     * @var bool|null
     */
    private $isHit;
    /**
     * @var string
     */
    private readonly $key;
    /**
     * @var mixed
     */
    private $value = null;
    /**
     * @param mixed $value
     */
    public function __construct(string $key, $value = null)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->value;
    }

    public function isHit(): bool
    {
        return (bool) $this->isHit;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function set($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function expiresAt(?DateTimeInterface $expiration)
    {
        return $this;
    }

    /**
     * @param \DateInterval|int|null $time
     * @return $this
     */
    public function expiresAfter($time)
    {
        return $this;
    }

    /**
     * @internal
     */
    public function setIsHit(bool $isHit): void
    {
        if ($this->isHit !== null) {
            throw new LogicException('This method can only be called once and has already been called');
        }

        $this->isHit = $isHit;
    }
}
