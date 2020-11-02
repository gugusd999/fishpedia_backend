<?php namespace App\Controllers;

class Status extends BaseController
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('status');
    }

    function json()
    {
        // order
        $order = 'DESC';
        if (isset($_POST['order'])) : $order = $_POST['order'][0]['dir'];
        else : $setorder = '';
        endif;
        // pencarian
        $pencarian = "";
        if (isset($_POST['search']['value'])) {
            $pencarian = $_POST['search']['value'];
        }
        // limit set   
        $start = $_POST['start'];
        $end = $_POST['length'];
        // draw
        $draw = $_POST['draw'];
        // query prosses
        $qr = $this->db->query("
            SELECT 
                * 
            FROM
                status
            WHERE 
                 id LIKE '%$pencarian%'  
 OR status LIKE '%$pencarian%'  
 OR type_status_id LIKE '%$pencarian%' 
            ORDER BY
                id $order
            LIMIT
                $start , $end
        ");
        $arr = [];
        $dataArr = $qr->getResultObject();
        $dataTotal = count($qr->getResultObject());
        foreach ($dataArr as $key => $value) {
            $child = [];
            $child[] = $value->id; 
$child[] = $value->status; 
$child[] = $value->type_status_id; 

            $child[] = "
                <button data-id='" . $value->id . "' modal-open-delete class='btn btn-sm btn-danger'>Delete</button>
            ";
            $arr[] = $child;
        }
        $r = array(
            "draw"            => $draw,
            "recordsTotal"    => intval($dataTotal),
            "recordsFiltered" => intval($dataTotal),
            "data"            => $arr,
        );
        echo json_encode($r);
    }

    public function Index()
    {
        return view('status/form');
    }

    public function simpan()
    {
        $data = $_POST['data'];
        $this->builder->insert($data);
        return redirect()->to('form-status');
    }

    public function formUpdate()
    {
        return view('status/update');
    }

    public function hapus()
    {
        $kode = $_POST['kode'];
        $this->db->query("DELETE FROM status WHERE kode = '$kode' ");
        return redirect()->to('/status'); // ubah disini
    }
}
