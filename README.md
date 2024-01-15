<div align="center">
  <a href="https://swyftpay.io" target="_blank">
  <picture>
    <source media="(prefers-color-scheme: dark)" srcset="https://avatars.githubusercontent.com/u/108650375?s=200&v=4">
    <img src="https://avatars.githubusercontent.com/u/108650375?s=200&v=4" width="60" alt="Logo"/>
  </picture>
  </a>
</div>

<h1 align="center">PHP Client for Swyftpay</h1>

<p align="center">
    <br />
    <a href="https://docs.swyftpay.io" rel="dofollow"><strong>Explore the docs »</strong></a>
    <br />
 </p>
  
<p align="center">  
    <a href="https://twitter.com/swyftpay_io">X (Twitter)</a>
    ·
    <a href="https://www.linkedin.com/company/swervltd">Linkedin</a>
    ·
    <a href="https://docs.swyftpay.io/changelog">Changelog</a>
</p>

# Installation

PHP 7.2+ and Composer are required.

To get the latest version of Novu PHP SDK, simply require it:

```bash
$ composer require swervpaydev/sdk
```

# Configuration

Import the Swyftpay class and create a new instance with your secret_key and business_id:

```php
use Swervpaydev\SDK\Swyftpay;

$config = [
    'secret_key' => '<SECRET_KEY>',
    'business_id' => '<BUSINESS_ID>'
];

$swyftpay = new Swyftpay($config);
```

Replace <SECRET_KEY> and <BUSINESS_ID> with your actual secret key and business ID.
