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

####

<b>Tecnologias utilizadas:</b>

1) <a href="https://herd.laravel.com/">Herd</a>;
2) <a href="https://dbngin.com/">DBngin</a>;
3) <a href="https://laravel.com/">Laravel 11</a>;
4) <a href="https://www.php.net/">PHP 8.3</a>;
5) <a href="https://pestphp.com/">Pest 2</a>;
6) <a href="https://www.git-scm.com/">Git</a>;
7) <a href="https://github.com/">GitHub</a>;
8) <a href="https://tailwindcss.com/">tailwindcss</a>;
9) <a href="https://laravel.com/docs/11.x/dusk">Laravel Dusk</a>;

####

Setup commands:

1) npm install;
2) npm run dev;
3) composer install;
4) php artisan migrate;
5) php artisan storage:link;
