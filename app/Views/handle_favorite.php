<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['favorites'])) {
  $_SESSION['favorites'] = [];
}

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$response = ['status' => 'error'];

if ($productId > 0) {
  $key = array_search($productId, $_SESSION['favorites']);

  if ($key !== false) {
    // Produk sudah ada, hapus dari favorit
    unset($_SESSION['favorites'][$key]);
    $_SESSION['favorites'] = array_values($_SESSION['favorites']); // Re-index array
    $response['status'] = 'removed';
  } else {
    // Produk belum ada, tambahkan ke favorit
    $_SESSION['favorites'][] = $productId;
    $response['status'] = 'added';
  }
}

echo json_encode($response);
