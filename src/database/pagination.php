<?php
namespace Src\Database;
class Pagination {
    //máximo de registros por página
    private $maximo;
    //quantidade total de registros
    private $total;
    //quantidade de páginas
    private $paginas;
    //página atual
    private $atual;
    
    /**Construtor
    * @param int $total
    * @param int $atual
    * @param int $maximo
    */
    public function __construct($total, $atual = 1, $maximo = 3) {
        $this->total = $total;
        $this->maximo = $maximo;
        $this->atual = (is_numeric($atual) and $atual > 0) ? $atual : 1;
    }
    
    //Calcula paginação
    private function calcular() {
        $this->paginas = $this->total > 0 ? ceil($this->total / $this->maximo) : 1;
    }
    
    //verifica pagina atual não exceda o total de páginas
    private function atual() {
        $this->atual = $this->atual <= $this->paginas ? $this->atual : $this->paginas;
    }
}
?>