<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Bridge\Nette\Response;

use Pdrhlik\Invoice\Data\IOrder;
use Pdrhlik\Invoice\Templates\ITemplate;
use Nette\Application\Response;
use Nette\Http\IRequest;
use Nette\Http\IResponse;

final class InvoicePdfResponse implements Response
{

	public function __construct(
		private ITemplate $template,
		private IOrder $order,
	)
	{
	}

	public function send(IRequest $httpRequest, IResponse $httpResponse): void
	{
		$httpResponse->setContentType('application/pdf', 'utf-8');

		echo $this->template->renderToPdf($this->order);
	}

}
