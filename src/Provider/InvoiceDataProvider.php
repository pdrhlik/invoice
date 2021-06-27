<?php declare(strict_types = 1);

namespace Contributte\Invoice\Provider;

use Contributte\Invoice\Data\IAccount;
use Contributte\Invoice\Data\ICompany;
use Contributte\Invoice\Data\ICurrency;

final class InvoiceDataProvider
{

	/**
	 * @param IAccount[] $accounts
	 */
	public function __construct(
		private ICompany $company,
		private array $accounts = [],
		private ?ICurrency $currency = null,
	)
	{
	}

	public function getCompany(): ICompany
	{
		return $this->company;
	}

	/**
	 * @return IAccount[]
	 */
	public function getAccounts(): array
	{
		return $this->accounts;
	}

	public function getCurrency(): ?ICurrency
	{
		return $this->currency;
	}

}
