<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data\International\Czech;

use Pdrhlik\Invoice\Data\Account;
use Pdrhlik\Invoice\Data\Extension\IConstantSymbol;
use Pdrhlik\Invoice\Data\Extension\ISpecificSymbol;
use Pdrhlik\Invoice\Data\Extension\IVariableSymbol;
use Pdrhlik\Invoice\Data\PaymentInformation;

final class CzechPaymentInformation extends PaymentInformation implements IVariableSymbol, ISpecificSymbol, IConstantSymbol
{

	/**
	 * @param Account[] $accounts
	 */
	public function __construct(
		array $accounts = [],
		private ?string $variableSymbol = null,
		private ?string $specificSymbol = null,
		private ?string $constantSymbol = null,
	)
	{
		parent::__construct($accounts);
	}

	public function getVariableSymbol(): ?string
	{
		return $this->variableSymbol;
	}

	public function getSpecificSymbol(): ?string
	{
		return $this->specificSymbol;
	}

	public function getConstantSymbol(): ?string
	{
		return $this->constantSymbol;
	}

}
