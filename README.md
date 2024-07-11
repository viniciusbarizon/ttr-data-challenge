## CHALLENGE NOT FINISHED ##

## Challenge

O desafio é um exemplo de algo que tivemos que implementar recentemente e que serve também como um exemplo do que seria
a experiencia na nossa empresa. Muitas vezes temos integrações com APIs super completas e outras vezes são integrações
mais tradicionais como este caso.

Em anexo estão dois CSV com dados.
Dados.csv com os dados mais recentes
DadosAntigos.csv com dados anteriores.

O objectivo é implementar uma pagina super simples com 2 botões de upload onde é possível fazer upload dos ficheiros.
Como output deverá ser dado a diferença entre os dois CSVs. Dizer quais são as linhas que existem nos dois ficheiros e
que são exatamente iguais... quais são as linhas que já existiam mas foram atualizadas e quais são as linhas novas que
foram adicionadas.

Deverá ser implementado em PHP com a framework que preferires (preferencialmente.. mas caso seja impeditivo, podes não
usar framework). A qualidade da interface gráfica não importa. O objectivo aqui é perceber como o candidato pensa, de
que forma 'ataca' o problema e como estrutura o código.

## Tech

- [Herd](https://herd.laravel.com/);
- [DBngin](https://dbngin.com/);
- [Laravel 11](https://laravel.com/);
- [PHP 8.3](https://www.php.net/);
- [Pest PHP 2](https://pestphp.com/);
- [Git](https://www.git-scm.com/);
- [GitHub](https://github.com/);
- [tailwindcss](https://tailwindcss.com/);
- [Laravel Dusk](https://laravel.com/docs/11.x/dusk);
- [Activity Log](https://spatie.be/docs/laravel-activitylog/v4/introduction);
- [TDD](https://en.wikipedia.org/wiki/Test-driven_development);
- [League CSV](https://csv.thephpleague.com/);
- [Debugbar for Laravel](https://github.com/barryvdh/laravel-debugbar).

## Setup commands

- npm install;
- npm run dev;
- composer install;
- php artisan migrate;
- php artisan storage:link.

## Actions

<a href="https://freek.dev/1371-refactoring-to-actions">Refactoring to actions</a>.

## Back-end tests with Pest

vinicius@ViniciussLaptop ttr-data-challenge % php artisan test

   PASS  Tests\Unit\CompareDataActionTest
  ✓ it expects equals when we repeat a line in the recent data                                                                                        0.01s  
  ✓ it expects new when we create a line in the recent data
  ✓ it expects updated when we changed a line in the recent data

   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\ExampleTest
  ✓ it returns a successful response                                                                                                                  0.06s  

  Tests:    5 passed (5 assertions)
  Duration: 0.13s

## Front-end tests with Dusk

vinicius@ViniciussLaptop ttr-data-challenge % php artisan dusk

   PASS  Tests\Browser\IndexTest
  ✓ it has the correct title                                                                                                                          0.67s  
  ✓ it has the compare text                                                                                                                           0.04s  
  ✓ it has the form with the correct attributes                                                                                                       0.07s  
  ✓ it has the token in the form                                                                                                                      0.04s  
  ✓ it has the recent data input with the correct attributes                                                                                          0.07s  
  ✓ it has the old data input with the correct attributes                                                                                             0.07s  
  ✓ it has the submit button with the correct attributes                                                                                              0.06s  

  Tests:    7 passed (45 assertions)
  Duration: 1.15s
