# Projet R2
## Utiliser PHP et CLOUDFLARE R2 pour stocker des fichiers
1. Créer un compte sur Cloudflare
2. Storage & databases > R2 Object Storage 
3. Créer un projet sur VS CODE

```
composer require aws/aws-sdk-php 
composer require vlucas/phpdotenv
```
Récuperer ces informations après la création du compte R2. 
- $accountId = "TON_ACCOUNT_ID";
- $accessKey = "TON_ACCESS_KEY";
- $secretKey = "TON_SECRET_KEY";
- $bucketName = "mon-bucket";