
# Laravel - Pagamento Recorrente com MOIP

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/endsalone/laravel-moip-recorrente/downloads)](https://packagist.org/packages/endsalone/laravel-moip-recorrente)
[![Latest Stable Version](https://poser.pugx.org/endsalone/laravel-moip-recorrente/v/stable)](https://packagist.org/packages/endsalone/laravel-moip-recorrente)
[![Latest Unstable Version](https://poser.pugx.org/endsalone/laravel-moip-recorrente/v/unstable)](https://packagist.org/packages/endsalone/laravel-moip-recorrente)
[![License](https://poser.pugx.org/endsalone/laravel-moip-recorrente/license)](https://packagist.org/packages/endsalone/laravel-moip-recorrente)

Pacote de integração do MOIP ASSINATURAS v1.5 com Laravel.

## Instale via composer
    
    composer require endsalone/laravel-moip-recorrente
    
## Retorno padrão do pacote

> O pacote sempre retorna um json como no exemplo abaixo:
   
    {
     "content": {
     "creation_time": "00:00:00",
     "code": "1494410000",
     "address": {
       "zipcode": "08391000",
       "number": "04",
       "country": "BRA",
       "city": "São Paulo",
       "street": "Rua Jamaica",
       "district": "Parque das Flores",
       "state": "SP",
       "complement": ""
    },
    "birthdate_year": 1991,
    "creation_date": "10/05/2017",
    "birthdate_month": "06",
    "billing_info": {
      "credit_cards": [{
          "first_six_digits": "411111",
          "expiration_year": "18",
          "expiration_month": "04",
          "last_four_digits": "1111",
          "brand": "VISA",
          "vault": "d695d032-b40f-4e16-ac09-49ac7339f90b",
          "holder_name": "PROPRIETARIO CARTAO"
      }]
     },
     "cpf": "12312312322",
     "phone_number": "22224444",
     "fullname": "Ernandes Guedes",
     "birthdate_day": 8,
     "email": "example@example.org",
     "phone_area_code": "11"
     },
     "status": 200 
    }

> O indice content retorna o json do moip, já o indice status retorna o status code obtido do MOIP API
     
     {
        "content": {},
        "status": 404
      }


## Wiki do Pacote

Veja todos os detalhes de uso pelo [WIKI](https://github.com/endsalone/laravel-moip-recorrente/wiki).

## Documentação MOIP

Não esqueça de ler a documentação do MOIP para melhor compreender as requisições do [MOIP v1.5](https://dev.moip.com.br/v1.5/reference#listar-planos).

