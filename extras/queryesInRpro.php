<?php 
namespace rpro;

class CustomConnection
{
	public $link;
    public $host = "10.80.100.109";
    public $dbName = "rpro";
    public $dbUser = "Dbs.2014,";
    public $dbPass = "P4dYyCv9ew9wnxQe";
    public $result;

    public function dbConnection()
    {
        $this->link = mysqli_connect($this->host, $this->dbUser, $this->dbPass, $this->dbName);

        if (!$this->link) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            exit;
        }
    }

    public function dbQuery($query)
    {
        if($this->result = $this->link->query($query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function dbNumRows()
    {
        return $this->result->num_rows;
    }

    public function dbGetResult()
    {
        $array_rows = array();
        while($row = $this->result->fetch_assoc()) 
        {
            $array_rows[] = $row;
        }
        mysqli_free_result($this->result);

        return $array_rows;
    }

    public function getInsertedId()
    {
        return $this->link->insert_id;
    }

    public function dbClose()
    {
        mysqli_close($this->link);
    }
}