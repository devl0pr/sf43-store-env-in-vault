<?php
require dirname(__DIR__).'/vendor/autoload.php';

use Koshatul\Vault\Vault;
use Koshatul\Vault\VaultURI;
use Koshatul\Vault\VaultAuthToken;

$vaultURI = new VaultURI("http://example-vault-server.com/v1/");
$vaultAuthToken = new VaultAuthToken("YOUR_VAULT_AUTH_TOKEN");
$vault = new Vault($vaultURI, $vaultAuthToken);

$testValue = $vault->read('secret/smb_local');

$dbParams = $testValue->get();

return 'pgsql://'.$dbParams['dbuser'].':'.$dbParams['dbpass'].'@127.0.0.1:5432/coredb';
