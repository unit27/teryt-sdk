# GUS TERYT SDK
The library provides a wrapper for GUS TERYT SOAP API.

## Installation

Recommended way of installation is via **composer**
```bash
composer require goosfraba/teryt-sdk
```

## Usage

Create an instance of the API:

```php
use Goosfraba\Teryt\Soap\TerytApiFactory;
use Goosfraba\Teryt\Soap\Dsn;

$factory = new TerytApiFactory();

$dsn = Dsn::prod("your-user", "your-pass");
// or 
$dsn = Dsn::test(); // public test credentials
// or
$dsn = Dsn::parse("gus+teryt://your-user:your-pass@prod"); // your production credentials

$api = $factory->create($dsn);
```

Use API according to their documentation:

```php
use Goosfraba\Teryt\TerytApi;

/** @var TerytApi $api */

$catalogFile = $api->PobierzKatalogSIMCAdr(); // downloads the SIMC catalogue in address version
$fileObject = $catalogFile->dump(); // Dumps the catalogue content into a file \SplFileObject

```

## Supported functions

For know the SDK supports the following functions:

 * CzyZalogowany
 * PobierzDateAktualnegoKatTerc
 * PobierzDateAktualnegoKatNTS
 * PobierzDateAktualnegoKatSimc
 * PobierzDateAktualnegoKatUlic
 * PobierzListeWojewodztw
 * PobierzListePowiatow
 * PobierzListeGmin
 * PobierzGminyiPowDlaWoj
 * PobierzKatalogTERC
 * PobierzKatalogTERCAdr
 * PobierzKatalogNTS
 * PobierzKatalogSIMCAdr
 * PobierzKatalogSIMC
 * PobierzKatalogSIMCStat
 * PobierzKatalogULIC
 * PobierzKatalogULICAdr
 * PobierzKatalogULICBezDzielnic
 * PobierzKatalogWMRODZ
 * PobierzSlownikRodzajowJednostek
 * PobierzSlownikCechULIC
 * PobierzSlownikRodzajowSIMC

Feel free to contrubute and add support for more functions.
