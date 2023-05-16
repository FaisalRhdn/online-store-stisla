<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class CrudGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->create_file();

        $tabelterpilih = "";
        $column = [];
        $message = "silahkan pilih tabel terlebih dahulu";
        if (isset($_POST['tabel'])) {
            $tabelterpilih = $_POST['tabel'];
            $message = "anda memilih tabel ".$tabelterpilih;
            $res_column = DB::select('SELECT column_name, data_type,is_nullable, character_maximum_length FROM information_schema.columns WHERE  table_name = "'.$tabelterpilih.'" AND table_schema = "stisla"');
            $column = $res_column;
        }
        $res_table = DB::select('SHOW TABLES FROM '.env('DB_DATABASE').';');
           
        return view('crud.index', compact('res_table','tabelterpilih','message','column'));
    }

    public function create_file()
    {
        $fileController = "Controllers";
        $fileModels = "Models";

        $content = "Isi Baru";
        dump("ini create file");
        
        $page_file_temp = $_SERVER["PHP_SELF"];
        dump($page_file_temp);

        $page_directory = dirname($page_file_temp);
        dump($page_directory);

        $new_path = getcwd();
        dump($new_path);

        $target_path = str_replace('public','app',$new_path);
        dump($target_path);

        $target_path = str_replace('\\', '/', $target_path);
        dump($target_path);
        
        $domaincontroller = $target_path .'/Http'. '/' . $fileController . '/';
        dump($domaincontroller);
        if (!is_dir($domaincontroller)) {
            mkdir($domaincontroller, 0777, true);
        }
        dump("berhasil bikin folder Controller");

        $domainmodels = $target_path . '/' .$fileModels.'/';
        dump($domainmodels);
        if (!is_dir($domainmodels)) {
            mkdir($domainmodels, 0777, true);
        }
        dump("berhasil bikin folder Models");

        $myfilemodels = fopen($domainmodels . $fileModels . ".php", "w");
        if (!$myfilemodels) {
            $messagesmodels = "cannot write file";
        } else {
            fwrite($myfilemodels, $content);
            fclose($myfilemodels);
            $messagesmodels = "success create Models File, check on your Models folder";
        }
        dump($messagesmodels);

        $myfile = fopen($domaincontroller . $fileController . "Controller.php", "w");
        if (!$myfile) {
            $messages = "cannot write file";
        } else {
            fwrite($myfile, $content);
            fclose($myfile);
            $messages = "success create Controller File, check on your Controller folder";
        }
        dd($messages);
    }

}
