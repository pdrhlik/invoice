<?php declare(strict_types = 1);

namespace Contributte\Invoice\Templates\Template;

use Contributte\Invoice\Data\Extension\IDiscount;
use Contributte\Invoice\Data\IOrder;
use Contributte\Invoice\Templates\Translator\ITranslator;

abstract class TemplateObject
{

	public function __construct(
		protected IOrder $order,
		protected ITranslator $translator,
	)
	{
	}

	public function getOrder(): IOrder
	{
		return $this->order;
	}

	public function getTranslator(): ITranslator
	{
		return $this->translator;
	}

	public function translate(string $message): string
	{
		return $this->translator->translate($message);
	}

	public function formatMoneyCallback(): callable
	{
		return fn (string $money) => $this->order->getCurrency()->toString($money);
	}

}
