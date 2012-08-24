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

        return $rows;
    }


  }