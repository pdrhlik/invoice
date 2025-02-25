<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data;

interface IAccount
{

	public function getIban(): ?string;

}
