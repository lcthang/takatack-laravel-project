<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Configuration
- Database connection is on port 3307

## Public APIs
##### Get a wallet detail and its transactions of the only email john@wallet.io
```
URL: GET /wallet
```

##### Create a transaction for the only email john@wallet.io
```
URL: POST /wallet/transaction
Content-Type: application/json
```

```
Request body: (JSON body)
{
	"type": "credit",
	"amount": 0
}

"type" is either "credit" (adding) or "debit" (deducting)
```

## Admin APIs
##### Create a new wallet
```
URL: POST /admin/wallet
Content-Type: application/json
Header: "x-auth-key => Zioj23D92j2kGf9D"
```
```
Request body: (JSON body)
{
	"email": "test@wallet.io"
}
```

##### Get a wallet and three of the most recent transactions by a specific email
```
URL: GET /admin/wallet/{email}
```

##### Delete a wallet by a specific email
```
URL: DELETE /admin/wallet/{email}
```

##### Files worked on:
Http:
- TransactionController.php
- WalletController.php
- AdminMiddleware.php
- Kernel.php
- Transaction.php
- Wallet.php

Config:
- app.php
- database.php

Database:
- Design schema for "wallets" and "transactions" table
- Create seeds for john@wallet.io & its transactions

Routes:
- api.php

- Change .env

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
