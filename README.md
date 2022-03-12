# Plugin instalador de aplicações para lliure

1 - No `composer.json` de seu pacote, defina o type com um dos valores abaixo conforme a sua necessidade:

- **lliure-app:** para aplicações
```json
"type": "lliure-app"
```

- **lliure-opt:** para OPTs
```json
"type": "lliure-opt"
```

- **lliure-api:** para APIs
```json
"type": "lliure-api"
```

2 - Defina em **extra** a pasta em que ficará sua aplicação

```json
"extra": {
    "lliure": {
      "targetPath": "MinhaLib"
    }
  }
```

***IMPORTANTE:*** O valor de *"targetPath"* deve começar com uma letra maiúscula e não pode conter caracteres especiais ou espaços.