<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.15.81:8080/customer/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['customer'] = json_decode($response->getBody(), true);

            return view('customerView', $data);
        } catch (\Exception $e) {
            return view('customerView', ['error' => $e->getMessage()]);
        }
    }

    public function tambahCustomer()
    {
        return view('input-customer');
    }

   public function sendData()
    {
        $data = [
            'nik_customer' => $this->request->getPost('nik_customer'),
            'nama_customer' => $this->request->getPost('nama_customer'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
        ];

        $url = 'http://10.10.15.81:8080/customer/store';
        $client = \Config\Services::curlrequest();

        try {
             // Mengirim request POST dengan format JSON
            $response = $client->setBody(json_encode($data))
                ->setHeader('Content-Type', 'application/json')
                ->request('POST', $url);
            //
            $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($data) // Mengirim data sebagai JSON
        ]);

        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Cache-Control', 'post-check=0, pre-check=0', false);
        $this->response->setHeader('Pragma', 'no-cache');

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/customer')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/customer')->with('error', 'Gagal menyimpan data!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/customer')->with('error', $e->getMessage());
        }

        print_r($response);

        /*  if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/mobil')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/mobil')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }   */

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.15.81:8080/customer/show/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['customer1'] = json_decode($response->getBody(), true);

            if (!$data['customer1']) {
                return redirect()->to('/customer')->with('error', 'Customer tidak ditemukan.');
            }

            return view('edit-customer', $data);
        } catch (\Exception $e) {
            return view('edit-customer', ['error' => $e->getMessage()]);
        }
    }

    public function editcustomer()
    {
         $data = [
            'id_customer' => $this->request->getPost('id_customer'),
            'nik_customer' => $this->request->getPost('nik_customer'),
            'nama_customer' => $this->request->getPost('nama_customer'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
        ];

        $url = 'http://10.10.15.81:8080/customer/update/' . $this->request->getPost('id');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        //print_r($response);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/customer')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/customer')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }
    public function hapus($id)
    {
        $url = 'http://10.10.15.81:8080/customer/delete/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('DELETE', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/customer')->with('success', 'Pelanggan berhasil dihapus!');
            } else {
                return redirect()->to('/customer')->with('error', 'Gagal menghapus pelanggan!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/customer')->with('error', $e->getMessage());
        }
    }
}