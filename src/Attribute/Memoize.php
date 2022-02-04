<?php

namespace Rikudou\MemoizeBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final class Memoize
{
    /**
     * @readonly
     */
    public ?int $seconds = null;
    public function __construct(?int $seconds = null)
    {
        $this->seconds = $seconds;
    }
}
