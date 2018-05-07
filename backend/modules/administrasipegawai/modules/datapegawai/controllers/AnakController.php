<?php

namespace backend\modules\administrasipegawai\modules\datapegawai\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\TmstKeluarga;
use backend\models\TmstKeluargaSearch;
use backend\models\TmstPegawai;
use backend\models\TrefHubunganKeluarga;
use backend\components\SikepHelper;
use yii\web\UploadedFile;

/**
 * note:
 * CONTROLLER :
 * - tambahkan global variabel -> public $layout = 'main';
 * - pada actionIndex, actionCreate, actionUpdate, actionView assign parameter $this->view->params['modelPegawai']
 * - pada actionCreate assign manual $model->IDPegawai = $idPegawai; dan hapus form fieldnya _form.php
 * 
 * VIEW :
 * - index.php tombol create tambah parameter idPegawai
 * - ganti use yii\grid\GridView; dengan use kartik\grid\GridView; cek contoh option widgetnya di view/default/index
 * - ganti use yii\widgets\DetailView; dengan use kartik\detail\DetailView;
 */
class AnakController extends Controller {

    /**
     * {@inheritdoc}
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
     * Lists all TmstKeluarga models.
     * @return mixed
     */
    public function actionIndex($idPegawai) {
        $searchModel = new TmstKeluargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'idPegawai' => $idPegawai,
                    'profileParams' => [
                        'modelPegawai' => SikepHelper::validateModel(TmstPegawai::findOne($idPegawai)),
                        'backUrl' => Url::to(['default/view', 'id' => $idPegawai]),
                    ],
        ]);
    }

    /**
     * Displays a single TmstKeluarga model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        return $this->render('view', [
                    'model' => $model,
                    'idPegawai' => $model->IDPegawai,
                    'profileParams' => [
                        'modelPegawai' => SikepHelper::validateModel(TmstPegawai::findOne($model->IDPegawai)),
                        'backUrl' => Url::to(['index', 'idPegawai' => $model->IDPegawai]),
                    ],
        ]);
    }

    /**
     * Creates a new TmstKeluarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idPegawai) {
        $model = new TmstKeluarga();

        if ($model->load(Yii::$app->request->post())) {

            //sebelum simpan ke table, ganti format date dulu jadi yyyy-MM-dd            
            $model->TanggalLahirAnggotaKeluarga = Yii::$app->formatter->asDate($model->TanggalLahirAnggotaKeluarga, 'yyyy-MM-dd');
            if ($model->TanggalLahirAnggotaKeluarga == '0001-11-30') {
                $model->TanggalLahirAnggotaKeluarga = NULL;
            }

            $model->IDPegawai = $idPegawai;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->IdAnggotaKeluarga]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'idPegawai' => $idPegawai,
                    'profileParams' => [
                        'modelPegawai' => SikepHelper::validateModel(TmstPegawai::findOne($idPegawai)),
                        'backUrl' => Url::to(['index', 'idPegawai' => $idPegawai]),
                    ],
        ]);
    }

    /**
     * Updates an existing TmstKeluarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->TanggalLahirAnggotaKeluarga = Yii::$app->formatter->asDate($model->TanggalLahirAnggotaKeluarga, 'yyyy-MM-dd');
            if ($model->TanggalLahirAnggotaKeluarga == '0001-11-30') {
                $model->TanggalLahirAnggotaKeluarga = NULL;
            }
            $imgAktaAnak = UploadedFile::getInstance($model, 'fileDokumenAnak');
            if (!empty($imgAktaAnak)) {
                $model->DokumenHubunganKeluarga = SikepHelper::uploadFile($imgAktaAnak, Yii::$app->params['prefixFileAktaAnak'] . $model->IdAnggotaKeluarga, '@uploadAktaAnakpath');
            }
			$imgFotoAnak = UploadedFile::getInstance($model, 'fileFotoAnak');
            if (!empty($imgFotoAnak)) {
                $model->FotoAnggotaKeluarga = SikepHelper::uploadFile($imgFotoAnak, Yii::$app->params['prefixFileFotoAnak'] . $model->IdAnggotaKeluarga, '@uploadFotoAnakpath');
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->IdAnggotaKeluarga]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'idPegawai' => $model->IDPegawai,
                    'profileParams' => [
                        'modelPegawai' => SikepHelper::validateModel(TmstPegawai::findOne($model->IDPegawai)),
                        'backUrl' => Url::to(['index', 'idPegawai' => $model->IDPegawai]),
                    ],
        ]);
    }

    /**
     * Deletes an existing TmstKeluarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        $idPegawai = $model->IDPegawai;

        $model->delete();

        return $this->redirect(['index', 'idPegawai' => $idPegawai]);
    }

    /**
     * Finds the TmstKeluarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TmstKeluarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TmstKeluarga::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::$app->params['pageNotFound']);
    }

    /**
     * hapus image pake ajax
     * @param type $id
     */
    public function actionDeleteImage($id, $prefix, $filename) {
        $model = $this->findModel($id);

        switch ($prefix) {
            case Yii::$app->params['prefixFileFotoAnak']:
                SikepHelper::deleteFile($filename, '@uploadFotoAnakpath');
                $model->DokumenHubunganKeluarga = null;
                break;
            case Yii::$app->params['prefixFileAktaAnak']:
                SikepHelper::deleteFile($filename, '@uploadAktaAnakpath');
                $model->DokumenHubunganKeluarga = null;
                break;
        }

        $success = $model->save();

        echo Json::encode(['success' => $success]);
    }

}
