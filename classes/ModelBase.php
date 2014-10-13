<?php

    Abstract Class ModelBase {

        protected $db;//object DB connect
        protected $table;//table name
        private $dataResult;//sql query result

        public function __construct($select = false, $fields = '*') {

            global $dbObject;//object DB connect
            $this->db = $dbObject;

            $modelName = get_class($this);//get name class of model, where work with this objects
            $this->table = $this->getTableName($modelName);//get name table from model class

            $sql = $this->getQuery($select);//get part of sql query and sql action

            switch($sql[0]){//sql action

                case 'select':
                    $this->select($sql[1], $fields);
                    break;

                case 'update':
                    $this->update($sql[1]);
                    break;

                case 'insert':
                    $this->insert($sql[1]);
                    break;

                case 'delete':
                    $this->delete($sql[1]);
                    break;
            }

            return $this->dataResult;
        }

        public function getTableName($modelName) {//get table name by used model

            $table = NULL;
            $countCapitals = preg_match_all(//count word in array
                '/[A-Z][^A-Z]*?/Us',
                $modelName,//model name
                $arrayCapitals,//array with word
                PREG_SET_ORDER
            );

            for($a = 0; $a < $countCapitals-1; $a++){

                $table = $arrayCapitals[$a][0];
            }

            return strtolower($table);
        }

        public function getAllRows() {//get all rows from db

            if(!isset($this->dataResult) OR empty($this->dataResult)) return false;

            return $this->dataResult;
        }

        public function getOneRow() {//get one row from db

            if(!isset($this->dataResult) OR empty($this->dataResult)) return false;

            return $this->dataResult[0];
        }

        private function select($sql, $fields) {

            try{

                $db = $this->db;
                $stmt = $db->query("SELECT " . $fields . " FROM $this->table" . $sql);//processing a database query
                $rows = $stmt->fetchAll();//processing a data from query
                $this->dataResult = $rows;
            }catch(PDOException $e) {

                echo $e->getMessage();
                exit;
            }
            return $rows;
        }

        private function delete($sql) {

            try {

                $db = $this->db;
                $result = $db->exec("DELETE FROM $this->table " . $sql);
            }catch(PDOException $e){

                echo 'Error : '.$e->getMessage();
                echo '<br/>Error sql : ' . "'DELETE FROM $this->table " . $sql . "'";
                exit();
            }
            return $result;
        }

        private function update($sql) {

            try {

                $db = $this->db;
                $stmt = $db->prepare("UPDATE $this->table $sql");
                $result = $stmt->execute();
            }catch(PDOException $e){

                echo 'Error : '.$e->getMessage();
                echo '<br/>Error sql : ' . "'UPDATE $this->table $sql";
                exit();
            }
            return $result;
        }

        private function insert($sql) {

            $arrayAllFields = array_keys($this->fieldsTable());
            $arraySetFields = array();
            $arrayData = array();

            foreach($arrayAllFields as $field){

                if(isset($sql[$field])){

                    $arraySetFields[] = $field;//this is field
                    $arrayData[] = $sql[$field];//this is field value
                }
            }
            $forQueryFields =  implode(', ', $arraySetFields);
            $rangePlace = array_fill(0, count($arraySetFields), '?');
            $forQueryPlace = implode(', ', $rangePlace);//add '?' instead values

            try {
                $db = $this->db;
                $stmt = $db->prepare("INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)");
                print_r($stmt);
                print_r($arrayData);
                $result = $stmt->execute($arrayData);
            }catch(PDOException $e){
                echo 'Error : '.$e->getMessage();
                echo '<br/>Error sql : ' . "'INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)'";
                exit();
            }
            return $result;
        }

        private function getQuery($select) {//make query to db

            if(is_array($select)){

                $allQuery = array_keys($select);//get keys
                array_walk($allQuery, function(&$val){

                    $val = strtoupper($val);//in array all letters to uppercase
                });

                $querySql = "";//part of query to db
                $typeSql = "";//type of query to db

                if(in_array("ACTION", $allQuery)){//initialize query type

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "ACTION"){

                            $typeSql = $val;// query type select, update, insert or delete
                        }
                    }
                }

                if(in_array("TABLE_PREFIX", $allQuery)){//initialize prefix for main table

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "TABLE_PREFIX"){

                            $querySql .= " " . $val;
                        }
                    }
                }

                if(in_array("VALUES", $allQuery)){//values for insert

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "VALUES"){

                            foreach($val as $k => $v){
                                $querySql[$k] = $v;// $k is field for value($v)
                            }
                        }
                    }
                }

                if(in_array("JOIN", $allQuery)){//join table

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "JOIN"){

                            foreach($val as $k => $v){
                                $querySql .= " JOIN " . $k . " ON " . $v;
                            }
                        }
                    }
                }

                if(in_array("SET", $allQuery)){//action for update - set values

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "SET"){

                            $i = 0;
                            foreach($val as $k => $v){
                                $i++;
                                if($i == 1) {
                                    $querySql .= " SET " . $k . " = " . $v;
                                } else {
                                    $querySql .= ", " . $k . " = " . $v;
                                }
                            }
                        }
                    }
                }

                if(in_array("WHERE", $allQuery)){

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "WHERE"){

                            $querySql .= " WHERE " . $val;
                        }
                    }
                }

                if(in_array("GROUP", $allQuery)){

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "GROUP"){

                            $querySql .= " GROUP BY " . $val;
                        }
                    }
                }

                if(in_array("ORDER", $allQuery)){

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "ORDER"){

                            $querySql .= " ORDER BY " . $val;
                        }
                    }
                }

                if(in_array("LIMIT", $allQuery)){

                    foreach($select as $key => $val){

                        if(strtoupper($key) == "LIMIT"){

                            $querySql .= " LIMIT " . $val;
                        }
                    }
                }

                return array(
                    0 => $typeSql,// type sql query
                    1 => $querySql//ended part of sql query
                );
            }
            return false;
        }
    }