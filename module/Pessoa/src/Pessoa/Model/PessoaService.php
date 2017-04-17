<?php
    namespace Pessoa\Model;

    /**
     * @var Pessoa\Model\PessoaTable
     */

    class PessoaService
    {

      protected $pessoaTable;


      public function __construct(PessoaTable $table)
      {
        $this->pessoaTable = $table;
      }

      public function fetchAll(){
        $resultSet = $this->pessoaTable->select();
        return $resultSet;
      }

    }


 ?>
