# Plugin instalador de aplicações para lliure

No composer.json defina o type da aplicação como *lliure-app*

```json
"type": "lliure-app"
```

Defina em **extra** a pasta em que ficará sua aplicação

```json
"extra": {
    "lliure": {
      "targetPath": "Auth"
    }
  }
```
