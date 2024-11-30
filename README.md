### Разворачивание проекта

1. Выполнить `git pull git@github.com:IvanKarezin/vozovoz.git` в директорию проекта
2. В корне проекта выполнить `cp .env-dist .env`
3. Заполнить `VZ_BASE_URL` и `VZ_TOKEN`, - https://api.vozovoz.dev возвращал 404, поэтому использовался https://vozovoz.org/api
4. В корне проекта выполнить:
    ```shell
   docker compose up -d 
   docker compose run --rm php composer install
   ```
   
Доступные конечные точки: 

POST: http://localhost:8001/v1/price/get
пример запроса: 

```json
  {
  "volume": "0.01",
  "weight": "0.9",
  "from": {
    "country": "RU",
    "guid": "000385d1-0128-11e5-80c7-00155d903d03",
    "type": "address"
  },
  "to": {
    "country": "RU",
    "guid": "e90f19de-0128-11e5-80c7-00155d903d03",
    "type": "pup"
  }
}
```

POST: http://localhost:8001/v1/location/get
Пример запроса: 
```json
{
   "object": "location",
   "action": "get",
   "params": {
      "search": "Са"
   }
}
```