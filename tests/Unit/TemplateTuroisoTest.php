<?php declare(strict_types = 1);

use Codeception\PHPUnit\TestCase;
use Pdrhlik\Invoice\Preview\PreviewFactory;
use Pdrhlik\Invoice\Templates\TuroisoTemplate;

final class TemplateTuroisoTest extends TestCase
{

	public function testRenders(): void
	{
		(new TuroisoTemplate())->renderToPdf(PreviewFactory::createOrder());
		(new TuroisoTemplate())->renderToSvg(PreviewFactory::createOrder());
	}

}
