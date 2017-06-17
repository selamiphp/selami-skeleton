## Selami Example App Skeleton

### Installation

```bash
composer create-project selami/selami-skeleton myApp
cd myApp
cp config/autoload/local.php.dist config/autoload/local.php
```

### Testing locally

```bash
php -S 127.0.0.1:8080 -t public/
```

### Available routes with the default installation:

* http://127.0.0.1:8080/
* http://127.0.0.1:8080/category/test-category-slug
* http://127.0.0.1:8080/2017/05/test-json-slug


