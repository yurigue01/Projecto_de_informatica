
<!DOCTYPE html>
<body lang="pt-br">
<head>
<meta charset="utf-8">
</head>
<body>
<?php
include_once("config.php");

$arquivo = $_FILES['arquivo']['name'];

//pasta onde o arquivo vai ser salvo

$_UP['pasta']= 'imagem/';

//tamanho maximo da imagem
$_UP['tamanho'] = 1024*1024*100; //5mb

//Array com extensoes permitida

$_UP['extensoes'] = array ('png','jpg', 'jpeg', 'gif');

//Renomia

$_UP['renomea'] = false;


//array de erros
$_UP['erros'][0]= 'nao houve erro';
$_UP['erros'][1]= 'o arquivo no uplod é maior que o limete do php';
$_UP['erros'][2]= 'o arquivo ultrapassa limite expecificado no html';
$_UP['erros'][3]= 'Uplod do arquivo foi feito parcialmente';
$_UP['erros'][4]= 'Nao foi feito o Uplod do arquivo ';

// verifica se houve qualquer erro no arquivo sem se exixbir o erro
if($_FILES['arquivo']['error']!=0){
    die("nao foi possivel fazer o upload, erro: <br />".$_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // para excução da scrip
}

// faz a verificaçaõ da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes'])===false){
  echo" <META HTTP-EQUIV=REFRESH CONTENT ='0; URL=http://localhost/projecto/editar_foto_cand.php'> 
 script type\"text/javascript\">
  alert(\"A imagem naõ foi carregada extensao invalida.\");
    ";
}

// faz verificação do tamanho do arquivo

else if($_UP['tamanho'] < $_FILES['arquivo']['size']){
    echo " <META HTTP-EQUIV=REFRESH CONTENT ='0; URL=http://localhost/projecto/editar_foto_cand.php'> 
 script type\"text/javascript\">
  alert(\"Arquivo muito grande .\");
    ";
}
// se deve trocar o nome do arquivo
else{
    if($_UP['renomea']== true){
        $nome_final=time().'jpg';
    }else{
        $nome_final=$_FILES['arquivo']['name'];
    }
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
        $query=mysqli_query($link, "INSERT INTO utilizador (imagem) VALUES ('$nome_final')");
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT ='0; URL=http://localhost/projecto/editar_foto_cand.php'> 
 script type\"text/javascript\">
  alert(\"imagem carregada com sucesso.\");
    ";
    }else{
        echo "
        
        <META HTTP-EQUIV=REFRESH CONTENT ='0; URL=http://localhost/projecto/editar_foto_cand.php'> 
 script type\"text/javascript\">
  alert(\"imagem nao foi carregada com sucesso.\");
    ";

    }
}
?>
</body>
</html>

