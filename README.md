## Whalar Test

Implement a RESTful API to manage the list of the characters present on Game of Thrones.


## Installation

Clone the public repo.

```
git clone git@github.com:rafa1944/whalar-test.git
cd whalar-test
composer install
vendor/laravel/sail/bin/sail up -d
vendor/laravel/sail/bin/sail artisas migrate
vendor/laravel/sail/bin/sail artisan db:seed
```

## API RESTful endpoints

First, you need Insomnia client:

```
https://insomnia.rest/download
```

Now, you can import from Insomnia this file from the root of the project:

```
Insomnia_2021-05-17.json
```

## Testing

Just execute from command line:

```
composer test
```


