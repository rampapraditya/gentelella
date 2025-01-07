<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of Custommodel
 *
 * @author Rampa Praditya <https://pramediaenginering.com/>
 */
class Mcustom extends Model {
    
    
    /**
     * Fungsi untuk menghitung jumlah data berdasarkan kondisi WHERE atau LIKE
     *
     * @param string $table - Nama tabel
     * @param array $where - Kondisi WHERE, contoh: ['column' => 'value']
     * @param array $like - Kondisi LIKE, contoh: ['column' => 'keyword']
     * @param callable|null $customWhere - Fungsi callback untuk kondisi WHERE khusus
     *
     * @return int - Jumlah data yang ditemukan
     */
    public function getCount(
        string $table,
        array $joins = [],
        array $where = [],
        array $like = [],
        array $notWhere = []
    ): int {
        $builder = $this->db->table($table);

        // Tambahkan JOIN
        foreach ($joins as $join) {
            $builder->join($join['table'], $join['condition'], $join['type'] ?? 'inner');
        }

        // Tambahkan WHERE
        if (!empty($where)) {
            $builder->where($where);
        }

        // Tambahkan LIKE
        if (!empty($like)) {
            foreach ($like as $column => $value) {
                $builder->orLike($column, "%".$value."%");
            }
        }

        // Tambahkan custom WHERE
        foreach ($notWhere as $column => $value) {
            $builder->where("{$column} <>", $value);
        }

        // Hitung jumlah data
        return $builder->countAllResults();
    }

    /**
     * Query dinamis untuk JOIN, WHERE, LIKE, LIMIT, OFFSET, dan lainnya
     *
     * @param string $mainTable - Nama tabel utama
     * @param array $joins - Array JOIN
     * @param array $where - Kondisi WHERE
     * @param array $whereIn - Kondisi WHERE IN
     * @param array $whereNotIn - Kondisi WHERE NOT IN
     * @param array $like - Kondisi LIKE
     * @param int|null $limit - Batas jumlah data
     * @param int|null $offset - Posisi offset data
     * @param array $select - Kolom yang ingin dipilih
     *
     * @return array - Hasil query dalam bentuk array
     */
    public function getDynamicData(
        string $mainTable,
        bool $singleRow = false,
        array $select = ['*'],
        array $joins = [],
        array $where = [],
        array $notWhere = [],
        array $whereIn = [],
        array $whereNotIn = [],
        array $like = [],
        ?int $limit = null,
        ?int $offset = null,
        ?array $orderBy = null) 
    {
        $builder = $this->db->table($mainTable);

        // Pilih kolom
        $builder->select(implode(', ', $select));

        // Tambahkan JOIN
        foreach ($joins as $join) {
            $builder->join($join['table'], $join['condition'], $join['type'] ?? 'inner');
        }

        // Tambahkan WHERE
        if (!empty($where)) {
            foreach ($where as $field => $value) {
                $builder->where($field, $value);
            }
        }

        foreach ($notWhere as $column => $value) {
            $builder->where("{$column} <>", $value);
        }

        // Tambahkan WHERE IN
        foreach ($whereIn as $field => $values) {
            $builder->whereIn($field, $values);
        }

        // Tambahkan WHERE NOT IN
        foreach ($whereNotIn as $field => $values) {
            $builder->whereNotIn($field, $values);
        }

        // Tambahkan LIKE
        if (!empty($like)) {
            foreach ($like as $column => $value) {
                $builder->orLike($column, "%".$value."%");
            }
        }


        // Add order by conditions
        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $builder->orderBy($column, $direction);
            }
        }

        // Tambahkan LIMIT dan OFFSET
        if (!is_null($limit)) {
            $builder->limit($limit, $offset);
        }

        // Eksekusi query
        $query = $builder->get();
        
        
        // Return result based on $singleRow
        return $singleRow ? $query->getRow() : $query->getResultObject();
    }
    
    public function getAllQ($q) {
        $query = $this->db->query($q);
        return $query;
    }
    
    public function getAllQR($q) {
        $query = $this->db->query($q);
        return $query->getRowObject();
    }
    
    public function getAll($tb_name) {
        $builder = $this->db->table($tb_name);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function getAllW($tb_name, $kondisi) {
        $builder = $this->db->table($tb_name);
        $builder->where($kondisi);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function tambah($table, $data){
        $builder = $this->db->table($table);
        return $builder->insert($data);
    }
    
    public function hapus($table,$kondisi){
        $builder = $this->db->table($table);
        $builder->where($kondisi);
        return $builder->delete();
    }
    
    public function ganti($table, $data, $condition){
        $builder = $this->db->table($table);
        $builder->where($condition);
        return $builder->update($data);
    }
    
    public function updateNK($table, $data){
        $builder = $this->db->table($table);
        return $builder->update($data);
    }
    
    public function select_max($tb_name, $kolom) {
        $builder = $this->db->table($tb_name);
        $builder->selectMax($kolom);
        $query = $builder->get();
        return $query;
    }
    
    public function select_min($tb_name, $kolom) {
        $builder = $this->db->table($tb_name);
        $builder->selectMin($kolom);
        $query = $builder->get();
        return $query;
    }
    
    public function select_avg($tb_name, $kolom) {
        $builder = $this->db->table($tb_name);
        $builder->selectAvg($kolom);
        $query = $builder->get();
        return $query;
    }
    
    public function select_sum($tb_name, $kolom) {
        $builder = $this->db->table($tb_name);
        $builder->selectSum($kolom);
        $query = $builder->get();
        return $query;
    }
    
    public function autokode($depan, $kolom, $table, $awal, $akhir) {
        $hasil = "";
        
        $sql = "SELECT IFNULL(MAX(SUBSTR(?, ?, ?)), 0) + 1 AS jml FROM ?";
        $query = $this->db->query($sql, [$kolom, $awal, $akhir, $table]);
        
        if ($query->getNumRows() > 0) {
            $data = $query->getRow();
            $panjang = strlen($data->jml);
            $pnjng_nol = ($akhir - $panjang) - $awal;
            $nol = str_repeat("0", $pnjng_nol);
            $hasil = $depan . $nol . $data->jml;
        }
    
        return $hasil;
    }
    
    public function get_by_id($table, $kondisi){
        $builder = $this->db->table($table);
        $builder->where($kondisi);
        $query = $builder->get();
        return $query->getRowObject();
    }
}
