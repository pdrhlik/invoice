<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data;

interface IPaymentInformation
{

	/**
	 * @return Account[]
	 */
	public function getAccounts(): array;

	public function getFirstAccount(): ?IAccount;

}
