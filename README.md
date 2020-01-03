# Pdv
Um sistema PDV para bares e restaurantes que roda em servidor local e faz integração com aplicativo web view!

O SISTEMA FOI DESENVOLVIDO COM SEPARAÇÃO DE PASTAS "SEMELHANTE" AO MODELO 'MVC' - não é MVC mas sim separado por pastas Model, View e Common!

A instalação é simples, crie uma tabela chamada "pdv" (sem as aspas) importe o arquivo pdv.SQL, o arquivo criará as tabelas automaticamente
suba o servidor e acesse - http://localhost/pdv - crie um usuário na pagina inicial, logue no sistema, aproveite!
Com o app intalado no smartphone (lembre-se de permitir aplicativos de terceiros no seu celular!) conecte na mesma rede wi-fi de seu computador
acesse as configurações do app e insira o seu endereço ipv4 (esse endereço pode ser acessado através do comando ipconfig no terminal do windows) 
confirme, posteriormente clique em conectar faça login, veja a disposição das mesas no seu app, a partir desse ponto voçê tem acesso ao sistema 
atravez do app, voçê pode adicionar e consultar os pedidos das mesas atravez do app!

O Arquivo de conexão localizado em: pdv/MVC/MODEL/conexao.php , está configurado da sguinte forma:

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "pdv";
  
Altere esses parâmtros se voce definiu outros valores no seu banco de dados!
![pdv](https://github.com/Dev-Rafael-Vieira/Pdv/blob/master/pdv-images/1.bmp)
![pdv](https://github.com/Dev-Rafael-Vieira/Pdv/blob/master/pdv-images/2.bmp)
![pdv](https://github.com/Dev-Rafael-Vieira/Pdv/blob/master/pdv-images/4.bmp)
![pdv](https://github.com/Dev-Rafael-Vieira/Pdv/blob/master/pdv-images/5.bmp)
![pdv](https://github.com/Dev-Rafael-Vieira/Pdv/blob/master/pdv-images/6.bmp)
