# UWUM-Client-Lite
A simplified PHP client for Unified [WeGovNow](http://wegovnow.eu) User Management (UWUM) oAuth2.0


[![Issues](https://img.shields.io/github/issues/Infalia/UWUM-Client-Lite.svg?style=flat-square)](https://github.com/infalia/UWUM-Client-Lite/issues)
[![Source Code](http://img.shields.io/badge/source-infalia/UWUM--Client--Lite-blue.svg?style=flat-square)](https://github.com/infalia/UWUM-Client-Lite)
[![Latest Version](https://img.shields.io/github/release/infalia/UWUM-Client-Lite.svg?style=flat-square)](https://github.com/infalia/UWUM-Client-Lite/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/infalia/UWUM-Client-Lite/blob/master/LICENSE)

## Requirements

The following versions of PHP are supported.

* PHP >= 5.5

## Dependencies

[OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client)

## Prerequisites

**1) Availability of application via IPv4**

The client application is available via a defined URL using IPv4.

**2) Availability of application via IPv6**

The client application is also available using IPv6.

```
You can validate your URL with the following service 
http://ipv6-test.com/validate.php?url=https://<your domain>
```

> For example:
> [http://ipv6-test.com/validate.php?url=https://wegovnow.infalia.com/](http://ipv6-test.com/validate.php?url=https://wegovnow.infalia.com/)


**3) Serving via HTTPS**

The client application service is encrypted via HTTPS.

> **Note**

> DO NOT confuse the SSL certificate for HTTPS with the X.509 certificate needed for the communication of UWUM-Clients with UWUM (see 4)

**4) X.509 certificate for client identification**

i) Create a certificate signing request (CSR) with your details

```
CN of the certificate signing request (CSR) should be like "wegovnow.infalia.com" (change accordingly)
```

To create a CSR (given that you are using openssl):

``` bash
openssl req -out wegovnow.infalia.com-uwum.csr -new -newkey rsa:2048 -nodes -keyout wegovnow.infalia.com-uwum.key
```

ii) Submit CSR to the UWUM Certificate Authority to be signed

> Please send **only** the .csr file, the .key file should stay your secret

iii) UWUM Certificate Authority will then create an application record in the UWUM testing system for your
application and verify your client_id. 

> Your client_id is actually the CN declared in the CSR

iv) UWUM Certificate Authority will send over the signed CRT (.crt) file

You need to create a combined .pem file out of the certificate .key file and the certificate .crt file using the following command (as an example):

``` bash 
cat wegovnow.infalia.com-uwum.crt wegovnow.infalia.com-uwum.key > wegovnow.infalia.com-uwum.pem
```
> **Note**

> Please ensure to place the .pem file outside the web directory, so it is not exposed to the public

**5) Inform UWUM Certificate Authority of your callback URL**

```
e.g. https://wegovnow.infalia.com/oauth2_callback.php
```

> **Note**

> Setting a priori the callback URL should change in the next UWUM update.
> Callback URL should be set by client on demand


## Install

Via Composer

``` bash
$ composer require league/oauth2-client
```

## License

The MIT License (MIT). Please see [License File](https://github.com/infalia/UWUM-Client-Lite/blob/master/LICENSE) for more information.
