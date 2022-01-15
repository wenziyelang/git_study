    public function actionCreate($linkageid){
        $model    =   new Linkagemenu();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $Linkagemenu_array = Yii::$app->request->post('Linkagemenu');
            $linkagemenu_name = explode("\r\n", trim($Linkagemenu_array['name']));
            $model->addtime = time();
            $model->pid = $linkageid;
            foreach($linkagemenu_name as $key){
                $_model = clone $model;
                $_model->setAttributes(['name' => $key]);
                $_model->save();
            }
            $Function = new PublicFunction();
            if($linkageid == 0){
                $content = $Function->message('success', '添加成功', 'index.php?r=linkagemenu/index');
            }else{
                $content = $Function->message('success', '添加成功', 'index.php?r=linkagemenu/managechild&linkageid='.$linkageid);
            }
            return $this->renderContent($content);
            
        }else{
            return $this->render('create', [
                     'model' => $model,
                 ]);           
        }
    }