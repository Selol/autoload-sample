# autoload-sample
php sample using autoload

## install components
``` {.sourceCode .shell}
composer install
```
## enjoy autoload
``` {.sourceCode .shell}
php index.php
./vendor/bin/phpunit
```
## add more third-party packages
``` {.sourceCode .shell}
composer require monolog/monolog
composer require guzzlehttp/guzzle
```

## add more custom path
1. open composer.json
2. edit like this
    ```{.sourceCode .javascript}
    {
        "autoload": {
            "psr-4": {
                "MyCompany\\MyApp\\": "app/"
                "MyCompany\\MyNewApp\\": "new_app/" // add this for class
            },
            "files": [
                "app/Support/helpers.php"  // for funtion
            ]
        }
    }
    ```
3. run this command
    ``` {.sourceCode .shell}
    composer dump-autoload
    ```

> for more composer info, check https://packagist.org/
