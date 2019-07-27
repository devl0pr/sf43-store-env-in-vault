# sf43-store-env-in-vault

This will work only symfony 3.4 version.
If you need more information read documention:
https://symfony.com/doc/current/configuration/env_var_processors.html

### Step 0:
Install library

```bash
composer require koshatul/vault
```

### Step 1:
Put .runtime-evaluated.php where you want.

I store it in `config/.runtime-evaluated.php`

### Step 2:

open `config/packages/doctrine.yaml`

and add new PHP_FILE env variable
then modify doctrine fallback variable DATABASE_URL

```yaml
parameters:
    env(PHP_FILE): '../config/.runtime-evaluated.php'
    env(DATABASE_URL): '%env(require:PHP_FILE)%'
```


Now you have to remove DATABASE_URL from .env file because 
variables in the .env file always take precedence over yaml files
