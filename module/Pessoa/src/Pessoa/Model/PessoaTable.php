<?php
  namespace Pessoa\Model;
  use Zend\Db\TableGateway\TableGateway;

 class PessoaTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select()->toArray();
         return $resultSet;
     }

     public function getPessoa($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Não foi possivel encontrar o id $id");
         }
         return $row;
     }

     public function savePessoa(Pessoa $pessoa)
     {
         $data = array(
             'id' => $pessoa->id,
             'nome'  => $pessoa->nome,
         );

         $id = (int) $pessoa->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getPessoa($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Pessoa não existe');
             }
         }
     }

     public function deletePessoa($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }

  }
