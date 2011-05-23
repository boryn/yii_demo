<?php

/**
 * CsvForm class.
 * CsvForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CsvForm extends CFormModel
{
	public $csv;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('csv', 'file',  'types'=>'csv'),
			array('csv', 'customFunc')
		);
	}

	
	/**
	* Custom function for informing about possible upload / database insert errors.
	*/
	public function customFunc($attribute,$params)
    {
		//If encountered any previous errors, return
		if ($this->hasErrors()) {
			return;
		}

		$csv = CUploadedFile::getInstance($this,'csv');
		$csvData = Shops::readCsvData($csv->tempName);
		
		if (!Shops::insertToDB($csvData)) {
			$this->addError('csv','There were errors importing your file.');
		}
    }

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'csv'=>'CSV File to import',
		);
	}
}