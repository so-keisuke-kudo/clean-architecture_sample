[![phpunit](https://github.com/so-keisuke-kudo/clean-architecture_sample/actions/workflows/phpunit.yaml/badge.svg)](https://github.com/so-keisuke-kudo/clean-architecture_sample/actions/workflows/phpunit.yaml)  

```
├── app
│   ├── Console
│   ├── Exceptions
│   ├── Http
│   │   ├── Controllers
│   │   ├── Middleware
│   │   └── Requests
│   ├── Infrastructure # インフラ層 ( Repository の実装)
│   ├── Models
│   ├── Providers
│   └── UseCase # ユースケース層
├── bootstrap
├── config
├── database
├── docker
├── domain # ドメイン層
│   ├── Entities
│   ├── Exceptions
│   ├── Repositories
│   ├── Services
│   └── ValueObjects
├── public
├── resources
├── routes
├── src
├── storage
└── tests
```
