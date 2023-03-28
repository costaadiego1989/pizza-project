###RODANDO O PROJETO NA SUA MÁQUINA###

Faça download do XAMPP em sua máquina e realiza a instalação conforme o recomendado;
Após a instalação do XAMPP, vá até a pasta htdocs e crie uma pasta lá dentro com o nome do projeto;
Abra a pasta no VS CODE e clone o projeto;
Após clonar o projeto em sua máquina, você precisa ter o MySQL instalado em sua máquina.
Crie um banco de dados da seguinte forma: CREATE DATABASE pizzaria;
Crie as seguintes tabelas: 
sabores, status, bordas e massas deverão conter os campos: id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, tipo VARCHAR(50) e ou nome VARCHAR(50);
tabela pizzas: id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, massa_id INT NOT NULL, borda_id INT NOT NULL;
tabela pivot pizza_sabor: id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, pizza_id INT NOT NULL, sabor_id INT NOT NULL;
tabela pedidos: id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, pizza_id INT NOT NULL, status_id INT NOT NULL;

OBS*: Cadastre sabores, bordas e massas para o projeto funcionar corretamente.

E tudo certo para rodar o projeto. Basta acessar: http://localhost/nome_da_pasta/index.php;

Gratidão por realizar o download desse projeto.
