<?php

Class Alocação{
    public function addAlocacao($quantidade, $id_veiculo, $id_concessionaria, $id_cliente){
        try{
            $sql = "INSERT INTO alocacao (quantidade, id_veiculo, id_concessionaria, id_cliente) VALUES (?, ?, ?, ?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $quantidade);
            $stmt->bindValue(2, $id_veiculo);
            $stmt->bindValue(3, $id_concessionaria);
            $stmt->bindValue(4, $id_cliente);
            $stmt->execute();
            return "alocacao Cadastrado com Sucesso";

        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1062){
                return "alocacao Já cadastrado";
            }
            else{
                return "Erro ao cadastrar alocacao:". $e->getMessage();
            }
        }
    }
    public function recebeAlocacao($id_alocacao){
        try {
            $sql = "select * from alocacao where id_alocacao = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id_alocacao);
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                $result= $stmt->fetch(PDO::FETCH_BOTH);
                
                return $result;
               
            }
            print("alocacao Não Cadastrado");
            return false;
        } catch (Exception $ex) {
            print("Erros ao buscar alocacao: " . $ex->getMessage());

            return false;
            
        }
    }

    public function removeAlocacao($id_alocacao){
        try{
            $sql = "DELETE FROM alocacao WHERE id_alocacao = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_alocacao);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "alocacao Removida com Sucesso";}
            else{
                return "Nenhuma alocacao excluida";
            }
        }
        catch(Exception $e){
           return "Erro ao remover alocacao: ".$e->getMessage();
        }
    }

    public function updateAlocacao($id_alocacao, $quantidade, $id_veiculo, $id_concessionaria, $id_cliente){
        try{
            $sql = "UPDATE alocacao SET quantidade = ?, id_veiculo = ?, id_concessionaria = ?, id_cliente = ?  WHERE id_alocacao = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $quantidade);
            $stmt->bindValue(2, $id_veiculo);
            $stmt->bindValue(3, $id_concessionaria);
            $stmt->bindValue(4, $id_cliente);
            $stmt->bindValue(5, $id_alocacao);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "alocacao upada com Sucesso";}
            else{
                return "Nenhuma alocacao upada";
            }
        }
        catch(Exception $e){
           return "Erro ao atualizar alocacao: ".$e->getMessage();
        }
    }

}
?>