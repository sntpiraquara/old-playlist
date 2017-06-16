<?php

class Log
{

    public function write($content){


        // Padrão do arquivo: 'dia-mes-ano.log' h:i a
        $date = date("y-m-d"); 
        $file = base_path("logs/" . $date . ".log");

        $content = "[" . date("H:i:s") . "] " . $content . PHP_EOL;

        // Verificar se arquivo de logs existe
        $fp = fopen($file,'a+');

        // Se não existir: criar arquivo de logs

        // Escrever o conteúdo nos logs, com as informações de data e hora
        fwrite($fp, $content);
        fclose($fp);

    }
}
