<?php

namespace backend\modules\administrasipegawai\modules\datapegawai\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use backend\components\SikepHelper;
use backend\models\TrefKabupaten;
use backend\models\TmstPegawai;

class PegawaiController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single TmstPegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        return $this->render('view', [
                    'model' => $model,
                    'profileParams' => [
                        'modelPegawai' => $model,
                        'backUrl' => Url::to(['default/view', 'id' => $model->IdPegawai]),
                    ],
        ]);
    }

    /**
     * Creates a new TmstPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TmstPegawai();

//        $this->view->params['backUrl'] = Url::to(['index',]);
//        $this->view->params['modelPegawai'] = $model;

        if ($model->load(Yii::$app->request->post())) {

            //sebelum simpan ke table, ganti format date dulu jadi yyyy-MM-dd            
            $model->TanggalLahir = Yii::$app->formatter->asDate($model->TanggalLahir, 'yyyy-MM-dd');
            if ($model->TanggalLahir == '0001-11-30') {
                $model->TanggalLahir = NULL;
            }

            $model->PropinsiTempatLahir = $model->intIdPropinsi;

            if ($model->save()) {
                return $this->redirect(['default/index',]);
            }
        }

        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing TmstPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            //sebelum simpan ke table, ganti format date dulu jadi yyyy-MM-dd            
            $model->TanggalLahir = Yii::$app->formatter->asDate($model->TanggalLahir, 'yyyy-MM-dd');
            if ($model->TanggalLahir == '0001-11-30') {
                $model->TanggalLahir = NULL;
            }

            $model->PropinsiTempatLahir = $model->intIdPropinsi;

            $fotoPegawai = UploadedFile::getInstance($model, 'fileFotoPegawai');
            if (!empty($fotoPegawai)) {
                $model->FotoPegawai = SikepHelper::uploadFile($fotoPegawai, Yii::$app->params['prefixFileFoto'] . $model->IdPegawai, '@uploadfotopegawaipath');
            }

            $aktaPegawai = UploadedFile::getInstance($model, 'fileAktaPegawai');
            if (!empty($aktaPegawai)) {
                $model->DokumenAktaLahir = SikepHelper::uploadFile($aktaPegawai, Yii::$app->params['prefixFileAkta'] . $model->IdPegawai, '@uploadaktapegawaipath');
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->IdPegawai]);
            }
        } else {
            /**
             * atribut intIdPropinsi perlu diinitialize dulu biar 
             * activeHiddenInput hidden-propinsi ga empty
             */
            $model->intIdPropinsi = $model->PropinsiTempatLahir;

            //date perlu dijadiin locale US dulu biar bisa saving ke table
            Yii::$app->formatter->locale = 'en-US';
            $model->TanggalLahir = Yii::$app->formatter->asDate($model->TanggalLahir, 'php:d F Y');
        }

        return $this->render('update', [
                    'model' => $model,
                    'profileParams' => [
                        'modelPegawai' => $model,
                        'backUrl' => Url::previous(),
                    ],
        ]);
    }

    /**
     * Deletes an existing TmstPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        SikepHelper::deleteFile($model->FotoPegawai, '@uploadfotopegawaipath');

        SikepHelper::deleteFile($model->DokumenAktaLahir, '@uploadaktapegawaipath');

        $model->delete();

        return $this->redirect(array('default/index'));
    }

    /**
     * Finds the TmstPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TmstPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TmstPegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::$app->params['pageNotFound']);
    }

    /**
     * 
     * ambil data propinsi berdasarkan id kabupaten pake ajax
     * @param type $zipId
     */
    public function actionGetPropinsi($idKabupaten) {
        echo Json::encode(TrefKabupaten::findOne($idKabupaten)->propinsi);
    }

    /**
     * hapus image pake ajax
     * @param type $id
     */
    public function actionDeleteImage($id, $prefix, $filename) {
        $model = $this->findModel($id);

        switch ($prefix) {
            case Yii::$app->params['prefixFileFoto']:
                SikepHelper::deleteFile($filename, '@uploadfotopegawaipath');
                $model->FotoPegawai = null;
                break;
            case Yii::$app->params['prefixFileAkta']:
                SikepHelper::deleteFile($filename, '@uploadaktapegawaipath');
                $model->DokumenAktaLahir = null;
                break;
        }

        $success = $model->save();

        echo Json::encode(['success' => $success]);
    }

    /**
     * upload image pake ajax
     * @param type $id
     */
//    public function actionUploadImage($id) {
//        $isDocExist = FALSE;
//        $success = FALSE;
//
//        $model = $this->findModel($id);
//
//        //logic upload poto
//        $foto = UploadedFile::getInstance($model, 'fileFotoPegawai');
//        if (!empty($foto)) {
//            $model->FotoPegawai = Yii::$app->params['prefixFileFoto'] . $model->IdPegawai . '.' . $foto->extension;
//            $foto->saveAs(SikepHelper::getImagePath($model->FotoPegawai));
//            $isDocExist = TRUE;
//        }
//
//        //logic upload akta
//        $akta = UploadedFile::getInstance($model, 'fileAktaPegawai');
//        if (!empty($akta)) {
//            $model->DokumenAktaLahir = Yii::$app->params['prefixFileAkta'] . $model->IdPegawai . '.' . $akta->extension;
//            $akta->saveAs(SikepHelper::getImagePath($model->DokumenAktaLahir));
//            $isDocExist = TRUE;
//        }
//
//        if ($isDocExist) {
//            $success = $model->save();
//        }
//
//        echo Json::encode(['success' => $success]);
//    }
}
