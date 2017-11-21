<?php
class EntregasDao {
    private $db;
    public function __construct() {
        $this->db = database::getConnection();
    }
    public function atualizaEntrega($id, $entrega){

        try{
            $statementHandle = $db -> prepare("UPDATE entregas set (nome_recebedor=?, cpf_recebedor=?, data_hora_entrega=?) WHERE id = ?");
        $statementHandle -> bindParam(1, $entrega["nome_recebedor"]);
        $statementHandle -> bindParam(2, $entrega["cpf_recebedor"]);
        $statementHandle -> bindParam(3, $entrega["data_hora_entrega"]);
        $statementHandle -> bindParam(3, $id);
        $statementHandle -> execute();
        return true;
       } catch (Exception $e){
            return false;
        }
   
    }
    public function removeEntrega($entregaId){   
        try{
         $statementHandle = $db -> prepare("DELETE FROM entregas WHERE id = ?");
        $statementHandle -> bindParam(1, $entregaId);      
        $statementHandle -> execute();
        return true;
        }catch(Exception $e){
            return false;
        }
    
    }
}
?>