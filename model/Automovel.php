<?php

Class Automovel{
    public function addAutomovel($preco,$modelo, $id_area){
        try{
            $sql = "INSERT INTO automovel (preco_automovel, modelo_automovel, id_area) VALUES (?, ?, ?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $preco);
            $stmt->bindValue(2, $modelo);
            $stmt->bindValue(3, $id_area);
            $stmt->execute();
            return "automovel Cadastrado com Sucesso";

        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1062){
                return "automovel Já cadastrado";
            }
            else{
                return "Erro ao cadastrar automovel:". $e->getMessage();
            }
        }
    }
    public function recebeAutomovel($id_automovel){
        try {
            $sql = "select * from automovel where id_automovel = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id_automovel);
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                $result= $stmt->fetch(PDO::FETCH_BOTH);
                
                return $result;
               
            }
            print("automovel Não Cadastrado");
            return false;
        } catch (Exception $ex) {
            print("Erros ao buscar automovel: " . $ex->getMessage());

            return false;
            
        }
    }

    public function removeAutomovel($id_automovel){
        try{
            $sql = "DELETE FROM automovel WHERE id_automovel = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id_automovel);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "automovel Removida com Sucesso";}
            else{
                return "Nenhuma automovel excluida";
            }
        }
        catch(Exception $e){
           return "Erro ao remover automovel: ".$e->getMessage();
        }
    }

    public function updateAutomovel($id_automovel, $modeloNovo, $precoNovo, $id_area){
        try{
            $sql = "UPDATE automovel SET preco_automovel = ?, modelo_automovel = ?, id_area = ? WHERE id_automovel = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $precoNovo);
            $stmt->bindValue(2, $modeloNovo);
            $stmt->bindValue(3, $id_area);
            $stmt->bindValue(4, $id_automovel);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            return "automovel upada com Sucesso";}
            else{
                return "Nenhuma automovel upada";
            }
        }
        catch(Exception $e){
           return "Erro ao atualizar automovel: ".$e->getMessage();
        }
    }

}
?>