# autoload-sample
php sample using autoload


## how to install other third-party packages
* 
    ```shell
    composer require monolog/monolog
    composer require guzzlehttp/guzzle
    ```


## how to add more custom path
1. open composer.json
2. edit like this
    ```javascript
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
    ```shell
    composer dump-autoload
    ```

> for more composer info, check https://packagist.org/
