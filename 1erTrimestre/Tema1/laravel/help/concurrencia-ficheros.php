<?php

    class PruebaController{

        public function ficherolock($args){
            $file_pointer = fopen("numeroactual.txt","rw+");
            
            
            //waiting lock
            while(!flock($file_pointer,LOCK_EX)){
                sleep(0.2);
            }
            //if (flock($file_pointer,LOCK_EX)) {
            if( filesize("numeroactual.txt") == 0){
                $numeroactual = 0;
            }else{
                $numeroactual = fread($file_pointer,filesize("numeroactual.txt"));
            }
            //$numeroactual=0;
            $numeroactual++;
            echo "ahora actual: ".$numeroactual."<br>";
            ftruncate($file_pointer,0);
            rewind($file_pointer);
            fwrite($file_pointer,$numeroactual);
            flock($file_pointer,LOCK_UN);

            fclose($file_pointer);
        }

        public function fichero($args){
            echo "estamos en fichero<br>";
            $numeroactual = file_get_contents("numeroactual.txt");
            $numeroactual++;
            echo "número actual ahora es: ".$numeroactual;
            file_put_contents("numeroactual.txt",$numeroactual);

        }
    }

?>        