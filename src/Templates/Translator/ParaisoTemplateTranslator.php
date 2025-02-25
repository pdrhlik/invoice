<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates\Translator;

final class ParaisoTemplateTranslator extends Translator {

	public function __construct(string $lang = "en") {
		$this->addLanguage("en", [
			"invoice" => "INVOICE",
			"discount" => "Discount",
			"paymentInfo" => "Payment Info",
			"totalPrice" => "Total price",
			"seller" => "Seller",
			"customer" => "Customer",
			"crn" => "Company registration number",
			"total" => "Total",
			"item" => "Item",
			"unitPrice" => "Unit price",
			"quantity" => "Quantity",
			"vatNumber" => "VAT Number",
			"nonVatPayer" => "Non-VAT payer",
			"invoiceNumber" => "Invoice Number",
			"issueDate" => "Issue date",
			"dueDate" => "Due date",
			"accountNumber" => "Account number",
			"iban" => "IBAN",
			"variableSymbol" => "Variable symbol",
			"constantSymbol" => "Constant symbol",
			"specificSymbol" => "Specific symbol",
		]);

		$this->addLanguage("cs", [
			"invoice" => "Faktura",
			"discount" => "Sleva",
			"paymentInfo" => "Platební informace",
			"totalPrice" => "Celková částka",
			"seller" => "Prodávající",
			"customer" => "Odběratel",
			"crn" => "IČ",
			"total" => "Celkem",
			"item" => "Položka",
			"unitPrice" => "Cena za ks",
			"quantity" => "Počet",
			"vatNumber" => "DIČ",
			"nonVatPayer" => "Neplátce DPH",
			"invoiceNumber" => "Číslo faktury",
			"issueDate" => "Datum vystavení",
			"dueDate" => "Datum splatnosti",
			"accountNumber" => "Číslo účtu",
			"iban" => "IBAN",
			"variableSymbol" => "Variabilní symbol",
			"constantSymbol" => "Konstantní symbol",
			"specificSymbol" => "Specifický symbol",
		]);

		$this->addLanguage("de", [
			"invoice" => "Rechnung",
			"discount" => "Rabatt",
			"paymentInfo" => "Zahlungsinformationen",
			"totalPrice" => "Gesamtpreis",
			"seller" => "Verkäufer",
			"customer" => "Abonnent",
			"crn" => "USt-IdNr",
			"total" => "Gesamt",
			"item" => "Artikel",
			"unitPrice" => "Preis pro Artikel",
			"quantity" => "Menge",
			"vatNumber" => "Steuernummer",
			"nonVatPayer" => "MwSt. nicht registriert",
			"invoiceNumber" => "Rechnungsnummer",
			"issueDate" => "Datum",
			"dueDate" => "Fälligkeitsdatum",
			"accountNumber" => "Kontonummer",
			"iban" => "IBAN",
			"variableSymbol" => "Variabler Verwendungszweck",
			"constantSymbol" => "Konstanter Verwendungszweck",
			"specificSymbol" => "Spezifischer Verwendungszweck",
		]);

		$this->addLanguage("sk", [
			"invoice" => "Faktúra",
			"discount" => "Zľava",
			"paymentInfo" => "Platebné informácie",
			"totalPrice" => "Celková suma",
			"seller" => "Predávajúci",
			"customer" => "Odberateľ",
			"crn" => "IČ",
			"total" => "Spolu",
			"item" => "Položka",
			"unitPrice" => "Cena za položku",
			"quantity" => "Množstvo",
			"vatNumber" => "DIČ",
			"nonVatPayer" => "Neplatca DPH",
			"invoiceNumber" => "Číslo faktúry",
			"issueDate" => "Dátum vystavenia",
			"dueDate" => "Dátum splatnosti",
			"accountNumber" => "Číslo účtu",
			"iban" => "IBAN",
			"variableSymbol" => "Variabilný symbol",
			"constantSymbol" => "Konštantný symbol",
			"specificSymbol" => "Špecifický symbol",
		]);

		$this->addLanguage("pl", [
			"invoice" => "Faktura",
			"discount" => "Rabat",
			"paymentInfo" => "Informacje o płatności",
			"totalPrice" => "Cena całkowita",
			"seller" => "Sprzedawca",
			"customer" => "Odbiorca",
			"crn" => "REGON",
			"total" => "Razem",
			"item" => "Pozycja",
			"unitPrice" => "Cena za pozycję",
			"quantity" => "Ilość",
			"vatNumber" => "NIP",
			"nonVatPayer" => "Brak rejestracji VAT",
			"invoiceNumber" => "Numer faktury",
			"issueDate" => "Data wystawienia",
			"dueDate" => "Termin płatności",
			"accountNumber" => "Numer konta",
			"iban" => "IBAN",
			"variableSymbol" => "Symbol zmienny",
			"constantSymbol" => "Symbol stały",
			"specificSymbol" => "Symbol specyficzny",
		]);

		parent::__construct($lang);
	}

}
