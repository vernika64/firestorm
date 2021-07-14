<?php
$user = $this->request->getVar('nik');
$pass = $this->request->getVar('pass');

// Cek 
$this->modulPelapor->where(['user' => $user])->first();

// 

try {
} catch (Exception $e) {
    echo "error a adalah " . $e;
}
