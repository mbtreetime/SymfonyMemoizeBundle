<?php

namespace Rikudou\MemoizeBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
final class NoMemoize
{
}
