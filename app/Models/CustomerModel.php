<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer'; // Nama tabel yang digunakan
    protected $primaryKey = 'id_customer'; // Primary key dari tabel
    protected $allowedFields = [
        'nik_customer', 
        'nama_customer', 
        'jenis_kelamin', 
        'pekerjaan', 
        'nomor_telepon', 
        'alamat', 
        'email', 
        'created_at'
    ]; // Kolom-kolom yang diperbolehkan untuk diisi atau diubah

    // Metode untuk mengambil semua data customer
    public function getCustomers()
    {
        return $this->findAll(); // Mengambil semua data dari tabel customers
    }

    // Metode untuk mengambil data customer berdasarkan ID
    public function getCustomerById($id_customer)
    {
        return $this->where('id_customer', $id_customer)->first(); // Mengambil data customer berdasarkan id_customer
    }
}
