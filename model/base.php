<?php

class BaseModel {

  private static $s_connection = NULL;
    private static $s_transactionRefCount = 0;

    protected function connection()
    {
        if (BaseModel::$s_connection === NULL)
        {
            $conn = new mysqli("localhost", "root", "wabjtam", "citygame");
            $conn->query('SET NAMES  utf8;'); 
            if (mysqli_connect_errno() !== 0)
            {
                $msg = mysqli_connect_error();
                throw new LSWBackendDatabaseErrorException($msg, 'Connect');
            }
            BaseModel::$s_connection = $conn;
        }

        return BaseModel::$s_connection;
    }


    public function query ($sql) {
        $rows = array();
        $results = $conn->query($query);
        if ($results)
        {
            while ($obj = $results->fetch_object())
            {
                $rows[] = $obj;
            }

            $results->close();
        }

        if (count($rows) == 1)  //DEMO only, simple return an object if only one recond
            return $rows[0]; 
        else 
            return $rows;
    }

    /**
     * Tansactions query , roll bakc if query faild 
     * $sqls array of sql
     * UNDONE
     */
    public function trans($sqls) {
        
    }

  }