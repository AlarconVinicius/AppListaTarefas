<?php
    //4 
    //To com duvida no método construtor linha 14

    require "../app_lista_tarefas_negoc/tarefa.model.php";
    require "../app_lista_tarefas_negoc/tarefa.service.php";
    require "../app_lista_tarefas_negoc/conexao.php";

    /* echo '<pre>';
    print_r($_POST);
    echo '</pre>'; */

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    
    if( $acao == 'inserir') {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('Location: nova_tarefa.php?salvo=1');

    } else if( $acao == 'recuperar' ) {
        
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    
    }  else if( $acao == 'atualizar' ) {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->atualizar()) {
            
            if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
                header('location: index.php');	
            } else {
                header('location: todas_tarefas.php');
            }
        }

    } else if( $acao == 'remover') {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

        if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}

    } else if( $acao == 'realizada' ) {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->realizada();
            
        if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
        
    } else if( $acao == 'pendente' ) {
        
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendente();
    
    }

    /* echo '<pre>';
    print_r($tarefaService);
    echo '</pre>'; */

?>