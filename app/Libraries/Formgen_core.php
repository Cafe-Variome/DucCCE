<?php

namespace App\Libraries;

use App\Models\DBModel;
use CodeIgniter\HTTP\RequestInterface;

class Formgen_core
{
    protected $schema, // table schema
    $base = null, //prefix uri or parrent controller.
    $table, //string
    $id,  //primary key value
    $id_field,  //primary key field
    $current_values, //will get current form values before updating
    $db, //db connection instance
    $model, //db connection instance
    $request,
    $fields = [], //array of field options: (type, required, label),
    $multipart = false,
    $validator = false;

    
    

    function __construct($params, RequestInterface $request)
    {
        $this->request = $request;
        $this->table = $table = $params['table'];
        $this->db = db_connect();
        $this->model = new DBModel($this->db);
        $this->schema = $this->schema($table);

        if (isset($params['fields']) && $params['fields']) {
            $this->fields = $params['fields'];
            foreach ($this->fields as $key => $field) {

                //Adding custom fields to schema for relational table
                if (isset($field['relation']) && isset($field['relation']['save_table'])) {
                    $newSchema = [
                        'Field' => $key,
                        'Type' => 'text',
                        'Key' => '',
                        'Default' => '',
                        'Extra' => 'other_table'
                    ];
                    $this->schema[] = (object) $newSchema;
                }

                //Adding custom fields to schema for relational table for files
                if (isset($field['files_relation']) && isset($field['files_relation']['files_table'])) {
                    $newSchema = [
                        'Field' => $key,
                        'Type' => 'text',
                        'Key' => '',
                        'Default' => '',
                        'Extra' => 'file_table'
                    ];
                    $this->schema[] = (object) $newSchema;
                }
            }
        }
    }
    function view($page_number, $per_page, $columns = null, $where = null, $order = null)
    {

        //$root_url = $this->base . '/' . $this->table;

        $total_rows = $this->model->countTotalRows($this->table, $where, $this->request, $this->schema, $this->fields);
        $offset = $per_page * ($page_number - 1);

        //Start of actual results query
        $items = $this->model->getItems($this->table, $where, $this->request, $this->schema, $this->fields, $order, $offset, $per_page);

        //Pagination
        $pager = service('pager');
        $pagination = $pager->makeLinks($page_number, $per_page, $total_rows, 'pagination');

        return $this->items_table($columns, $items, $pagination);
    }
    
    protected function items_table($columns = null, $items, $pagination)
    {
        $fields = $this->fields;
        $primary_key = $this->get_primary_key_field_name();

        $table = '<div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="' . $this->table . '">
                <th class="text-center" width="10%">ID</th>
                <th class="text-center" width="10%">Name</th>
                <th class="text-center" width="60%">Profile</th>
                <th class=" th-action text-center" width="20%">Actions</th>';
        $table .= '</tr></thead><tbody><tr>' . form_open();

        // Result items

        foreach ($items as $item) {
            $table .= '<tr class="row_item" >';
            $table .= '<td class="text-center">'.$item->{'pr_id'}.'</td>';
            $table .= '<td class="text-center">'.$item->{'p_name'}.'</td>';
            $table .= '<td class="text-center">'.$item->{'p_data'}.'</td>';
 
            $encode_id = base64_encode($item->{$primary_key});
            $jsn = json_encode($item->{'p_data'});
            $table .= '<td class="text-center row">
                        <a href="' . base_url(). '/ViewCon/view/'.$encode_id.'" class="btn btn-success btn-sm m-1">Edit</a>
                        <a  href="' . base_url(). '/ViewCon/download/'.$encode_id.'" class="btn btn-primary btn-sm m-1">Download</a>
                        <a  href="' . base_url(). '/ViewCon/duplicate/'.$encode_id.'" class="btn btn-info btn-sm m-1">Duplicate</a>
                        <a data-toggle="modal" data-id="'.$encode_id.'" href="#delModal" class="btn btn-danger btn-sm m-1">Delete</a>
                        </td></tr>';
        }
        $table .= '</tbody></table></div>';
        // $table .= '<div class="card-footer clearfix">';
        // if ($this->request->getPost('table_search')) {
        //     $table .= '<a href="' . $this->base . '/' . $this->table . '" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> Clear filters</a>';
        // } else {
        //     $table .=  $pagination;
        // }
        $table .= '<div class="card-footer clearfix">';
        $table .=  $pagination;
        $table .=  '</div>
        </div>';
   
        return $table;
    }

    function schema()
    {
        return $this->model->schema($this->table);
    }

    public function get_primary_key_field_name()
    {
        return $this->model->get_primary_key_field_name($this->table);
    }

}


?>


