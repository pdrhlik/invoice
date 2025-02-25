<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data\Extension;

interface IPriceWithTax
{

	public function getPriceBeforeTax(): string;

	public function getTax(): string;

}
