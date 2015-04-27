<?php

namespace AutoRiaGrabber;

class Grabber {

    /**
     *
     * @var PDO
     */
    protected $db = null;

    /**
     * 
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function add(Auto $auto) {
		$data = $this->db->prepare;
	
        $insert = array();
        foreach ($data as $key => $value) {
            $insert[] = $key . ' = ' . $this->_db->quote($value);
        }
        $insertData = implode(',', $insert);
        $this->_db->exec("INSERT IGNORE INTO `cars` SET {$insertData}");
    }

    public function getLastRecordId() {
        $name = $this->_db->quote(self::LAST_INSERT_KEY);
        $value = $this->_db->query("SELECT MAX(`record_id`) FROM `parameters` WHERE `name` = {$name}")->fetchColumn();
		
		if ($value > 0) {
			return $value;
		}
		
		return 0;
    }

}
