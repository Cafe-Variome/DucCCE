<?php
/**
 * @author Umar Riaz
 * Created at 17/08/2021
 * 
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class DBModel
{

    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    public function getItem($table, $where)
    {
        return $this->db->table($table)
            ->where($where)
            ->get()
            ->getRow();
    }
    // Get Multiple Items
    public function getItemMul($table, $where)
    {

        $builder = $this->db->table($table);

        if ($where)
            $builder->where($where);

        $items = $builder->get()
            ->getResult();
   
        return $items;
 
    }

    // dell Items

    public function deleteItems($table, $where = null, $whereInField = null, $whereInValue = null)
    {
        $builder = $this->db->table($table);

        if ($where)
            $builder->where($where);

        if ($whereInField && $whereInValue)
            $builder->whereIn($whereInField, $whereInValue);

        return $builder->delete();
    }

    // Insert Item 

    public function insertItem($table, $data)
    {
        $this->db->table($table)->insert($data);
        return $this->db->insertID();
    }

        //Get total rows per request
        public function countTotalRows($table, $where = null, $request, $schema, $fields)
        {
            $count_query = "SELECT COUNT(*) as total FROM " . $table;
            //get primary_key field name
            $pk = $this->get_primary_key_field_name($table);
    
            if ($where) {
                $count_query .= " WHERE (";
                $i = 0;
                foreach ($where as $key => $value) {
                    if ($i > 0)
                        $count_query .= " AND ";
    
                    //Check if operator is different from = (equal sign)
                    $operator_arr = explode(" ", $key);
                    if (isset($operator_arr[1]))
                        $operator = $operator_arr[1];
                    else
                        $operator = "=";
    
                    $count_query .= " `$operator_arr[0]`$operator" . $this->db->escape($value) . " ";
                    $i++;
                }
                $count_query .= ")";
            }
    
            if ($table_search = $request->getPost('table_search')) {
                $allEmpty = true;
                $tempQuery = '';
    
                if ($where)
                    $tempQuery .= " AND ";
                else
                    $tempQuery .= " WHERE ";
                $tempQuery .= " ( ";
                $i = 0;
                // echo '<pre>';
                //  print_r($schema);
                // echo '<pre>';
                foreach ($schema as $column) {
                    if (trim($request->getPost($column->Field)) == '')
                        continue;
                    if ($column->Extra == 'other_table')
                        continue;
    
                    $allEmpty = false;
                    if ($i > 0)
                        $tempQuery .= " OR ";
    
    
                    $tempQuery .= " " . $table_search
                        . "." . $column->Field
                        . " LIKE '%"
                        . trim($this->db->escapeLikeString($request->getPost($column->Field)))
                        . "%' ESCAPE '!'";
    
                    $i++;
                }
                $tempQuery .= ")";
                if (!$allEmpty)
                    $count_query .= $tempQuery;
            }
    
            return $this->db->query($count_query)->getRow()->total;
        }

        public function getItems($table, $where = null, $request, $schema, $fields, $order, $offset, $per_page)
        {
            $result_query = "SELECT * FROM " . $table;
            //get primary_key field name
            $pk = $this->get_primary_key_field_name($table);
    
    
            //Check for relation fields
            foreach ($fields as $key => $rel_field) {
                if (isset($rel_field['relation']) && !isset($rel_field['relation']['save_table'])) {
                    $rfield = $rel_field['relation'];
                    $result_query .= " LEFT JOIN  " . $rfield['table'] . " ON " . $table . '.' . $key . "=" . $rfield['table'] . "." . $rfield['primary_key'] . "  ";
                    //$this->db->join($rfield['table'], $table.'.'.$key.'='.$rfield['table'].'.'.$rfield['primary_key'], 'left');
                }
            }
    
            if ($where) {
                $result_query .= " WHERE (";
                $i = 0;
                foreach ($where as $key => $value) {
                    if ($i > 0)
                        $result_query .= " AND ";
    
                    //Check if operator is different from = (equal sign)
                    $operator_arr = explode(" ", $key);
                    if (isset($operator_arr[1]))
                        $operator = $operator_arr[1];
                    else
                        $operator = "=";
    
                    $result_query .= "  `$operator_arr[0]`$operator'$value' ";
    
                    //$this->db->where($key, $value);
                    $i++;
                }
                $result_query .= ")";
            }
    
            if ($request->getPost('table_search')) {
    
                $allEmpty = true;
                $tempQuery = '';
                $i = 0;
                if ($where)
                    $tempQuery .= " AND ";
                else
                    $tempQuery .= " WHERE ";
    
                //$tempQuery .= " ( ";
    
                foreach ($schema as $column) {
    
                    if ($request->getPost($column->Field) == '')
                        continue;
    
                    $allEmpty = false;
                    $col_search = [];
                    $col_search[] = $column->Field;
                    if (isset($fields[$column->Field]['relation']) && isset($fields[$column->Field]['relation']['save_table'])) {
                        //Search relational table to get the ids of related ids
                        $relField = $fields[$column->Field]['relation'];
    
                        $parent_table = $relField['table'];
                        $relation_table = $relField['save_table'];
                        $joinString = $relation_table . '.' . $relField['child_field'] . '=' . $parent_table . '.' . $relField['primary_key'];
                        $likeColumns = $relField['display'];
                        $likeTerm = $request->getPost($column->Field);
                        //$relselect is optional. when used it will add DISTINCT to prevent dublicates
                        $relSelect = $relation_table . '.' . $relField['parent_field'];
                        $relatedItems = $this->searchRelatedItems($parent_table, $relation_table, $joinString, $likeColumns, $likeTerm, $relSelect);
                        $relatedItemsIdArr = [];
                        if (!$relatedItems)
                            $relatedItemsIdArr = '-1';
                        else {
                            //Create an array of ids for whereIn statement
                            foreach ($relatedItems as $relatedItem) {
                                $relatedItemsIdArr[] = $relatedItem->{$relField['parent_field']};
                            }
                        }
    
                        if ($i > 0)
                            $tempQuery .= " AND ";
    
                        if (is_array($relatedItemsIdArr))
                            $relTempQuery = '' . $table . '.' . $pk . ' IN (' . implode(',', $relatedItemsIdArr) . ')';
                        else
                            $relTempQuery = $table . '.' . $pk . ' = ' . $relatedItemsIdArr;
    
                        //  echo $tempQuery.'<br>';
                        $tempQuery .= $relTempQuery;
                        //  echo $tempQuery;
    
                        $i++;
                        //$allEmpty = false;
                        continue;
                    } else if (isset($fields[$column->Field]['relation'])) {
    
                        $col_search = $fields[$column->Field]['relation']['display'];
                        //check if display is an array of columns
                        if (!is_array($col_search))
                            $col_search[] = $col_search;
    
                        $table_search = $fields[$column->Field]['relation']['table'];
                    } else {
                        $table_search = $table;
    
                        //$col_search[] = $column->Field;
                    }
                    if ($i > 0)
                        $tempQuery .= " AND ";
    
    
                    //For loop is required when search must be performed in multiple relational columns from another table
                    $searchLikeTempQuery = '';
                    $searchLikeTempQueryArr = [];
                    foreach ($col_search as $colToSearch) {
                        $searchLikeTempQueryArr[] = $this->generateLikeClause($table_search, $colToSearch, $request->getPost($column->Field));
                    }
    
                    if (count($col_search) > 1) {
                        $searchLikeTempQuery = implode(' OR ', $searchLikeTempQueryArr);
                        $searchLikeTempQuery = "($searchLikeTempQuery)";
                    } else
                        $searchLikeTempQuery = $searchLikeTempQueryArr[0];
    
    
                    $tempQuery .= $searchLikeTempQuery;
    
                    //$this->db->like($table_search.'.'.$col_search, $request->getPost($column->Field), 'both');
                    $i++;
                }
    
                $tempQuery .= isset($searchLikeTempQuery) ?  "  " : "";
                if (!$allEmpty)
                    $result_query .= $tempQuery;
            }
    
            if ($order) {
                $result_query .= " ORDER BY ";
                $i = 0;
                foreach ($order as $ord) {
                    if ($i > 0)
                        $result_query .= ", ";
                    $result_query .= $ord[0] . " " . $ord[1];
                    //$this->db->order_by($ord[0], $ord[1]);
                    $i++;
                }
            } else {
    
                $result_query .= " ORDER BY " . $pk . " DESC";
                //$this->db->order_by($pk, 'DESC');
            }
    
            $result_query = rtrim($result_query, ',');
            $result_query .= " LIMIT $offset, $per_page ";
            //$this->db->limit($per_page, $offset);
    
            $page_items = $this->db->query($result_query)->getResult();
    
    
            return $page_items;
        }

        
    public function generateLikeClause($table_search, $colToSearch, $searchTerm)
    {
        return $table_search . "." . $colToSearch
            . " LIKE '%"
            . trim($this->db->escapeLikeString($searchTerm))
            . "%' ESCAPE '!'";
    }
    
    public function updateItem($table, $where, $data)
    {
        $builder = $this->db->table($table);
        if ($where)
            $builder->where($where);

        return $builder->update($data);
        // $this->db->table($table)->where($where)->update($data);
        // return $this->db->affectedRows();
    }

    public function getRelationItemsJoin($table, $where, $joinTable, $joinString)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->join($joinTable, $joinString);
        return $builder->get()->getResult();
    }

    public function schema($table)
    {
        $query = "SHOW COLUMNS FROM $table";
        $result = $this->db->query($query)->getResult();
        return $result;
    }

    function get_primary_key_field_name($table)
    {
        $query = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
        return $this->db->query($query)->getRow()->Column_name;
    }
    

 
}