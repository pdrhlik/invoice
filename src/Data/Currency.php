<?php declare(strict_types = 1);

namespace Contributte\Invoice\Data;

final class Currency implements ICurrency
{

	public function __construct(
		private string $currency,
		private string $template = ':currency:price',
	)
	{
	}

	public function getCurrency(): string
	{
		return $this->currency;
	}

	public function toString(string $price): string
	{
		return strtr($this->template, [
			':currency' => $this->currency,
			':price' => $price,
		]);
	}

}
