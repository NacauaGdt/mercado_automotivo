<?php

Class Cliente{
    public function addCliente($nome){
        try{
            $sql = "INSERT INTO cliente (nome_cliente) VALUES (?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return "cliente Cadastrado com Sucesso";

        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1062){
                return "cliente Já cadastrado";
            }
            else{
                return "Erro ao cadastrar cliente:". $e->getMessage();
            }
        }
    }
    public function recebeCliente($nome){
        try {
            $sql = "select * from cliente where nome_cliente = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$nome);
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                $result= $stmt->fetch(PDO::FETCH_BOTH);
                
                return $result;
               
            }
            print("cliente Não Cadastrado");
            return false;
        } catch (Exception $ex) {
            print("Erros ao buscar cliente: " . $ex->getMessage());

            return false;
            
        }
    }

    public function removeCliente($id_cliente){
        try{
            $sql = "DELETE FROM cliente WHERE id_cliente = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_cliente);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "cliente Removida com Sucesso";}
            else{
                return "Nenhuma cliente excluida";
            }
        }
        catch(Exception $e){
           return "Erro ao remover cliente: ".$e->getMessage();
        }
    }

    public function updateCliente($id_cliente, $nomeNovo){
        try{
            $sql = "UPDATE cliente SET nome_cliente = ? WHERE id_cliente = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nomeNovo);
            $stmt->bindValue(2, $id_cliente);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "cliente upada com Sucesso";}
            else{
                return "Nenhuma cliente upada";
            }
        }
        catch(Exception $e){
           return "Erro ao atualizar cliente: ".$e->getMessage();
        }
    }

}
?>