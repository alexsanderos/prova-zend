<?php
namespace Pessoa\Form;

 use Zend\Form\Form;

 class PessoaForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('pessoa');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'nome',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nome',
             ),
         ));

         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Cadastrar',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }
