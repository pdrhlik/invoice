# PHP PDF Invoice generator
This library is a fork of [contributte/invoice](https://github.com/contributte/invoice). It is in active development and the internals will probably change. Once everything is more stable, I will start tagging releases.

## Potential improvements
- Currency handling
- Date/Number formatting
- Improved translations
- Simplified usage
- Better documentation

## Content

- [Setup](#setup)
- [Preview with minimal setup](#preview-with-minimal-setup)
- [Entities](#entities)
- [Data providers](#data-providers)
- [Generating invoices](#generating-invoices)
- [Neon configuration](#neon-configuration)
- [Templates](#templates)

## Preview with minimal setup

```php
use Pdrhlik\Invoice\Preview\PreviewFactory;
use Pdrhlik\Invoice\Templates\ParaisoTemplate;

$template = new ParaisoTemplate();

// pdf
echo $template->renderToPdf(PreviewFactory::createOrder());

// svg
echo $template->renderToSvg(PreviewFactory::createOrder());
```

## Entities

We have following entities: Company (seller), Customer, Account (bank account), Payment Info, Currency, Timestamps, Order and Item.

### Company - seller

```php
use Pdrhlik\Invoice\Data\Company;

$company = new Company("Hory.app", "Liberec", "Žitavská 133/59", "460 01", "Czech Republic", "CZ09504800", "09504800");
```

### Customer

```php
use Pdrhlik\Invoice\Data\Customer;

$customer = new Customer("John Doe", "Los Angeles", "Cavetown", "720 55", "USA", "CZ08304431", "08304431");
```

### Account - bank account

```php
use Pdrhlik\Invoice\Data\Account;

$account = new Account("CZ4208000000001234567890");
```

### Payment info

```php
use Pdrhlik\Invoice\Data\Account;
use Pdrhlik\Invoice\Data\PaymentInformation;

$payment = new PaymentInformation(
    [new Account("CZ4208000000001234567890")],
);
```

### Order

```php
use Pdrhlik\Invoice\Data\Account;
use Pdrhlik\Invoice\Data\Company;
use Pdrhlik\Invoice\Data\Customer;
use Pdrhlik\Invoice\Data\Order;
use Pdrhlik\Invoice\Data\PaymentInformation;
use Pdrhlik\Invoice\Data\Timestamps;

$order = new Order(
    date("Y") . "0001",
    "$ 15.000,00",
    new Company("Hory.app", "Liberec", "Žitavská 133/59", "460 01", "Czech Republic", "CZ09504800", "09504800"),
    new Customer("John Doe", "Los Angeles", "Cavetown", "720 55", "USA", "CZ08304431", "08304431"),
    new PaymentInformation(
        [new Account("CZ4208000000001234567890")],
    ),
    new Timestamps(
        (new DateTime())->format("Y-m-d"),
        (new DateTime("+ 1 week"))->format("Y-m-d"),
    ),
);
```

### Item

```php
use Pdrhlik\Invoice\Data\Item;

$order->addInlineItem("Logitech G700s Rechargeable Gaming Mouse", "$ 1.790,00", 4, "$ 7.160,00");

// or

$order->addItem(new Item("Logitech G700s Rechargeable Gaming Mouse", "$ 1.790,00", 4, "$ 7.160,00"));
```

## Data providers
In most applications we need only one seller and one or more same accounts. We use for them prepared data providers

```php
use Pdrhlik\Invoice\Data\Account;
use Pdrhlik\Invoice\Data\Company;
use Pdrhlik\Invoice\Provider\InvoiceAccountsProvider;
use Pdrhlik\Invoice\Provider\InvoiceCompanyProvider;

$companyProvider = new InvoiceCompanyProvider(new Company(...));
$companyProvider->getCompany();

$accountsProvider = new InvoiceAccountsProvider([
    new Account(...),
]);
$accountsProvider->getAccounts();
$accountsProvider->getAccount();
```

## Generating invoices

```php
header("Content-Type: application/pdf; charset=utf-8");
echo $template->renderToPdf($order);
```

if you use nette, recommended way is

```php
use Pdrhlik\Invoice\Bridge\Nette\Response\InvoicePdfResponse;

class CustomPresenter {

    public function actionPreview() {
        // declare $template and $order

        $this->sendResponse(new InvoicePdfResponse($template, $order));
    }

}
```

## Neon configuration

```neon
extensions:
    invoice: Pdrhlik\Invoice\Bridge\Nette\DI\InvoiceExtension

invoice:
    company:
        name: string
        town: string
        address: string
        zip: string
        country: string
        ## Optional below
        vatNumber: string
        id: string
    accounts:
        -
            iban: string
```

## Templates

## Paraiso
Single page:
![single page](/.docs/img/paraiso.png?raw=true)

Multiple pages:
![multiple pages](/.docs/img/paraiso-paginator.png?raw=true)

Greyscale:
![greyscale](/.docs/img/paraiso-greyscale.png?raw=true)

## Turoiso
Single page:
![single page](/.docs/img/turoiso.png?raw=true)

Greyscale:
![greyscale](/.docs/img/turoiso-greyscale.png?raw=true)
