# Review

## Инструкция по установке
Согласно инструкции по установке мне не удалось выполнить миграции, пока я не создал базу и не прописал доступы в `.env`

## Coding standarts

- Код сложно воспринимается ввиду имен переменных вроде `shorturl` и `originalurl`. Необходимо придерживаться какого-либо стандарта (Snake case or Camel case). 
Более подробно о стандартах можно прочесть [тут](https://siderlabs.com/blog/5-php-coding-standards-you-will-love-and-how-to-use-them-adf6a4855696/)

- В коде не должно быть закомментированных отладочных моментов:

```php
 // dd($visits);

 /* echo "<pre>";
 print_r($visits);
 echo "<pre>"; */
```

## Implementation

- Null pointer - нет проверок на null при вызове методов, которые могут вернуть null: `request()->ip()`, `request()->getHost()`
- Unique value check - В базе данных, в таблице `urls` поле `shorturl` указано как `unique` однако, при создании записи, нет проверки на существование значения в таблице.
- Не соблюдена [Eloquent Model Conventions](https://laravel.com/docs/8.x/eloquent#eloquent-model-conventions)
- Размера поля originalurl для таблицы urls не достаточно для указания урлов длиннее размера поля. При попытке вбить длинный урл выдает ошибку: `String data, right truncated: 1406 Data too long for column 'originalurl'`.
- В методе UrlController::show нет проверки на получение данных из бд. Если я запрашиваю не существующий url, то нужно это обработать - показать 404 ошибку или другим способом.
- Не понятно для чего создан `VisitRequest`

## Resume
Задача реализована очень слабо.
