<?php

include './model/Conexao.php';
include './model/Concessionaria.php';
include './model/Area.php';
include './model/Automovel.php';
include './model/Cliente.php';

//var_dump(Conexao::getConexao());

$c = new Concessionaria();
$a = new Area();
$u = new Automovel();
$l = new Cliente();

//echo $c->addConcessionaria('Concessionaria Naquita');
//var_dump($c->recebeConcessionaria('Concessionaria Naquita'));
//echo $c->removeConcessionaria('Concessionaria Naquita');
//echo $c->updateConcessionaria('Concessionaria Naquita', 'Concessionaria Naskquinhas');
//echo $a->addArea('vale do fim', 4);
//var_dump($a->recebeArea('vale do fim'));
//echo $a->removeArea('vale do fim');
//echo $a->updateArea('vale do fim', 'templo do orochimaru', 4);

//echo $u->addAutomovel(500.25, 'Fusca', 2);
//var_dump($u->recebeAutomovel(1));
//echo $u->removeAutomovel(2);
//echo $u->updateAutomovel(3, 'Fiesta', 777.25, 2);

//echo $l->addCliente('lucas iron tyson');
//var_dump($l->recebeCliente('lucas iron tyson'));
//echo $l->removeCliente(1);
echo $l->updateCliente(2, 'lucas juliana eater');