<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates;

use Pdrhlik\Invoice\Data\IOrder;

interface ITemplate
{

	public function renderToPdf(IOrder $order): string;

	public function renderToSvg(IOrder $order): string;

}
