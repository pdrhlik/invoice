<?php declare(strict_types = 1);

use Codeception\PHPUnit\TestCase;
use Pdrhlik\Invoice\Preview\PreviewFactory;
use Pdrhlik\Invoice\Templates\ParaisoTemplate;

final class TemplateParaisoTest extends TestCase
{

	public function testRenders(): void
	{
		(new ParaisoTemplate())->renderToPdf(PreviewFactory::createOrder());
		(new ParaisoTemplate())->renderToSvg(PreviewFactory::createOrder());
	}

}
