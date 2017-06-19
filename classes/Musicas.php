 <?php

class Musica
{
    public $id;
    public $nome;
    public $artista;
    public $tipo;

    public function __construct()
    {
        global $Log;
        $this->log = $Log;

        global $db;
        $this->db = $db;
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO musicas (nome , artista, tipo)
        VALUES ('{$this->nome}' , '{$this->artista}' , '{$this->tipo}');";

        $query = $this->db->query($sql);

        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }

        return true;
    }

    public function existe()
    {
        $sql   = "SELECT nome FROM musicas WHERE nome = '$this->nome';";
        $query = $this->db->query($sql);

        if ($query->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function gerar($numAgi,$numTransic,$numAdor)
    {
        $rows = [];
        // var_dump($numAgi,$numTransic,$numAdor);
        // exit;
        // Busca músicas agitadas
        $sql   = "SELECT nome,artista FROM musicas WHERE tipo = 'agitada' ORDER BY RAND() LIMIT $numAgi";
        $query = $this->db->query($sql);

        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }

        while ($row = $query->fetch_object()) {
            $rows[] = $row;
        }

        // Busca músicas de transição
        $sql   = "SELECT nome,artista FROM musicas WHERE tipo = 'transicao' ORDER BY RAND() LIMIT $numTransic";
        $query = $this->db->query($sql);

        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }

        while ($row = $query->fetch_object()) {
            $rows[] = $row;
        }

        // Busca músicas de adoração
        $sql   = "SELECT nome,artista FROM musicas WHERE tipo = 'adoracao' ORDER BY RAND() LIMIT $numAdor";
        $query = $this->db->query($sql);

        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }

        while ($row = $query->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;

    }

    public function all($order)
    {
        $sql   = "SELECT * FROM musicas ";

        switch ($order) {
            case 'id':
                $sql .= "ORDER BY id;";
                break;

            case 'nome':
                $sql .= "ORDER BY nome;";
                break;

            case 'artista':
                $sql .= "ORDER BY artista;";
                break;

            case 'tipo':
                $sql .= "ORDER BY tipo;";
                break;
        }


        $query = $this->db->query($sql);

        $rows = [];
        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }

        while ($row = $query->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function excluir($id){
        $sql = "DELETE FROM musicas WHERE id=$id;";
        $query = $this->db->query($sql);

        if (!query) {
            $this->log->write($this->db->error);
            return false;
        }
        return true;
    }

    public function editar($id){
        $sql = "UPDATE musicas 
                    SET nome='{$this->nome}', artista='{$this->artista}', tipo='{$this->tipo}' 
                        WHERE id='{$id}';";

        $query = $this->db->query($sql);
        if (!$query) {
            $this->log->write($this->db->error);
            return false;
        }
        return true;
    }

 
    
}
