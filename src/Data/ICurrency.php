<?php declare(strict_types = 1);

namespace Contributte\Invoice\Data;

interface ICurrency
{

	public function toString(string $price): string;

}
