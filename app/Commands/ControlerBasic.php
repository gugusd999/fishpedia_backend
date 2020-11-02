<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ControlerBasic extends BaseCommand
{
    protected $group       = 'controller';
    protected $name        = 'controller:basic';
    protected $description = 'Displays basic application information.';
    protected $table       = '';
    protected $classname   = '';
    protected $id   = '';
    public function run(array $params)
    {
        if(isset($params[0])){
            $this->table = $params[0];
            $this->classname = ucfirst($params[0]);
        }
        
        if(isset($params[1])){
            $this->id = $params[1];
        }

        $db = \Config\Database::connect();

        $column = $db->query("SHOW COLUMNS FROM ".$this->table)->getResultArray();

        // make or
        $search = "";
        foreach ($column as $key => $value) {
            if ($key == 0) {
                $search .= " ".$value['Field']." LIKE '%\$pencarian%' ";
            }else{
                $search .= " \n OR ".$value['Field']." LIKE '%\$pencarian%' ";
            }
        }
        
        $searchtmp = "";
        foreach ($column as $key => $value) {
            $searchtmp .= "\$child[] = \$value->".$value['Field']."; \n";
        }
        // var_dump($searchtmp);
        // var_dump(get_filenames(APPPATH.'tmp'));
        // var_dump(APPPATH);
        // // get contents of a file into a string
        
        $filename = APPPATH.'tmp/controller.tmp';
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        // classname set 
        $contents = str_replace("{{classname}}", $this->classname, $contents);
        $contents = str_replace("{{tablename}}", $this->table, $contents);
        $contents = str_replace("{{codepencarian}}", $search, $contents);
        $contents = str_replace("{{rowcall}}", $searchtmp, $contents);
        $contents = str_replace("{{kode}}", $this->id, $contents);

        // // call file tmp
        $filename2 = APPPATH.'controllers/'.$this->classname.'.php';

        if (file_exists($filename2)) {
            unlink($filename2);
        }

        // VIEW 
        // cek path
        $filepath = APPPATH.'views/'.$this->table;
        if (!file_exists($filepath)) {
            mkdir($filepath, 0777);
        }

        // cek file ready

        $fp = fopen($filename2, 'w');
        fwrite($fp, $contents);
        fclose($fp);
        CLI::write('controller '.$this->classname.' created');

        // create view

    }
}