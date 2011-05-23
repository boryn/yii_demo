<?php

class ShopsController extends Controller
{
	public function actionImport()
	{
		$model=new CsvForm();

		if (isset($_POST['CsvForm'])) {
			if ($model->validate()) {
				$csv = CUploadedFile::getInstance($model,'csv');

				$csvData = Shops::readCsvData($csv->tempName);
				Shops::insertToDB($csvData);
			}
		}


		$this->render('import', array(
			'model'=>$model,
		));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionTree()
	{
		$this->render('tree');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}