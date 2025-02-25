<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Data;

interface ITimestamps
{

	public function getCreated(): string;

	public function getDueTo(): ?string;

}
