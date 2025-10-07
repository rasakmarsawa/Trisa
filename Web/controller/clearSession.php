<?php
    function clearSession(){
        clearstatcache();
        $dir = sys_get_temp_dir(); //path to temporary directory
        $handle=opendir($dir);
        while($data=readdir($handle))
        {

            if(!is_dir($data)&&filesize("{$dir}/{$data}")==0) //excludes here
            {
                unlink("{$dir}/{$data}");
            }
        }
    closedir($handle);   
    }
?>
