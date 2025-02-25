<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data;

class Account implements IAccount
{

	public function __construct(
		private ?string $iban = null,
	)
	{
	}

	public function getIban(): ?string
	{
		return $this->iban;
	}

}
