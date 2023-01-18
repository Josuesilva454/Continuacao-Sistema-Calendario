<?php
session_start();

//Incluir conexao com BD
include "db_conn.php";

$title = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
$start = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'saida', FILTER_SANITIZE_STRING);

if(!empty($title) && !empty($color) && !empty($start) && !empty($end)){
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;
	
	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;
	
	$result_events = "INSERT INTO eventos (titulo, cor, hora, saida) VALUES ('$title', '$color', '$start_sem_barra', '$end_sem_barra')";
	$resultado_events = mysqli_query($conn, $result_events);
	
	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento Cadastrado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: home.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: home.php");
	}
	
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: home.php");
}