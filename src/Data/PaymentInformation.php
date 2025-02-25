<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data;

class PaymentInformation implements IPaymentInformation
{

	/**
	 * @param IAccount[] $accounts
	 */
	public function __construct(
		private array $accounts = [],
	)
	{
	}

	/**
	 * @return IAccount[]
	 */
	public function getAccounts(): array
	{
		return $this->accounts;
	}

	public function getFirstAccount(): ?IAccount
	{
		return $this->accounts[array_key_first($this->accounts)] ?? null;
	}

}
