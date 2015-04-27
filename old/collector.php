<?php

/**
 * Description of collector
 *
 * @author Rastor
 */
class Collector {

    /**
     *
     * @var PDO
     */
    protected $_db = null;

    const LAST_INSERT_KEY = 'lastInsertId';

    protected $_notFoundRecords = array();

    /**
     * 
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->_db = $db;
    }

    public function insert($data) {
        $insert = array();
        foreach ($data as $key => $value) {
            $insert[] = $key . ' = ' . $this->_db->quote($value);
        }
        $insertData = implode(',', $insert);
        $this->_db->exec("INSERT IGNORE INTO `cars` SET {$insertData}");
    }

    public function setLastInsert($value) {
        $value = intval($value);
        $name = $this->_db->quote(self::LAST_INSERT_KEY);
        $this->_db->exec("UPDATE `parameters` SET `value` = {$value} WHERE `name` = {$name}");
    }

    public function getLastInsertValue() {
        $name = $this->_db->quote(self::LAST_INSERT_KEY);
        return $this->_db->query("SELECT `value` FROM `parameters` WHERE `name` = {$name}")->fetchColumn();
    }

    public function getNotFoundRecords() {
        
    }

}
