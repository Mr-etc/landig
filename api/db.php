<?php
class DB
{
    private $host = 'localhost';
    private $userName = 'root';
    private $pass = 'root';
    private $db = 'landing';
    private $connection = null;

    private function connect()
    {
        $this->connection = new mysqli($this->host, $this->userName, $this->pass, $this->db);
    }

    private function close()
    {
        $this->connection->close();
    }

    public function query($query, $responseType = 'row')
    {
        $this->connect();
        $data = $this->connection->query($query);
        $response = [];
        switch (strtok($query, " ")) {
            case 'INSERT':
                $response = $this->connection->insert_id;
                break;
            case 'SELECT':
                if ($responseType == 'row') {
                    while ($row = $data->fetch_row()) {
                        $response[] = $row;
                    }
                } else if ($responseType == 'assoc') {
                    while ($row = $data->fetch_assoc()) {
                        $response[] = $row;
                    }
                }

                break;
        }
        $this->close();
        return $response;
    }
}
