# uppersoft
# Programa de cadastro de membros de igrejas

##Sobre o repositório:

Esse repositório consiste em um sistema de cadastro de igrejas e membros. Para faze-lo utilizei o framework PHP symfony, banco de dados MySQL, composer e xampp. O
sistema carece de algumas sofisticações principalmente na parte visual pois é a minha primeira vez utilizando tanto php quanto symfony, tive problemas para utilizar 
o CSS e para fazer algumas querys especificas pelo código PHP. Apesar da simplicidade, o CRUD está funcional, ele lista, edita, cria, exclui e exibe. Ainda estou 
aprendendo sobre o Framework e a linguagem, vou atualizar o repositório assim que eu tiver maior compreensão das quais.

##Forma de uso:

Para que o programa funcione corretamente é necessário que se altere a linha 30 do arquivo .env para que seja feita a conexão de maneira correta com o banco de dados.
Depois da alteração, crie a base de dados, quando o servidor for inicializado ele criará todas as tabelas sozinho.

para inicializar o servidor, caminhe até o local do arquivo e utilize o comando no powershell "symfony server:start".

para acessar a pagina "Membro" ou "Igreja", utilize a rota com o nome ex: "http://127.0.0.1:8000/membro/".
