<?php

namespace AutoRiaGrabber;

class AutoRecord {

	protected $recordId;
	protected $broken = false;
	protected $accident = false;
	protected $customsProblem = false;
	protected $name;
	protected $year;
	protected $price;
	protected $displacement;
	protected $mileage;
	protected $addDate;
	protected $cityUri;
	protected $cityName;
	protected $uri;
	protected $description;
	protected $fuel;
	protected $gearBox;
	protected $thumbnail;
	
	public function setThumbnail($value) {
		$this->thumbnail = $value;
		
		return $this;
	}
	
	public function getThumbnail() {
		return $this->thumbnail;
	}
	
	public function setGearBox($value) {
		$this->gearBox = $value;
		
		return $this;
	}
	
	public function getGearBox() {
		return $this->gearBox;
	}
	
	public function setFuel($value) {
		$this->fuel = $value;
		
		return $this;
	}
	
	public function getFuel() {
		return $this->fuel;
	}
	
	public function setDescription($value) {
		$this->description = $value;
		
		return $this;
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function setUri($value) {
		$this->uri = $value;
		
		return $this;
	}
	
	public function getUri() {
		return $this->uri;
	}
	
	public function setCityName($value) {
		$this->cityName = $value;
		
		return $this;
	}
	
	public function getCityName() {
		return $this->cityName;
	}
	
	public function setCityUri($value) {
		$this->cityUri = $value;
		
		return $this;
	}
	
	public function getCityUri() {
		return $this->cityUri;
	}
	
	public function setAddDate($value) {
		$this->addDate = $value;
		
		return $this;
	}
	
	public function getAddDate() {
		return $this->addDate;
	}
	
	public function setMileage($value) {
		$this->mileage = $value;
		
		return $this;
	}
	
	public function getMileage() {
		return $this->mileage;
	}
	
	public function setDisplacement($value) {
		$this->displacement = $value;
		
		return $this;
	}
	
	public function getDisplacement() {
		return $this->displacement;
	}
	
	public function setName($value) {
		$this->name = $value;
		
		return $this;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setYear($value) {
		$this->year = $value;
		
		return $this;
	}
	
	public function getYear() {
		return $this->year;
	}
	
	public function setYear($value) {
		$this->year = $value;
		
		return $this;
	}
	
	public function getYear() {
		return $this->year;
	}
	
	public function setPrice($value) {
		$this->price = $value;
		
		return $this;
	}
	
	public function getPrice() {
		return $this->price;
	}
	
	public function setName($value) {
		$this->name = $value;
		
		return $this;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setRecordId($id) {
		$this->recordId = $id;
		
		return $this;
	}
	
	public function getRecordId() {
		return $this->recordId;
	}
	
	public function setBroken($value) {
		$this->broken = (bool) $value;
		
		return $this;
	}
	
	public function getBroken() {
		return $this->broken;
	}
	
	public function setAccident($value) {
		$this->accident = (bool) $value;
		
		return $this;
	}
	
	public function getAccident() {
		return $this->accident;
	}
	
	public function setCustomsProblems($value) {
		$this->customsProblem = (bool) $value;
		
		return $this;
	}
	
	public function getCustomsProblems() {
		return $this->customsProblem;
	}

}