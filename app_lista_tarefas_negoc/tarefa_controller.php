<?php
    //4 
    //To com duvida no método construtor linha 14

    require "../app_lista_tarefas_negoc/tarefa.model.php";
    require "../app_lista_tarefas_negoc/tarefa.service.php";
    require "../app_lista_tarefas_negoc/conexao.php";

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    echo '<pre>';
    print_r($tarefaService);
    echo '</pre>';

?>