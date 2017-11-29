titulo_quest=tituloquest
id_user=55
titulo_perg1=aaaaaaaaa
&txt_alt1=resp1,1
&txt_alt2=resp2
&txt_alt3=resp3
&titulo_perg2=bbbbbbbbb
&txt_alt1=resp4
&txt_alt2=resp5

titulo_perg1=aaaaaaa
&txt_alt1%2C15=resp1
&txt_alt2%2C15=resp2
&titulo_perg2=bbbbbbbbbbbbb
&txt_alt1%2C16=resp4
&txt_alt2%2C16=resp5#

$index_perguntas = $_SESSION["index_pergunta"];


for(int i = 1 ; i <=$index_perguntas ; i++){
	$sequencia = i;
	$titulo_pergunta = $_GET["titulo_perg".i];
	$num_alternativas = $_GET["tam".i];
	//salva pergunta
	for(int j = 1 ; j <= $num_alternativas; j++){

		$txt_alternativa = $_GET["txt_alt".j.",".i];
		//salva alternativa
	}

}