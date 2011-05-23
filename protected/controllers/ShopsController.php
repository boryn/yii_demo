<?php

class ShopsController extends Controller
{
	public function actionImport()
	{
		$model=new CsvForm();

		if (isset($_POST['CsvForm'])) {
			if ($model->validate()) {
				$this->redirect(array('success'));
			}
		}


		$this->render('import', array(
			'model'=>$model,
		));
	}

	public function actionSuccess()
	{
		$this->render('success');
	}

	public function actionIndex()
	{
		$model=new Shops();

		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function actionTree()
	{
		$this->render('tree');
	}

	public function actionAjaxFillTree()
	{
		if (!isset($_GET['root'])) {
			exit();
		}

		//"Parent" records - here voivodships
		if ($_GET['root'] === 'source') {
			
			//(maybe not a perfect way to use voivodship as id...) 
			$sql = "SELECT voivodship AS id, voivodship AS text, 1 AS hasChildren "
                . "FROM tbl_shops "
                . "GROUP BY voivodship ORDER BY voivodship ASC";
            
			$req = Yii::app()->db->createCommand($sql);
            $children = $req->queryAll();
        
		//Children records - here information about shops
		} else {
            $sql = "SELECT id, CONCAT(city, ', ', street, ' ', place) AS text, 0 AS hasChildren "
                . "FROM tbl_shops "
				. "WHERE voivodship = '{$_GET['root']}' "
                . "ORDER BY city ASC";
            
			$req = Yii::app()->db->createCommand($sql);
            $children = $req->queryAll();
        }

		echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($children)
        );
        exit();
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