<?php

Class Area{
    public function addArea($nome, $id_concessionaria){
        try{
            $sql = "INSERT INTO area (nome_area, id_concessionaria) VALUES (?, ?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $id_concessionaria);
            $stmt->execute();
            return "area Cadastrado com Sucesso";

        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1062){
                return "area Já cadastrado";
            }
            else{
                return "Erro ao cadastrar area:". $e->getMessage();
            }
        }
    }
    public function recebeArea($nome){
        try {
            $sql = "select * from area where nome_area = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$nome);
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                $result= $stmt->fetch(PDO::FETCH_BOTH);
                
                return $result;
               
            }
            print("Area Não Cadastrado");
            return false;
        } catch (Exception $ex) {
            print("Erros ao buscar area: " . $ex->getMessage());

            return false;
            
        }
    }

    public function removeArea($nome){
        try{
            $sql = "DELETE FROM area WHERE nome_area = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "area Removida com Sucesso";}
            else{
                return "Nenhuma area excluida";
            }
        }
        catch(Exception $e){
           return "Erro ao remover area: ".$e->getMessage();
        }
    }

    public function updateArea($nomeAntigo, $nomeNovo, $id_concessionaria){
        try{
            $sql = "UPDATE area SET nome_area = ?, id_concessionaria = ? WHERE nome_area = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $nomeNovo);
            $stmt->bindValue(2, $id_concessionaria);
            $stmt->bindValue(3, $nomeAntigo);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "area upada com Sucesso";}
            else{
                return "Nenhuma area upada";
            }
        }
        catch(Exception $e){
           return "Erro ao atualizar area: ".$e->getMessage();
        }
    }

}
?>