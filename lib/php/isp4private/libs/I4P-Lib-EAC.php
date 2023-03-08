<?php

class I4PLib_EAC{
    private $arr  = array();
    private $raw  = array();
    private $text = "";
    private $file = "";
    function __construct($file){
        // Файл, не найден, сразу дропаем.
        if (!is_file($file)) return ["status"=>"error","code"=>1,"msg"=>"No file found"];
        $this->raw = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $ind = 0; $ip = "def";
        # Начинаем забег по строкам
        foreach ($this->raw as $fk){
            $fk = trim($fk);
            $ex = explode(" ",$fk,2);
            if ($ex[0] == "<VirtualHost"){
                $ip = substr($ex[1], 0, -2);
                if (!isset($this->arr[$ip])) $this->arr[$ip] = array();
                $this->arr[$ip][$ind] = array();
            } elseif ($ex[0] == "</VirtualHost>"){
                $ind++;
                $ip = "def";
            } elseif ($ip != "def") {
                $this->arr[$ip][$ind][$ex[0]] = $ex[1];
            } else {
                $this->text .= $fk."\r\n";
            }
        }
        $this->file = $file;
        # Парсинг закончили возращаем данные.
        return ["status"=>"success","code"=>0,"msg"=>"Successful!"];
    }

    # Установка значения
    function setConfig($domain,$key,$value){
        $count = 0;
        foreach($this->arr as $ak => $av){
            // Пройдемся по индексам
            foreach ($av as $_key => $_val){
                // Если домен найден, меняем его параметры
                if ($_val["ServerName"] != $domain) continue;
                $this->arr[$ak][$_key][$key] = $value;
                $count++;
            }
        }
        return $count;
    }

    # Установка значения
    function getConfig($domain,$key){
        foreach($this->arr as $ak => $av){
            // Пройдемся по индексам
            foreach ($av as $_key => $_val){
                // Если домен найден, меняем его параметры
                if ($_val["ServerName"] != $domain || !isset($_val[$key])) continue;
                return $_val[$key];
            }
        }
        return false;
    }

    function save($file=false){
        $d = $this->text."\r\n";
        foreach($this->arr as $ak => $av){
            foreach ($av as $key => $val){
                $d .= '<VirtualHost '.$ak.' >'."\r\n";
                foreach ($val as $vk => $vv) $d .= $vk." ".$vv."\r\n";
                $d .= '</VirtualHost>'."\r\n";
            }
        }
        $fd = fopen($this->file, 'w');
        fwrite($fd, $d);
        fclose($fd);
        return true;
    }
}

?>
