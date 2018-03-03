
/******************************
* criando container
*
*******************************/
o comando abaixo é para criar um container. no caso foi criado um container com o nome de 
saldo_database baseado no mysql e com senha root. foi feito o mapeamento da porta
3306 do container com a porta 3306 do mysql 
=> docker run --name saldo_database -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 -d mysql


/******************************
* executando container
*
*******************************/
comando para executar o container saldo_database que foi criado sobre a
imagem do mysql, na linha abaixo  -p vai pedir a senha root

=> docker exec -it saldo_database mysql -p
