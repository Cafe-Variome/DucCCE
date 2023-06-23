<?php

/**
 * LeHMR is a health metadata resource used to capture information regarding metadata to allow discovery.
 * This has been created by Brookeslab for which Prof Tony Brookes is the lead.
 * @author Umar Riaz
 * Created at 10/03/2021
 * 
 */

namespace App\Controllers;

use App\Models\DBModel;

use App\Libraries\Formgen;


class Update extends BaseController
{
    protected $session;
    protected $p_id;
    protected $schema, // table schema
        $base = null, //prefix uri or parrent controller.
        $id,  //primary key value
        $id_field,  //primary key field
        $current_values; //will get current form values before updating

    function __construct()
    {
        helper(['form', 'url']);
        $this->db = db_connect();
        $this->model = new DBModel($this->db);
        $this->session = \Config\Services::session();
    }


    public function updateuser(){
        $this->p_id = $this->request->getVar('p_id');
        $this->updateSingleTable('userinfo', 'u_id', $this->request->getVar('u_id'));
        $rf =  base64_encode($this->p_id);
        $referred_from = 'ViewCon/view/'.$rf;
        return redirect()->to(base_url($referred_from));
    }

    public function updateprofile(){
        $this->p_id = $this->request->getVar('p_id');
        

        $data =[
            'p_name' => $this->request->getVar('p_name'),
            'p_data' => $this->request->getVar('profile'),
        ];
        $where= [
			'p_id =' => $this->p_id  
		];

        $this->model->updateItem('profile',$where,$data);
        $rf =  base64_encode($this->p_id);
        $referred_from = 'ViewCon/view/'.$rf;
        return redirect()->to(base_url($referred_from));

    }

    public function updateasset()
    {
        # code...

        $this->p_id = $this->request->getVar('p_id');
        

        $data =[
            'p_name' => $this->request->getVar('p_name'),
            'p_data' => $this->request->getVar('profile'),
        ];
        $where= [
			'p_id =' => $this->p_id  
		];

        $this->model->updateItem('profile',$where,$data);
        $rf =  base64_encode($this->p_id);
        $referred_from = 'ViewCon/view/'.$rf;
        return redirect()->to(base_url($referred_from));
    }

    public function updateconditions(){

        $this->p_id = $this->request->getVar('p_id');
        

        $data =[
            'p_name' => $this->request->getVar('p_name'),
            'p_data' => $this->request->getVar('profile'),
        ];
        $where= [
			'p_id =' => $this->p_id  
		];

        $this->model->updateItem('profile',$where,$data);
        $rf =  base64_encode($this->p_id);
        $referred_from = 'ViewCon/view/'.$rf;
        return redirect()->to(base_url($referred_from));

    }






    public function updateSingleTable($table, $pk, $pkv)
    {

        $update_data = [];

        $this->schema = $this->schema($table);
        $this->id = $pkv;
        $this->id_field = $pk;
        $post = $this->request->getPost();
        foreach ($this->schema as $schema_field) {
            if (isset($post[$schema_field->Field])) {
                $update_data[$schema_field->Field] = $post[$schema_field->Field];
            }
        }

        $this->model->updateItem($table, [$this->id_field => $this->id], $update_data);
    }
    public function updateMultipleTable($table, $where)
    {

        $this->schema = $this->schema($table);

        if ($table == 'publications') {

            $this->model->deleteItems($table, $where, null, null);
            if (isset($_POST['pub_title'])) {
                $pub_title = $this->request->getVar('pub_title');
                $pub_venue = $this->request->getVar('pub_venue');
                $pub_date = $this->request->getVar('pub_date');
                $pub_author = $this->request->getVar('pub_author');
                $pub_doi = $this->request->getVar('pub_doi');
                foreach ($pub_title as $key => $pub) {

                    $data = [
                        'd_id'   => $this->d_id,
                        'pub_title' => $pub,
                        'pub_venue' => $pub_venue[$key],
                        'pub_date' => $pub_date[$key],
                        'pub_author' => $pub_author[$key],
                        'pub_doi' =>  $pub_doi[$key],
                    ];


                    if (isset($_POST['pub_id'])) {

                        $data['pub_id'] = $this->request->getVar('pub_id')[$key];
                    }

                    $this->model->insertItem('publications', $data);
                }
            }

            
        }

        if ($table == 'person') {

            $this->model->deleteItems($table, $where, null, null);

            if(isset($_POST['per_forename'])){
                $per_title = $this->request->getVar('per_title');
                $per_forename = $this->request->getVar('per_forename');
                $per_surname = $this->request->getVar('per_surname');
                $per_aff     =$this-> request->getVar('per_affiliationvalue');
                $per_email = $this->request->getVar('per_email');
                $p_id = $this->request->getVar('person');

                foreach ($per_forename  as $key => $per) {

                    $data = [
                        'd_id'   => $this->d_id,
                        'p_id'   => $p_id[$key],
                        'p_title' => $per_title[$key],
                        'p_firstname' => $per,
                        'p_surname' => $per_surname[$key],
                        'p_email' =>  $per_email[$key],
                        'p_affiliations' => $per_aff[$key]
    
                    ];
    
                    if (isset($_POST['person'])) {
    
                        $pid = $p_id[$key];
                        $data['p_id'] = $pid;
                    }
    
                    $p_id = $this->model->insertItem($table, $data);
                }
            }

           
        }
    }
    public function removeOrgs($per)
    {
        if (isset($_POST['org_name' . $per]) &&  isset($_POST['org_name' . $per])) {
            $org_id  =  $this->request->getVar('org_id' . $per);
            $org_name = $this->request->getVar('org_name' . $per);
            $org_department = $this->request->getVar('org_department' . $per);
        }

        foreach ($org_name as $org => $o) {


            $this->model->deleteItems('organisation', ['o_id =' => $org_id[$org]], null, null);
        }
    }
    protected function addOrg($p_id, $per)
    {

        if (isset($_POST['org_name' . $per]) &&  isset($_POST['org_name' . $per])) {
            $org_id  =  $this->request->getVar('org_id' . $per);
            $org_name = $this->request->getVar('org_name' . $per);
            $org_department = $this->request->getVar('org_department' . $per);
        }

        $orgn = 1;
        foreach ($org_name as $org => $o) {

            //o_id	p_id	o_name	o_department

            $data = [
                'p_id' => $p_id,
                'o_name' => $o,
                'o_department' => $org_department[$org],
            ];


            if (isset($_POST['orgid' . $orgn])) {

                $data['o_id'] = $org_id[$org];
            }

            $this->model->insertItem('organisation', $data);
            $orgn++;
        }
    }


    function schema($table)
    {
        return $this->model->schema($table);
    }

    function current_values($id, $key, $table)
    {
        $this->id_field = $key;

        $this->current_values = $item = $this->model->getItem($table, [$this->id_field => $id]);
        if (!$item) {
            $this->flash('warning', 'The record does not exist');
            return false;
        }

        foreach ($this->fields as $field => $options) {

            if (isset($options['type']) && $options['type'] == 'file') {
                $this->files[$field] = $item->{$field};
            }

            if (isset($options['type']) && $options['type'] == 'files') {

                $fileTable = $options['files_relation']['files_table'];
                $where = [$options['files_relation']['parent_field'] => $id];
                $files = $this->model->getAnyItems($fileTable, $where);
                $this->files[$field] = $files;
            }
        }

        $this->id = $id;
        return $item;
    }

    public function flash($key, $value)
    {
        $session = session();
        $session->setFlashdata($key, $value);
        return true;
    }
}
