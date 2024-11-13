<?php

Class Concessionaria{
    public function addConcessionaria($nome){
        try{
            $sql = "INSERT INTO concessionaria (nome_concessionaria) VALUES (?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return "Concessionaria Cadastrado com Sucesso";

        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1062){
                return "concessionaria Já cadastrado";
            }
            else{
                return "Erro ao cadastrar concessionaria:". $e->getMessage();
            }
        }
    }
    public function recebeConcessionaria($nome){
        try {
            $sql = "select * from concessionaria where nome_concessionaria = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$nome);
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                $result= $stmt->fetch(PDO::FETCH_BOTH);
                
                return $result;
               
            }
            print("Concessionaria Não Cadastrado");
            return false;
        } catch (Exception $ex) {
            print("Erros ao buscar concessionaria: " . $ex->getMessage());

            return false;
            
        }
    }

    public function removeConcessionaria($nome){
        try{
            $sql = "DELETE FROM concessionaria WHERE nome_concessionaria = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "concessionaria Removida com Sucesso";}
            else{
                return "Nenhuma concessionaria excluida";
            }
        }
        catch(Exception $e){
           return "Erro ao remover concessionaria: ".$e->getMessage();
        }
    }

    public function updateConcessionaria($nomeAntigo, $nomeNovo){
        try{
            $sql = "UPDATE concessionaria SET nome_concessionaria = ? WHERE nome_concessionaria = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nomeNovo);
            $stmt->bindValue(2, $nomeAntigo);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "concessionaria upada com Sucesso";}
            else{
                return "Nenhuma concessionaria upada";
            }
        }
        catch(Exception $e){
           return "Erro ao atualizar concessionaria: ".$e->getMessage();
        }
    }

}
?>