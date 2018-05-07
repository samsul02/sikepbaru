<?php

Yii::setAlias('@assetsdatapegawai', '/images/datapegawai');

//untuk upload-delete foto pegawai
Yii::setAlias('@uploadfotopegawaiurl', '/uploads/foto_pegawai');
Yii::setAlias('@uploadfotopegawaipath', dirname(dirname(__DIR__)) . '/backend/web/uploads/foto_pegawai');

//untuk upload-delete akta pegawai
Yii::setAlias('@uploadaktapegawaiurl', '/uploads/akta_pegawai');
Yii::setAlias('@uploadaktapegawaipath', dirname(dirname(__DIR__)) . '/backend/web/uploads/akta_pegawai');

//untuk upload-delete Foto Anak 
Yii::setAlias('@uploadFotoAnakurl', '/uploads/foto_anak');
Yii::setAlias('@uploadFotoAnakpath', dirname(dirname(__DIR__)) . '/backend/web/uploads/foto_anak');

//untuk upload-delete akta Anak 
Yii::setAlias('@uploadAktaAnakurl', '/uploads/akta_anak');
Yii::setAlias('@uploadAktaAnakpath', dirname(dirname(__DIR__)) . '/backend/web/uploads/akta_anak');